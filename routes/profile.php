<?php

/**
 * All routes related to user profile
 * Grouped under the prefix "profile" and under auth middleware
 */
Route::prefix('profile')->group(function(){
    Route::post('vendor/fiat','ProfileController@saveCurrency')->name('profile.vendor.currency');
    Route::get('index','ProfileController@index')->name('profile.index');
    Route::post('updatepass', 'ProfileController@changePassword')-> name('profile.password.change'); // change password route
    Route::get('2fa/{turn}', 'ProfileController@change2fa') -> name('profile.2fa.change'); // change 2fa

    // add or remove to whishlist
    Route::get('add/wishlist/{product}', 'ProfileController@addRemoveWishlist') -> name('profile.wishlist.add');
    Route::get('wishlist', 'ProfileController@wishlist') -> name('profile.wishlist');

    // PGP routes
    Route::get('pgp', 'ProfileController@pgp') -> name('profile.pgp');
    Route::post('pgp', 'ProfileController@pgpPost') -> name('profile.pgp.post');
    Route::get('pgp/auth', 'ProfileController@pgpConfirm') -> name('profile.pgp.confirm');
    Route::post('pgp/auth', 'ProfileController@storePGP') -> name('profile.pgp.store');
    Route::get('pgp/change', 'ProfileController@oldpgp') -> name('profile.pgp.old');

    Route::get('application/vendor', 'ProfileController@becomeVendor') -> name('profile.vendor.become');
    Route::get('application', 'ProfileController@become') -> name('profile.become');
    Route::post('application/fromcode', 'ProfileController@becomeVendorFromCode') -> name('profile.become.fromcode');

    Route::post('vendor/wallet', 'ProfileController@changeAddress') -> name('profile.vendor.address'); // add address to account
    Route::get('vendor/wallet/remove/{id}', 'ProfileController@removeAddress') -> name('profile.vendor.address.remove'); // add address to account

    // Vendor routes
    Route::get('vendor', 'VendorController@vendor') -> name('profile.vendor');
    Route::post('vendor/update/profile','VendorController@updateVendorProfilePost')-> name('profile.vendor.update.post');
    // Product add basic info
    Route::get('vendor/product/create/{type?}', 'VendorController@addBasicShow') -> name('profile.vendor.product.add');
    Route::post('vendor/product/creating/{product?}', 'VendorController@addShow') -> name('profile.vendor.product.add.post');
    // Add remove offers
    Route::get('vendor/product/pricing/update', 'VendorController@addOffersShow') -> name('profile.vendor.product.offers');
    Route::post('vendor/product/pricing/create/{product?}', 'VendorController@addOffer') -> name('profile.vendor.product.offers.add'); // add offer
    Route::get('vendor/product/pricing/remove/{quantity}/{product?}', 'VendorController@removeOffer') -> name('profile.vendor.product.offers.remove'); // add offer
    // Delivery
    Route::get('vendor/product/shipping/update', 'VendorController@addDeliveryShow') -> name('profile.vendor.product.delivery');
    Route::post('vendor/product/shipping/update/{product?}', 'VendorController@newShipping') -> name('profile.vendor.product.delivery.new');
    Route::post('vendor/product/shipping/other/{product?}', 'VendorController@newShippingOption') -> name('profile.vendor.product.delivery.options');
    Route::get('vendor/product/shipping/remove/{index}/{product?}', 'VendorController@removeShipping') -> name('profile.vendor.product.delivery.remove');
    // digital section
    Route::get('vendor/product/digital/add', 'VendorController@addDigitalShow') -> name('profile.vendor.product.digital');
    Route::post('vendor/product/digital/add/{product?}', 'VendorController@addDigital') -> name('profile.vendor.product.digital.post');

    // Images section
    Route::get('vendor/product/assets/update', 'VendorController@addImagesShow') -> name('profile.vendor.product.images');
    Route::get('vendor/product/assets/remove/{id}/{product?}', 'VendorController@removeImage') -> name('profile.vendor.product.images.remove');
    Route::get('vendor/product/assets/primary/{id}/{product?}', 'VendorController@defaultImage') -> name('profile.vendor.product.images.default');
    Route::post('vendor/product/assets/update/{product?}', 'VendorController@addImage') -> name('profile.vendor.product.images.post'); // new image

    // New product
    Route::post('vendor/product/post', 'VendorController@newProduct') -> name('profile.vendor.product.post');
    // Delete product
    Route::get('vendor/product/{product}/remove/confirm', 'VendorController@confirmProductRemove') -> name('profile.vendor.product.remove.confirm');
    Route::get('vendor/product/{id}/remove', 'VendorController@removeProduct') -> name('profile.vendor.product.remove');
    // Toggle product visibility
    Route::get('vendor/product/{product}/change/confirm', 'VendorController@confirmToggleProduct') -> name('profile.vendor.product.toggle.confirm');
    Route::get('vendor/product/{product}/change', 'VendorController@toggleProduct') -> name('profile.vendor.product.toggle');



    // Edit Product
    Route::get('vendor/product/update/{product}/part/{section?}', 'VendorController@editProduct') -> name('profile.vendor.product.edit');

    // Sales routes
    Route::get('sales/{state?}', 'VendorController@sales') -> name('profile.sales');
    Route::get('sale/{sale}', 'VendorController@sale') -> name('profile.sales.single');
    Route::get('sales/{sale}/sent/confirm', 'VendorController@confirmSent') -> name('profile.sales.sent.confirm');
    Route::get('sale/{sale}/sent', 'VendorController@markAsSent') -> name('profile.sales.sent');


    // Cart routes
    Route::get('cart', 'ProfileController@cart') -> name('profile.cart');
    Route::post('cart/{product}/add', 'ProfileController@addToCart') -> name('profile.cart.add');
    Route::get('cart/clear', 'ProfileController@clearCart') -> name('profile.cart.clear');
    Route::get('cart/remove/{product}', 'ProfileController@removeProduct') -> name('profile.cart.remove');
    Route::get('checkout', 'ProfileController@checkout') -> name('profile.cart.checkout');
    Route::get('make/purchase', 'ProfileController@makePurchases') -> name('profile.cart.make.purchases');

    // Purchases routes
    Route::get('purchases/{state?}', 'ProfileController@purchases') -> name('profile.purchases');
    Route::get('purchases/{purchase}/post', 'ProfileController@purchaseMessage') -> name('profile.purchases.message');
    Route::get('purchase/{purchase}', 'ProfileController@purchase') -> name('profile.purchases.single');
    Route::get('purchase/{purchase}/completed/release', 'ProfileController@deliveredConfirm') -> name('profile.purchases.delivered.confirm');
    Route::get('purchase/{purchase}/completed', 'ProfileController@markAsDelivered') -> name('profile.purchases.delivered');

    // canceled for both Vendor and Buyer
    Route::get('purchase/{purchase}/cancelled/confirm', 'ProfileController@confirmCanceled') -> name('profile.purchases.canceled.confirm');
    Route::get('purchase/{purchase}/cancelled', 'ProfileController@markAsCanceled') -> name('profile.purchases.canceled');

    // Purchase - Disputes
    Route::post('purchase/{purchase}/dispute', 'ProfileController@makeDispute') -> name('profile.purchases.dispute');
    Route::post('purchase/start-dispute/{dispute}/raise/message', 'ProfileController@newDisputeMessage') -> name('profile.purchases.disputes.message');
    Route::post('purchase/{purchase}/dispute/resolve', 'Admin\AdminController@resolveDispute') -> name('profile.purchases.disputes.resolve');

    // Purchase - Feedbacks
    Route::post('purchase/{purchase}/comment/create', 'ProfileController@leaveFeedback') -> name('profile.purchases.feedback.new');

    /**
     * Messages
     */
    Route::middleware(['can_read_messages'])->group(function () {
        Route::get('communicatons/{conversation?}', 'MessageController@messages') -> name('profile.messages');
        Route::post('communicatons/chat/create', 'MessageController@startConversation') -> name('profile.messages.conversation.new');
        Route::get('communicatons/chats/show', 'MessageController@listConversations') -> name('profile.messages.conversations.list');
        Route::post('communicatons/{conversation}/post/create', 'MessageController@newMessage') -> name('profile.messages.message.new');
        Route::get('communicatons/{conversation}/postage', 'MessageController@newMessage') -> name('profile.messages.send.message'); // get request for redirecting from new conversation
    });
    Route::get('communicatons/inbox/auth','MessageController@decryptKeyShow')->name('profile.messages.decrypt.show');
    Route::post('communicatons/inbox/auth','MessageController@decryptKeyPost')->name('profile.messages.decrypt.post');

    /**
     * Notifications
     */

    Route::get('alerts','NotificationController@viewNotifications')->name('profile.notifications');
    Route::post('alerts/remove','NotificationController@deleteNotifications')->name('profile.notifications.delete');

    /**
     * Bitmessage
     */
    Route::get('bitmessage','BitmessageController@show')->name('profile.bitmessage');
    Route::post('bitmessage/send/code','BitmessageController@sendConfirmation')->name('profile.bitmessage.sendcode');
    Route::post('bitmessage/confirm/code','BitmessageController@confirmAddress')->name('profile.bitmessage.confirmcode');


    /**
     * Tickets
     */
    Route::get('tickets/{ticket?}', 'ProfileController@tickets') -> name('profile.tickets');
    Route::post('tickets/create', 'ProfileController@newTicket') -> name('profile.tickets.new');
    Route::post('tickets/{ticket}/raisechat', 'ProfileController@newTicketMessage') -> name('profile.tickets.message.new');

    Route::post('delivery/options','ProfileController@saveDeliverySetting')->name('profile.delivery.setting');
    /**
     * Product clone
     */
    Route::get('product/clone/{product}','ProductController@cloneProductShow')->name('profile.vendor.product.clone.show');
    Route::post('product/clone/{product}','ProductController@cloneProductPost')->name('profile.vendor.product.clone.post');

});
Route::post('message/conversation/update-read','MessageController@markAsRead')->name('profile.messages.read');


