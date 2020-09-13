<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = DB::table('products')
        ->paginate(3);
        return view('Product.ProductDashboard')
        ->with('products',$product);
    }
    public function create()
    {

        return view('/Product/createProduct');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'pro_name' => 'required',
            'pro_image' ,
            'pro_description' ,
            'pro_volume' ,
            'pro_purchase' ,
            ]);

        $id_gen= DB::table('products')->max('pro_id');

        if($id_gen == null){
            $pro_idgen = "PRO-000";
        }
        else if($id_gen != null){

            $substr = substr($id_gen,-3)+1;

            if($substr<10){
                $pro_idgen="PRO".'-'."00".$substr;
            }
            elseif($substr >= 10 && $substr<=99){
                $pro_idgen="PRO".'-'."0".$substr;
            }
            elseif($substr <=100){
                $pro_idgen="PRO".'-'.$substr;
            }
        }

        $Format=base64_encode('_'.time());
        $image=$request->file('pro_image')->getClientOriginalExtension();
        $imageFormat=$Format.".".$image;
        $imageData = File::get($request->pro_image);
        Storage::disk('local')->put('public/product_image/'.$imageFormat,$imageData);

        $product =new Product;
        $product->pro_id = $pro_idgen;
        $product->pro_name = $request->pro_name;
        $product->pro_image = $imageFormat;
        $product->pro_description = $request->pro_description;
        $product->pro_volume = $request->pro_volume;
        $product->pro_purchase =$request->pro_purchase;
        $product->save();
        return redirect('/Product/ProductDashboard');
    }

    public function edit($pro_id)
    {
        $product=Product::find($pro_id);
        return view('Product.EditProduct',['product'=>$product]);
    }

    public function update(Request $request, $pro_id)
    {
        $request->validate([
            'pro_name' => 'required',
            'pro_image' ,
            'pro_description' ,
            'pro_volume' ,
            'pro_purchase' ,
        ]);
        if($request->hasFile("pro_image")){
            $proimage=Product::find($pro_id);
            $imageOld=Storage::disk('local')->exists("public/product_image/".$proimage->pro_image);
            if($imageOld){
                Storage::delete("public/product_image/".$proimage->pro_image);
            }
            $request->pro_image->storeAs("public/product_image/",$proimage->pro_image);
        }

        $product=Product::find($pro_id);
        $product->pro_name = $request->pro_name;
        $product->pro_description = $request->pro_description;
        $product->pro_volume = $request->pro_volume;
        $product->pro_purchase =$request->pro_purchase;
        $product->save();


        return redirect('/Product/ProductDashboard');
    }

    public function remove($pro_id)
    {
        $proimage=Product::find($pro_id);
        $imageOld=Storage::disk('local')->exists("public/product_image/".$proimage->pro_image);
            if($imageOld){
                Storage::delete("public/product_image/".$proimage->pro_image);
            }

        Product::destroy($pro_id);
        return redirect('/Product/ProductDashboard');
    }

    public function search(Request $request)
    {
        $result=$request->search;
        $product = DB::table('products')
        ->where('pro_id',"LIKE","%{$result}%")
        ->orwhere('pro_name',"LIKE","%{$result}%")
        ->orwhere('pro_volume',"LIKE","%{$result}%")
        ->paginate(3);

        return view("Product.SearchProduct")
        ->with("products",$product);
    }
}
