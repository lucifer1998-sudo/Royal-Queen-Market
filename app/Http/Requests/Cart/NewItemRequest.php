<?php

namespace App\Http\Requests\Cart;

use App\Exceptions\RequestException;
use App\Marketplace\Cart;
use App\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivery' => 'nullable|exists:shippings,id',
            'amount' => 'numeric|required',
            'message' => 'nullable|string',
            'coin' => ['required' , Rule::in(array_keys(config('coins.coin_list')))],
            'type' => ['required', Rule::in(array_keys(\App\Purchase::$types))],
        ];
    }

    public function persist(Product $product)
    {
        $shipping = null;
        throw_if($product->user->id == auth()->user()->id, new RequestException('You can\'t put your products in cart!'));
        // select shipping
        if($product -> isPhysical())
            $shipping = $product -> specificProduct() -> shippings()
                -> where('id', $this -> delivery)
                -> where('deleted', '=', 0) // is not deleted
                -> first();
        Cart::getCart() -> addToCart($product, $this -> amount, $this -> coin, $shipping, $this -> message, $this -> type);
    }

    public function couponPersist(Product $product, $deduct) {
        //dd(Cart::getCart());
         $x = $product;
        //$product->offers[0]->price = $deduct;

        //dd($product);
        $shipping = null;
        throw_if($product->user->id == auth()->user()->id, new RequestException('You can\'t put your products in cart!'));
        // select shipping
        if($x -> isPhysical())
            $shipping = $product -> specificProduct() -> shippings()
                -> where('id', $this -> delivery)
                -> where('deleted', '=', 0) // is not deleted
                -> first();
        Cart::getCart() -> addToCartCoupon($product, $this -> amount, $this -> coin, $shipping, $this -> message, $this -> type, $deduct);
    }
}
