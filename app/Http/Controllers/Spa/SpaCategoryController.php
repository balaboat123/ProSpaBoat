<?php

namespace App\Http\Controllers\Spa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\spa_category;
use Illuminate\Support\Facades\DB;

class SpaCategoryController extends Controller
{
    public function index()
    {
        $spa_category = DB::table('spa_categories')
        ->paginate(3);

        return view('Spa.SpaCategoryDashboard')
        ->with('spa_categories',$spa_category);
    }

    public function create()
    {
        return view('/Spa/SpaCategoryForm');
    }

    public function insert(Request $request)
    {
        $id_gen= DB::table('spa_categories')->max('spa_id_category');

        if($id_gen == null){
            $emp_idgen = "SER-000";
        }
        else if($id_gen != null){
            $substr = substr($id_gen,-3)+1;

            if($substr<10){
                $emp_idgen="SER".'-'."00".$substr;
            }
            elseif($substr >= 10 && $substr<=99){
                $emp_idgen="SER".'-'."0".$substr;
            }
            elseif($substr <=100){
                $emp_idgen="SER".'-'.$substr;
            }
        }
        $request->validate([
            'spa_category_name' => 'required|unique:spa_categories|max:30'
        ]);
        $spa_category=new spa_category;
        $spa_category->spa_id_category = $emp_idgen;
        $spa_category->spa_category_name = $request->spa_category_name;
        $spa_category->save();
        return redirect('/Spa/SpaCategoryDashboard');
    }

    public function edit($spa_id_category)
    {
        $spa_categories = spa_category::find($spa_id_category);


        return view('Spa.EditSpaCategory',['spa_categories'=>$spa_categories]);
    }

    public function update(Request $request,$spa_id_category)
    {
        $request->validate([
            'spa_category_name' => 'required|unique:spa_categories|max:30'
        ]);

        $spa_category=spa_category::find($spa_id_category);
        $spa_category->spa_category_name=$request->spa_category_name;
        $spa_category->save();
        return redirect('/Spa/SpaCategoryDashboard');
    }

    public function remove($spa_id_category)
    {
        spa_category::destroy($spa_id_category);
        return redirect('/Spa/SpaCategoryDashboard');
    }

    public function search(Request $request)
    {
        $result=$request->search;
        $spa_category = DB::table('spa_categories')
        ->where('spa_id_category',"LIKE","%{$result}%")
        ->orwhere('spa_category_name',"LIKE","%{$result}%")
        ->paginate(3);

        return view("Spa.SearchSpaCategory")
        ->with("spa_categories",$spa_category);
    }
}
