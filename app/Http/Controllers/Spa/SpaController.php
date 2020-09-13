<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\spa_category;
use App\spa;
use App\spa_formula;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class SpaController extends Controller
{
    public function index()
    {
        $spa = DB::table('spas')
        ->paginate(3);
        return view('Spa.SpaDashboard')
        ->with('spas',$spa)
        ->with('spa_categories',spa_category::all());
    }

    public function create()
    {
        $product = DB::table('products')
        ->select('pro_id','pro_name')
        ->get();
        return view('Spa.SpaForm')
        ->with('products',$product)
        ->with('spa_categories',spa_category::all());

    }

    public function insert(Request $request)
    {
        $request->validate([
            'spa_name' => 'required',
            'spa_image' => 'required|max:5000',
            'spa_description' => 'required',
            'spa_category_id',
            'spa_price' => 'required',
            'spa_time' => 'required',
        ]);

        $id_gen= DB::table('spas')->max('spa_id');

        if($id_gen == null){
            $spa_idgen = "SPA-000";
        }
        else if($id_gen != null){

            $substr = substr($id_gen,-3)+1;

            if($substr<10){
                $spa_idgen="SPA".'-'."00".$substr;
            }
            elseif($substr >= 10 && $substr<=99){
                $spa_idgen="SPA".'-'."0".$substr;
            }
            elseif($substr <=100){
                $spa_idgen="SPA".'-'.$substr;
            }
        }


        $Format=base64_encode('_'.time());
        $image=$request->file('spa_image')->getClientOriginalExtension();
        $imageFormat=$Format.".".$image;
        $imageData = File::get($request->spa_image);
        Storage::disk('local')->put('public/spa_image/'.$imageFormat,$imageData);

        $spa =new spa;
        $spa->spa_id = $spa_idgen;
        $spa->spa_name = $request->spa_name;
        $spa->spa_image = $imageFormat;
        $spa->spa_description = $request->spa_description;
        $spa->spa_category_id = $request->spa_category_id;
        $spa->spa_price = $request->spa_price;
        $spa->spa_time = $request->spa_time;
        $spa->save();

        foreach($request['id_pro'] as $item => $value){
            $array_formula = array(
                'id_spa' => $spa_idgen,
                'id_pro' => $request['id_pro'][$item],
                'volume' => $request['volume'][$item],
            );

            spa_formula::create($array_formula);
        }
        return redirect('/Spa/SpaDashboard');
    }

    public function edit($spa_id)
    {
        $spa=spa::find($spa_id);
        return view('Spa.EditSpa',['spa'=>$spa])
        ->with('spa_categories',spa_category::all());
    }

    public function update(Request $request, $spa_id)
    {
        $request->validate([
            'spa_name' => 'required',
            //'spa_image' => 'required|max:5000',
            'spa_description' => 'required',
            'spa_category_id',
            'spa_price' => 'required',
            'spa_time' => 'required',
        ]);

        if($request->hasFile("spa_image")){
            $spaimage=spa::find($spa_id);
            $imageOld=Storage::disk('local')->exists("public/spa_image/".$spaimage->spa_image);
            if($imageOld){
                Storage::delete("public/spa_image/".$spaimage->spa_image);
            }
            $request->spa_image->storeAs("public/spa_image/",$spaimage->spa_image);
        }

        $spa=spa::find($spa_id);
        $spa->spa_name = $request->spa_name;
        $spa->spa_description = $request->spa_description;
        $spa->spa_category_id = $request->spa_category_id;
        $spa->spa_price = $request->spa_price;
        $spa->spa_time = $request->spa_time;

        // dd($spa);
        $spa->save();
        return redirect('/Spa/SpaDashboard');
    }

    public function remove($spa_id)
    {
        $spaimage=spa::find($spa_id);
        $imageOld=Storage::disk('local')->exists("public/spa_image/".$spaimage->spa_image);
            if($imageOld){
                Storage::delete("public/spa_image/".$spaimage->spa_image);
            }

        spa::destroy($spa_id);
        return redirect('/Spa/SpaDashboard');
    }

    public function search(Request $request)
    {
        $result=$request->search;
        $spa = DB::table('spas')
        ->join('spa_categories','spas.spa_category_id',"LIKE",'spa_categories.spa_id_category')
        ->where('spa_id',"LIKE","%{$result}%")
        ->orwhere('spa_name',"LIKE","%{$result}%")
        ->orwhere('spa_category_name',"LIKE","%{$result}%")
        ->paginate(3);


        return view("Spa.SearchSpa")
        ->with("spas",$spa)
        ->with('spa_categories',spa_category::all());
    }
}
