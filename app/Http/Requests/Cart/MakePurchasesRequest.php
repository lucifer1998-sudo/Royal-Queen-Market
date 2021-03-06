<?php

namespace App\Http\Requests\Cart;

use App\Exceptions\RequestException;
use App\Marketplace\Cart;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class MakePurchasesRequest extends FormRequest
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
//            'cointype' => ['required', Rule::in(array_keys(config('coins.coin_list')))],
        ];
    }

    public function persist()
    {
        $couponCheck = 0;
        $discount = 0;
        foreach (Cart::getCart() -> items() as $item) {
            if (isset($item->discount)) {
                $couponCheck += 1;
                $discount = $item->discount;
                break;
            } else {
                break;
            }
        }

        if ($couponCheck > 0) {
            try{
                DB::beginTransaction();
                // foreach item in cart
                foreach (Cart::getCart() -> items() as $productId => $item){
                    // Purchase procedure
                    $item -> purchased($discount);
                    // Persist the purchase
                    $item -> save();
                }
                DB::commit();
                // Clear cart after commiting
                Cart::getCart() -> clearCart();
            }
            catch(RequestException $requestException){
                DB::rollBack();
                Log::error($requestException -> getMessage());
                throw new RequestException($requestException -> getMessage());
            }
            catch (\Exception $e){
                \Illuminate\Support\Facades\Log::error($e->getMessage());
                DB::rollBack();
                Log::error($e -> getMessage());
                throw new RequestException('Error happened! Try again later!');
            } 
        } else {
            try{
                DB::beginTransaction();
                // foreach item in cart
                
                foreach (Cart::getCart() -> items() as $productId => $item){
                    // Purchase procedure
                    $item -> purchased(0);
                    // Persist the purchase
                    $item -> save();
                }
                DB::commit();
                // Clear cart after commiting
                Cart::getCart() -> clearCart();
            }
            catch(RequestException $requestException){
                DB::rollBack();
                Log::error($requestException -> getMessage());
                throw new RequestException($requestException -> getMessage());
            }
            catch (\Exception $e){
                \Illuminate\Support\Facades\Log::error($e->getMessage());
                DB::rollBack();
                Log::error($e -> getMessage());
                throw new RequestException('Error happened! Try again later!');
            }
        }

        // try{
        //     #dd(Cart::getCart() -> items());
        //     DB::beginTransaction();
        //     // foreach item in cart
        //     foreach (Cart::getCart() -> items() as $productId => $item){
        //         // Purchase procedure
        //         $item -> purchased();
        //         // Persist the purchase
        //         $item -> save();
        //     }
        //     DB::commit();
        //     // Clear cart after commiting
        //     Cart::getCart() -> clearCart();
        // }
        // catch(RequestException $requestException){
        //     DB::rollBack();
        //     Log::error($requestException -> getMessage());
        //     throw new RequestException($requestException -> getMessage());
        // }
        // catch (\Exception $e){
        //     \Illuminate\Support\Facades\Log::error($e->getMessage());
        //     DB::rollBack();
        //     Log::error($e -> getMessage());
        //     throw new RequestException('Error happened! Try again later!');
        // }
    }
}
