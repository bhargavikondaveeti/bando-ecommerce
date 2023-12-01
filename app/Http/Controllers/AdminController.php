<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\order;
use Notification;
use PDF;
use Validator;
use App\Notifications\GtaSendEmail;



class AdminController extends Controller
{
    public function view_catagory()
    {
        $data=category::all();
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data= new category;
        $data-> catagory_name= $request->catagory;
        $data->save();
        return redirect()->back()->with('message','Catagory Added Successfully');

    }
    public function delete_catagory($id)
    {
        $data=category::find($id);
        $data->Delete();
        return redirect()->back()->with('message','Deleted Successfully');
    }

    public function view_product()
    {
        $category = category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request)
    {
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->image = $request->image;
        $product->catagory = $request->catagory;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $image=$request->image;
        $imagename=time().'.'. $image->getClientOriginalExtension();

        $request->image->move('product', $imagename );

        $product->image=$imagename;


        $product->save();
        return redirect()->back()->with('message','product added successfully');


    }

    public function show_product()
    {
        $product=product::all();

        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product deleted ');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $catagory=category::all();

        return view('admin.update', compact('product','catagory'));
    }
    public  function update_product_confirm(Request $request, $id)
    {
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->descritpion;
        $product->catagory=$request->catagory;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;

        $image=$request->image;

        $product->image=$request->image;
        $image=$request->image;
        $imagename=time().'.'. $image->getClientOriginalExtension();

        $request->image->move('product', $imagename );

        $product->image=$imagename;


        $product ->save();

        return redirect()->back() ->with('message', 'Product updated successfully');

    }

    public function order()
    {
        $order=order::all();


        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order=order::find($id);
        $order -> delivery_status='delivered';
        $order -> payment_status='Order complete';
        $order->save();

        return redirect()->back();


    }

    public function print($id)
    {
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));

        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order=order::find($id);

        return view('admin.email_info', compact('order'));
    }

    public function send_user_email(Request $request, $id)
    {
        $order=order::find($id);

        $details=
            [
                'greeting'=>$request->greeting,
                'firstline'=>$request->firstline,
                'body'=>$request->body,
                'button'=>$request->button,
                'url'=>$request->url,
                'lastline'=>$request->lastline,
            ];
        Notification::send($order, new GtaSendEmail($details));

        return redirect()->back();

    }

    public function search(Request $request)
    {
        $searchText=$request->search;
        $order=order::where('name', 'LIKE',"%$searchText%")->orwhere('product_title', 'LIKE',"%$searchText%")->get() ;


        return view('admin.order',compact('order'));
    }
}

