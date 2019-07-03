<?php

return [
    // The ipstack.com issued API key
    'api_key' => env('IPSTACK_API_KEY'),

    // The default language to use when returning results from the ipstack.com API
    // Options can be found at https://ipstack.com/documentation#language
    'default_language' => env('IPSTACK_DEFAULT_LANGUAGE', 'en')
];
