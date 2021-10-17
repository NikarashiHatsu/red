<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class StoreProductsInformation extends Component
{
    use WithFileUploads;

    /**
     * List of the products.
     *
     * @var mixed
     */
    public $products;

    /**
     * The product instance.
     *
     * @var Product
     */
    public Product $product;

    /**
     * A single photo of the form.
     *
     * @var mixed
     */
    public $product_photo_path;

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
        $this->product = $product;
    }

    public function update_product()
    {
        $this->validate();

        try {
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
        $this->product = new Product;
    }

    public function mount()
    {
        $this->products = auth()->user()->products;
        $this->product = new Product;
    }

    public function render()
    {
        return view('livewire.store-products-information');
    }
}
