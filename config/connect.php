<?php

return [
  'service' => [
    'client_id' => env('SERVICE_KEY'),
    'client_secret' => env('SERVICE_SECRET'),
    'redirect' => env('SERVICE_REDIRECT_URI')
  ],
];