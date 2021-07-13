<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use Illuminate\Support\Facades\Auth;


class CartComponent extends Component
{
    // public $discount;
    // public $subtotalAfterDiscount;
    // public $taxAfterDiscount;
    // public $totalAfterDiscount;
    
    public function increaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
    }
    public function decreaseQuantity($rowId){
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
    }


    public function destroy($rowId){
        Cart::remove($rowId);
        session()->flash('success_message','Item has been removed');
    }

    public function destroyAll()
    {
        Cart::destroy();
    }

    
    // public function checkout(){
    //     if(Auth::check())
    //     {
    //         return redirect()->route('checkout');
    //     }
    //     else
    //     {
    //         return redirect()->route('login');
    //     }
    // }
    // public function setAmountForCheckout(){
    //     if(session()->has('coupon'))
    //     {
    //         session()->put('checkout',[
    //         'discount' => $this->discount,
    //         'subtotal' => $this->subtotalAfterDiscount,
    //         'tax' => $this->taxAfterDiscount,
    //         'total'=> $this->totalAfterDiscount
    //         ]);
    //     }else{
    //         session()->put('checkout',[
    //             'discount' => 0,
    //             'subtotal' => Cart::instance('cart')->subtotal(),
    //             'tax' => Cart::instance('cart')->tax(),
    //             'total'=> Cart::instance('cart')->total()
    //             ]);
    //     }
    // }
    public function render()
    {
        // if(session()->has('coupon'))
        // {
        //     if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value']){
        //         session()->forget('coupon');
        //     }else{
        //         $this->calcularteDiscounts();
        //     }
        // }
        // $this->setAmountForCheckout();
        return view('livewire.cart-component')->layout('layouts.base');
    }
}