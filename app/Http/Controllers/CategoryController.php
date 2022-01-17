<?php

namespace App\Http\Controllers;

use App\category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        //$categories = Category::all();
        $categories = DB::table('categories')
            ->join('users','users.id','=','categories.user_id')
            ->select('categories.*','users.name as user_name')
            ->get();
        return view('backend.category.index', ['categories'=>$categories]);
    }
    public function create(){
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
//        $category = new Category();
//        $category->name = $request->name;
//        $category->description = $request->description;
//        $category->user_id = Auth::user()->id;
//        $category->save();
        category::create($request->all());
        return redirect('create-category')->with('message','Category Added Successfully');
    }
    public function delete($id)
    {
        $categorise = Category::find($id);
        $categorise->delete();
        return redirect('categories')->with('message','Category Delete Successfully');
    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('backend.category.edit',['category'=>$category]);
    }
    public function update(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->update();
        return redirect('categories')->with('message','Category update Successfully');
    }

}
