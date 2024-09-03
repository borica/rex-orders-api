<?php

use Illuminate\Support\Facades\Route;

Route::get('/public', function () {
    return response()->json(['message' => 'Api ready to receive requests.']);
});
