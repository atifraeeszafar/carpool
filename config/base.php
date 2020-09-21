<?php

/*
 * The default file system disk used is 'Public'.
 * Any path unless specified is relative to 'storage/app/public'.
 */

return [

    /**
    |--------------------------------------------------------------------------
    | Default file upload configurations
    |--------------------------------------------------------------------------
     */

    'uploads' => [
        'image' => [
            'encode' => 'jpg',
            'allowed_mime' => ['jpeg', 'png', 'bmp'],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | User specific configurations
    |--------------------------------------------------------------------------
     */

    'user' => [
        'upload' => [
            'profile-picture' => [
                'path' => 'uploads/user/profile-picture/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | Driver specific configurations
    |--------------------------------------------------------------------------
     */

    'driver' => [
        'upload' => [
            'profile-picture' => [
                'path' => 'uploads/driver/profile-picture/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | Sytem-Admin specific configurations
    |--------------------------------------------------------------------------
     */

    'system-admin' => [
        'upload' => [
            'logo' => [
                'path' => 'uploads/system-admin/logo/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | User specific configurations
    |--------------------------------------------------------------------------
     */

    'types' => [
        'upload' => [
            'images' => [
                'path' => 'uploads/types/images/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | Companies specific configurations
    |--------------------------------------------------------------------------
     */

    'company' => [
        'upload' => [
            'images' => [
                'path' => 'uploads/company/icons/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | Driver Documents specific configurations
    |--------------------------------------------------------------------------
     */

    'driver_documents' => [
        'upload' => [
            'images' => [
                'path' => 'uploads/driver/documents/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 1000,
                ],
            ],
        ],
    ],
    /**
    |--------------------------------------------------------------------------
    | Default common configurations
    |--------------------------------------------------------------------------
     */

    'default' => [
        /*
                     * The paths are relative to the public folder 'public'.
        */
        'user' => [
            'profile_picture' => '/static/images/default-profile-picture.jpg',
        ],

    ],

    'pdf' => [
        'generator' => 'dompdf.wrapper',
    ],

     /**
    *|--------------------------------------------------------------------------
    *| Country specific configurations
    *|--------------------------------------------------------------------------
    */
    'country' => [
        'upload' => [
            'flag' => [
                'path' => 'uploads/country/flags/',
                'image' => [
                    'min_resolution' => 100,
                    'store_resolution' => 150,
                    'max_file_size_kb' => 10000,
                ],
            ],
        ],
    ],

    /**
    |--------------------------------------------------------------------------
    | Web/App configurations
    |--------------------------------------------------------------------------
     */

    'web' => [
        'verification' => [
            'google' => env('GOOGLE_VERIFICATION_KEY'),
            'bing' => env('BING_VERIFICATION_KEY'),
        ],

        'links' => [
            'facebook' => env('FACEBOOK_LINK'),
            'twitter' => env('TWITTER_LINK'),
            'instagram' => env('INSTAGRAM_LINK'),
            'google_plus' => env('GOOGLEPLUS_LINK'),
            'linkedin' => env('LINKEDIN_LINK'),
        ],
    ],

    'payment_gateway' => [
        'braintree' => [
            'class' => 'App\Base\Payment\BrainTree'
        ],
        'stripe' => [
            'class' => 'App\Base\Payment\Stripe'
        ]
    ],

];
