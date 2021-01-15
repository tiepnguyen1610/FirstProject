<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Bills;
use App\BillDetail;
use App\Cart;
use Session;

class CheckoutController extends Controller
{
     public function getCheckout()
    {
        $cart = new Cart();
        return view('frontend.pages.checkout',compact('cart'));
    }

    public function postCheckout(Request $request)
    {
       $cart = new Cart();

       $customer = new Customer();
       $customer->fullname      = $request->txtFullname;
       $customer->email         = $request->txtEmail;
       $customer->address       = $request->txtAddress;
       $customer->phone_number  = $request->txtPhone;
       $customer->note          = $request->txtNote;
       $customer->save();

       $bill = new Bills();
       $bill->id_customer = $customer->id;
       $bill->date_order = date('Y-m-d H:i:s');
       $bill->total = $cart->totalPrice;
       $bill->payment = $request->payment;
       $bill->note = $request->txtNote;
       $bill->save();

       foreach($cart->items as $key => $item){
            $bill_detail = new BillDetail();
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $item['quantity'];
            $bill_detail->unitprice = $item['price'];
            $bill_detail->save();
       }
       Session::forget('cart');
       return redirect()->back()->with('messages','Đặt Hàng Thành Công !!!');
    }
}
