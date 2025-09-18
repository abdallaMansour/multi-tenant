<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

$prefix = Request::segment(1);

// admin routes
Route::group(['prefix' => $prefix, 'middleware' => 'is_tenant'], function () use ($prefix) {
    Route::get('/', function () use ($prefix) {
        return view('tenants.' . $prefix . '.index-shop');
    });
});


Route::get('view_tenant', function () {
    return view('Landing.dist.index-shop');
});
