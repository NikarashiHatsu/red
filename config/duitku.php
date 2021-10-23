<?php

return [
    /**
     * Duitku Merchant Code, usually consist 5 string and digits.
     * Check https://sandbox.duitku.com/merchant/Project.
     */
    'merchant_code' => env('DUITKU_MERCHANT_CODE'),

    /**
     * Project API Key, random string and digits.
     * Check https://sandbox.duitku.com/merchant/Project.
     */
    'api_key' => env('DUITKU_API_KEY'),

    /**
     * Determine whether app use production or sandbox mode.
     */
    'production' => env('DUITKU_PRODUCTION'),
];