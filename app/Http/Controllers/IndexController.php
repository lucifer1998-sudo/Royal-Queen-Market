<?php

namespace App\Http\Controllers;

use App\Category;
use App\Marketplace\Cart;
use App\Marketplace\FeaturedProducts;
use App\Marketplace\ModuleManager;
use App\Marketplace\Payment\Escrow;
use App\Marketplace\Payment\VergeCoin;
use App\Product;
use App\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Controller for all always public routes
 *
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * Handles the index page request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function home() {

        if (!ModuleManager::isEnabled('FeaturedProducts'))
            $featuredProducts = null;
        else
            $featuredProducts = FeaturedProducts::get();
        $products = Product::paginate(12);
        return view('tailwind-ui.welcome', [
            'productsView' => session() -> get('products_view'),
//            'products' => Product::inRandomOrder()->limit(12)->get(), // this is the old; for welcome page
            'products' => $products,
            'categories' => Category::roots(),
            'featuredProducts' => $featuredProducts
        ]);
    }

    /**
     * Redirection to sing in
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login() {

        return redirect()->route('auth.logins');
    }

    public function confirmation(Request $request) {
        return view('confirmation');
    }

    /**
     * Show category page
     *
     * @param Category $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function category(Category $category) {
//        return view('category', [
        return view('tailwind-ui.shops', [
            'productsView' => session() -> get('products_view'),
            'category' => $category,
            'products' => $category->childProducts(),
            'categories' => Category::roots(),
        ]);
    }

    /**
     * Show vendor page, 6 products, and 10 feedbacks
     *
     * @param Vendor $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vendor(Vendor $user) {
        return view('tailwind-ui.profile.vendor.index',[
            'vendor' => $user->user
        ]);

    }
    /**
     * Show page with vendors feedbacks
     *
     * @param Vendor $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function vendorsFeedbacks(Vendor $user) {
        return view('vendor.feedback', [
            'vendor' => $user->user,
            'feedback' => $user->feedback()->orderByDesc('created_at')->paginate(20),
        ]);
    }


    /**
     * Sets in session which view are we using
     *
     * @param $list
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setView($list)
    {
        session() -> put('products_view', $list);
        return redirect() -> back();
    }

}
