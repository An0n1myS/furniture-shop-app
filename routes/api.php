<?php

use Illuminate\Support\Facades\Route;

// Админка
Route::prefix('v1')->group(function () {
    require 'admin/cart.php';
    require 'admin/cart_item.php';
    require 'admin/category.php';
    require 'admin/collection.php';
    require 'admin/color.php';
    require 'admin/delivery.php';
    require 'admin/gallery.php';
    require 'admin/material.php';
    require 'admin/order.php';
    require 'admin/payment.php';
    require 'admin/photo.php';
    require 'admin/product.php';
    require 'admin/user.php';
});

// Сайт
Route::prefix('v1')->group(function () {
    require 'site/cart.php';
    require 'site/cart_item.php';
    require 'site/category.php';
    require 'site/collection.php';
    require 'site/color.php';
    require 'site/delivery.php';
    require 'site/gallery.php';
    require 'site/material.php';
    require 'site/order.php';
    require 'site/payment.php';
    require 'site/photo.php';
    require 'site/product.php';
    require 'site/user.php';
});
