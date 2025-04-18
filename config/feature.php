<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    |
    | This file is for storing the feature flags used in the application.
    |
    */

    'surat_jalan' => env('ENABLE_SURAT_JALAN', 'false') === 'true',
];