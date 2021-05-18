<?php


Route::get('index', 'Admin\AdminController@index') -> name('admin.index');

// Categories routes
Route::get('categories', 'Admin\AdminController@categories') -> name('admin.categories');
Route::post('category/create', 'Admin\AdminController@newCategory') -> name('admin.categories.new');
Route::get('category/remove/{id}', 'Admin\AdminController@removeCategory') -> name('admin.categories.delete');
Route::get('category/{id}', 'Admin\AdminController@editCategoryShow') -> name('admin.categories.show');
Route::post('category/{id}', 'Admin\AdminController@editCategory') -> name('admin.categories.edit');

// Mass message routes
Route::get('bulletin', 'Admin\AdminController@massMessage') -> name('admin.messages.mass');
Route::post('bulletin/post', 'Admin\AdminController@sendMessage') -> name('admin.messages.send');
Route::post('bulletin/user/post', 'Admin\AdminController@userMessage') -> name('admin.messages.usersend');

// User routes
Route::get('users','Admin\UserController@users')->name('admin.users');
Route::post('users/search','Admin\UserController@usersPost')->name('admin.users.query');
Route::get('users/{user?}','Admin\UserController@userView')->name('admin.users.view');

Route::post('users/update/grouping/{user}','Admin\UserController@editUserGroup')->name('admin.user.edit.group');
Route::post('users/update/details/{user}','Admin\UserController@editBasicInfo')->name('admin.user.edit.info');

Route::post('users/ban/{user}', 'Admin\UserController@banUser')->name('admin.user.ban');
Route::get('users/remove/ban/{ban}', 'Admin\UserController@removeBan')->name('admin.ban.remove');


// Log
Route::get('logs','Admin\LogController@showLog')->name('admin.log');

// Products
Route::get('listings','Admin\ProductController@products')->name('admin.products');
Route::post('listings/search','Admin\ProductController@productsPost')->name('admin.products.query');
Route::post('listing/remove','Admin\ProductController@deleteProduct')->name('admin.product.delete');
Route::get('listing/{id}/{section?}', 'Admin\ProductController@editProduct') -> name('admin.product.edit');

Route::get('purchases', 'Admin\ProductController@purchases')->name('admin.purchases');


// Bitmessage
Route::get('bitmessage','Admin\BitmessageController@show')->name('admin.bitmessage');

// Disputes
Route::get('disputes', 'Admin\AdminController@disputes') -> name('admin.disputes');
Route::get('purchase/{purchase}', 'Admin\AdminController@purchase') -> name('admin.purchase');

// Support tickets
Route::get('tickets', 'Admin\AdminController@tickets') -> name('admin.tickets');
Route::get('ticket/{ticket}', 'Admin\AdminController@viewTicket') -> name('admin.tickets.view');
Route::get('ticket/{ticket}/solve', 'Admin\AdminController@solveTicket') -> name('admin.tickets.solve');
Route::post('tickets/action','Admin\AdminController@ticketActions')->name('admin.ticket.action');

// Vendor purchases
Route::get('vendor/purchases', 'Admin\AdminController@vendorPurchases') -> name('admin.vendor.purchases');

// Featured products

Route::get('products/featured','Admin\ProductController@featuredProductsShow')->name('admin.featuredproducts.show');
Route::get('products/featured/mark/{product}','Admin\ProductController@markAsFeatured')->name('admin.product.markfeatured');

Route::post('products/featured/remove','Admin\ProductController@removeFromFeatured')->name('admin.featuredproducts.remove');

// Remove tickets

Route::post('tickets/remove','Admin\AdminController@removeTickets')->name('admin.tickets.remove');

// Invites
Route::get('invite/create','Admin\InviteController@create')->name('admin.invite.create');
Route::post('invite/create','Admin\InviteController@store')->name('admin.invite.store');
Route::post('invite/create/outside','Admin\InviteOutsideController@store')->name('admin.invite.outside.store');
