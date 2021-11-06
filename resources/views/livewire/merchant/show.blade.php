<div class="bg-hero-pattern">
    <div class="max-w-md mx-auto">
        <div class="shadow-2xl">
            <x-dynamic-component
                :component="$component"
                :form-order="$form_order"
                :color-scheme-detail="$color_scheme_detail"
                :products="$products"
                :clickable-product="true"
            />
        </div>
    </div>
</div>