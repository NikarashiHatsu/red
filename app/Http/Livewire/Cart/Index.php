<?php

namespace App\Http\Livewire\Cart;

use Livewire\Component;

class Index extends Component
{
    public $carts;
    public $payment_total;
    public $product_total;
    public $address;
    public $phone_number;
    public $redirect_payment = null;
    public $available_products = 0;
    public $payment_method;

    protected $rules = [
        'phone_number' => 'required',
        'address' => 'required',
        'payment_method' => 'required',
    ];

    protected $listeners = [
        'quantity_updated' => 'count_payment'
    ];

    public function count_payment()
    {
        $this->available_products = 0;

        $this->payment_total = $this->carts->map(function($cart) {
            if ($cart->product->stock == 0 || $cart->product->form_order->direct_transfer_bank != null) {
                return 0;
            }

            return $cart->quantity * $cart->product->price;
        })->sum();

        $this->product_total = $this->carts->map(function($cart) {
            if ($cart->product->stock == 0 || $cart->product->form_order->direct_transfer_bank != null) {
                return 0;
            }

            $this->available_products = $this->available_products + 1;

            return $cart->quantity;
        })->sum();
    }

    public function checkout()
    {
        $merchantCode = config('duitku.merchant_code');
        $merchantKey = config('duitku.api_key');
        $paymentAmount = $this->payment_total;
        $paymentMethod = $this->payment_method;
        $merchantOrderId = time() . '';
        $productDetails = 'BWI App Store';
        $email = auth()->user()->email;
        $phoneNumber = $this->phone_number;
        $customerVaName = auth()->user()->name;
        $callbackUrl = route('duitku.callback');
        $returnUrl = route('duitku.return', [
            'page' => 'cart',
            'user_id' => auth()->user()->id,
            'address' => $this->address,
            'phone_number' => $this->phone_number,
        ]);
        $expiryPeriod = 10;
        $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

        $name = auth()->user()->name;
        $address = $this->address;

        $address = array(
            'firstName' => $name,
            'address' => $address,
            'phone' => $phoneNumber,
        );

        $customerDetail = array(
            'firstName' => $name,
            'email' => $email,
            'phone' => $phoneNumber,
            'billingAddress' => $address,
            'shippingAddress' => $address
        );

        $itemDetails = $this->carts->filter(function($cart) {
            if ($cart->product->stock != 0 && $cart->product->form_order->direct_transfer_bank == null) {
                return $cart;
            };
        })->map(function($cart) {
            return [
                'name' => $cart->product->name,
                'price' => $cart->product->price * $cart->quantity,
                'quantity' => $cart->quantity,
            ];
        })->values();

        $params = array(
            'merchantCode' => $merchantCode,
            'paymentAmount' => $paymentAmount,
            'paymentMethod' => $paymentMethod,
            'merchantOrderId' => $merchantOrderId,
            'productDetails' => $productDetails,
            'customerVaName' => $customerVaName,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'itemDetails' => $itemDetails,
            'customerDetail' => $customerDetail,
            'callbackUrl' => $callbackUrl,
            'returnUrl' => $returnUrl,
            'signature' => $signature,
            'expiryPeriod' => $expiryPeriod
        );

        $params_string = json_encode($params);

        if (config('duitku.production')) {
            $url = 'https://passport.duitku.com/webapi/api/merchant/v2/inquiry'; // Production
        } else {
            $url = 'https://sandbox.duitku.com/webapi/api/merchant/v2/inquiry'; // Sandbox
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($params_string))
        );
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        $request = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if($httpCode == 200) {
            $result = json_decode($request, true);

            if (isset($result['paymentUrl'])) {
                $this->redirect_payment = $result['paymentUrl'];
            } else {
                return redirect()->back()->with('error', 'Channel pembayaran ditolak.');
            }
        } else {
            $result = json_decode($request, true);
            return redirect()->back()->with('error', 'Transaksi gagal: ' . $result['Message']);
        }
    }

    public function mount()
    {
        $this->carts = auth()->user()->carts->load(['store', 'product']);
        $this->count_payment();
    }

    public function render()
    {
        return view('livewire.cart.index')
            ->layout('layouts.front-page');
    }
}
