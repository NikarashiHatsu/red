@push('meta')
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $product->name }}" />
<meta property="og:description" content="{{ $product->description }}" />
<meta property="og:image" itemprop="image" content="{{ url(Storage::url($product->product_photo_path)) }}">
<meta property="og:type" content="website" />
<meta property="og:updated_time" content="{{ time() }}" />
@endpush

<div class="bg-hero-pattern">
    <div class="max-w-md mx-auto">
        <div class="shadow-2xl">
            <x-dynamic-component
                :component="$component"
                :product="$product"
                :form-order="$form_order"
                :color-scheme-detail="$color_scheme_detail"
                :clickable="true"
            />
        </div>
    </div>
</div>
