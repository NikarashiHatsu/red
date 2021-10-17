<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreProductsInformation extends Component
{
    use WithFileUploads;

    public Product $product;

    public $products;
    public $confirm_product_deletion;
    public $product_photo_path;
    public $number_of_products;
    public $products_left;

    protected $rules = [
        'product.name' => ['required', 'string'],
        'product.price' => ['required', 'integer'],
        'product.description' => ['required', 'string'],
    ];

    public function updatedProductPhotoPath()
    {
        $this->validate([
            'product_photo_path' => ['required', 'image', 'max:4096'],
        ]);
    }

    public function add_product()
    {
        if ($this->products_left <= 0) {
            return session()->flash('error', 'Jumlah produk sudah mencapai batas maksimal');
        }

        Gate::authorize('create', Product::class);

        $this->validate();

        try {
            $this->product->product_photo_path = $this->product_photo_path->store('product_photos');
            auth()->user()->products()->save($this->product);
        } catch (\Exception $e) {
            return session()->flash('error', 'Produk gagal ditambahkan: ' . $e->getMessage());
        }

        $this->product_photo_path = null;
        $this->products = auth()->user()->products;
        $this->new_product();
        session()->flash('success', 'Produk berhasil ditambahkan');
    }

    public function edit_product(Product $product)
    {
        Gate::authorize('update', $product);

        $this->product_photo_path = null;
        $this->product = $product;
    }

    public function update_product()
    {
        Gate::authorize('update', $this->product);

        $this->validate();

        try {
            if ($this->product_photo_path) {
                if (Storage::exists($this->product->product_photo_path)) {
                    Storage::delete($this->product->product_photo_path);
                }

                $this->product->product_photo_path = $this->product_photo_path->store('product_photos');
            }

            $this->product->update();
        } catch (\Exception $e) {
            return session()->flash('error', 'Produk gagal diperbarui: ' . $e->getMessage());
        }

        $this->product_photo_path = null;
        $this->products = auth()->user()->products;
        $this->new_product();
        session()->flash('success', 'Produk berhasil diperbarui');
    }

    public function new_product()
    {
        Gate::authorize('create', Product::class);

        $this->product = new Product;
    }

    public function delete_product(Product $product)
    {
        $this->confirm_product_deletion = $product;
    }

    public function cancel_deletion()
    {
        $this->confirm_product_deletion = null;
    }

    public function confirm_deletion()
    {
        try {
            $this->confirm_product_deletion->delete();
        } catch (\Exception $e) {
            session()->flash('error', 'Produk gagal dihapus: ' . $e->getMessage());
        }

        $this->products = auth()->user()->products;
        session()->flash('success', 'Produk berhasil dihapus');
    }

    public function mount()
    {
        $this->products = auth()->user()->products;
        $this->product = new Product;
        $this->number_of_products = auth()->user()->form_order->pricing_plan->number_of_products;
        $this->products_left = $this->number_of_products - $this->products->count();
    }

    public function render()
    {
        return view('livewire.store-products-information');
    }
}
