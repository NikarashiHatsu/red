<?php

namespace App\Http\Livewire;

use App\Models\DuitkuTransaction;
use App\Models\FormOrder;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use iPaymu\iPaymu;
use Livewire\Component;

class RequestStoreApproval extends Component
{
    public $have_chosen_pricing_plan;
    public $have_store_information;
    public $have_application_information;
    public $have_whatsapp_number;
    public $have_products;
    public $have_chosen_layout_and_color_theme;
    public $have_all_prerequisites;

    public $form_order;
    public $have_ipaymu_sid;
    public $is_requested;
    public $redirect_payment = null;
    public $transaction = null;

    public function mount()
    {
        if (!auth()->user()->transaction()->exists() && request()->has('trx_id')) {
            $this->save_transaction();
        }

        $user = auth()->user();
        $products = $user->products;
        $form_order = $user->form_order()->firstOrCreate();

        $this->have_chosen_pricing_plan = $form_order->pricing_plan_id;
        $this->have_store_information = $form_order->store_banner_path && $form_order->store_logo_path && $form_order->store_owner && $form_order->store_name;
        $this->have_application_information = $form_order->application_name && $form_order->application_description && $form_order->store_address;
        $this->have_whatsapp_number = $form_order->whatsapp_number;
        $this->have_products = $products->count() > 0;
        $this->have_chosen_layout_and_color_theme = $form_order->layout_id && $form_order->layout_color;
        $this->is_requested = $form_order->is_requested;
        $this->have_ipaymu_sid = $form_order->sid;
        $this->transaction = $user->transaction;
        $this->form_order = $form_order;

        $this->have_all_prerequisites = $this->have_chosen_pricing_plan &&
                                        $this->have_store_information &&
                                        $this->have_application_information &&
                                        $this->have_whatsapp_number &&
                                        $this->have_products &&
                                        $this->have_chosen_layout_and_color_theme;
    }

    public function send_request()
    {
        $user = auth()->user();
        $form_order = $user->form_order;

        // $this->request_ipaymu_transaction($form_order, $user);
        echo $this->request_duitku_transaction($form_order, $user);
    }

    public function resend_request()
    {
        try {
            $this->form_order->update([
                'is_requested' => true,
                'is_request_accepted' => null,
                'disapproval_message' => null,
            ]);

            return session()->flash('success', 'Pengajuan berhasil dikirim.');
        } catch (\Exception $e) {
            return session()->flash('error', 'Pengajuan gagal dikirim: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.request-store-approval');
    }

    private function save_transaction()
    {
        if (!auth()->user()->transaction()->exists()) {
            try {
                auth()->user()->transaction()->create([
                    'trx_id' => request()->trx_id,
                    'status' => request()->status,
                    'tipe' => request()->tipe,
                    'via' => request()->via,
                    'channel' => request()->channel,
                    'va' => request()->va ?? null,
                ]);
            } catch (\Exception $e) {
                return session()->flash('error', 'Gagal menyimpan data transaksi.');
            }

            session()->flash('success', 'Berhasil menyimpan data transaksi.');
            return redirect()->route('store.index');
        }
    }

    private function request_ipaymu_transaction(FormOrder $form_order, User $user)
    {
        $ipaymu_api_key = config('ipaymu.ipaymu_api_key');
        $ipaymu_va = config('ipaymu.ipaymu_virtual_account');
        $ipaymu_prod = config('ipaymu.ipaymu_production');
        $iPaymu = new iPaymu($ipaymu_api_key, $ipaymu_va, $ipaymu_prod);

        $iPaymu->setURL([
            'ureturn' => route('store.index'),
            'unotify' => route('api.store.notify'),
            'ucancel' => route('store.index'),
        ]);

        $iPaymu->setBuyer([
            'name' => $user,
            'phone' => $form_order->whatsapp_number,
            'email' => $user->email,
        ]);

        $iPaymu->addCart([
            'product' => $form_order->pricing_plan->name,
            'quantity' => 1,
            'price' => $form_order->pricing_plan->price,
            'description' => 'Testing',
            'weight' => 1,
        ]);

        $iPaymu->setCOD([
            'pickupArea' => "76111",
            'pickupAddress' => "Denpasar",
            'deliveryArea' => "76111",
            'deliveryAddress' => "Denpasar",
        ]);

        try {
            $redirect_payment = $iPaymu->redirectPayment();
        } catch (\Exception $e) {
            return session()->flash('error', 'Terjadi kesalahan pada Gateway Pembayaran:' . $e->getMessage());
        }

        try {
            auth()->user()->form_order()->update([
                'sid' => $redirect_payment['Data']['SessionID'],
            ]);
        } catch (\Exception $e) {
            return session()->flash('error', 'Sistem gagal menyimpan SID, pembayaran dibatalkan:' . $e->getMessage());
        }

        $this->redirect_payment = $redirect_payment['Data']['Url'];
    }

    private function request_duitku_transaction(FormOrder $form_order, User $user)
    {
        $merchantCode = config('duitku.merchant_code');
        $merchantKey = config('duitku.api_key');
        $paymentAmount = $form_order->pricing_plan->price;
        $paymentMethod = 'BK';
        $merchantOrderId = time() . '';
        $productDetails = 'BWI App Store';
        $email = $user->email;
        $phoneNumber = $form_order->whatsapp_number;
        $customerVaName = $user->name;
        $callbackUrl = route('duitku.callback');
        $returnUrl = route('duitku.return');
        $expiryPeriod = 10;
        $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

        // Customer Detail
        $name = $user->name;
        $address = $form_order->store_address;

        $address = array(
            'firstName' => $name,
            'address' => $address,
            'phone' => $phoneNumber,
        );

        $customerDetail = array(
            'firstName' => $name,
            'email' => $email,
            'phoneNumber' => $phoneNumber,
            'billingAddress' => $address,
            'shippingAddress' => $address
        );

        $item1 = array(
            'name' => $form_order->pricing_plan->name,
            'price' => $form_order->pricing_plan->price,
            'quantity' => 1
        );

        $itemDetails = array(
            $item1
        );

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

            DuitkuTransaction::create([
                'form_order_id' => $form_order->id,
                'reference' => $result['reference'],
            ]);

            $this->redirect_payment = $result['paymentUrl'];
        } else {
            Log::critical('DUITKU TRANSACTION INIT FAILED:' . $httpCode);
        }
    }
}
