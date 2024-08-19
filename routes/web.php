<?php

use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::controller(ProductController::class)->group(function () {

    // get all the products to index products
    Route::get('/', 'index')->name('products.index');
    Route::get('/product/{id}', 'show')->name('product.show');

    Route::prefix('admin')->group(function () {

         // get all the products to index admin
        Route::get('/', 'indexAdmin')->name('admin.index');

        // form view to create a new product
        Route::get('/product', 'create')->name('product.create');

        // back-end to create a new product
        Route::post('/product', 'store')->name('product.store');

        // form view to edit informations of product
        Route::get('/product/{id}', 'edit')->name('product.edit');

        // back-end to update a product
        Route::put('/product/{id}', 'update')->name('product.update');

        // back-end to delete a product
        Route::delete('/product/{id}', 'destroy')->name('product.destroy');

    });
   
});