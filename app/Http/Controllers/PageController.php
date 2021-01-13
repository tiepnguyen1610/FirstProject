<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\Customer;
use App\Bills;
use App\BillDetail;
use App\Cart;
use Session;

class PageController extends Controller
{
    public function getIndex()
    {
        $slides = Slide::all();
        $new_products = Product::orderBy('id', 'DESC')->paginate(8);
        $sale_products = Product::where('promotionprice', '>', 0)->paginate(8);       
    	return view('frontend.pages.home',compact('slides', 'new_products', 'sale_products'));
    }

    public function getTypeProduct($catid)
    {
        $typeproducts = Product::where('cat_id', $catid)->paginate(6);
        $products_other = Product::where('cat_id','<>',$catid)->paginate(3);
    	return view('frontend.pages.producttype', compact('typeproducts', 'products_other'));
    }

    public function getDetailProduct($id)
    {
        $detail_product = Product::where('id',$id)->first();
        $related_products = Product::where('cat_id',$detail_product->cat_id)
                                    ->where('id','<>',$id)->paginate(3);
        return view('frontend.pages.detailproduct', compact('detail_product','related_products'));
    }

    public function getContact()
    {
        return view('frontend.pages.contact');
    }

     public function getAbout()
    {
        return view('frontend.pages.about');
    }

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
       $bill->date_order = date('Y-m-d');
       $bill->total = $cart->totalPrice;
       $bill->payment = $request->txtPayment;
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
       return redirect()->back()->with('success','Đặt Hàng Thành Công !!!');
    }
}
