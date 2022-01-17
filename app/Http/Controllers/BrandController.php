<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('backend.brand.create');
    }
    public function store(Request $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->user_id = Auth::user()->id;
        $brand->save();
        return redirect('brands')->with('message','Brand Added Successfully');
    }
    public function index(){
        //$brands = Brand::all();
        $brands = DB::table('brands')
            ->join('users','users.id','=','brands.user_id')
            ->select('brands.*','users.name as uname')
            ->get();
        return view('backend.brand.index', ['brands'=>$brands]);
    }
    public function edit($id){
        $brand = Brand::find($id);
        return view('backend.brand.edit',['brand'=>$brand]);
    }
    public function update(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->update();
        return redirect('brands')->with('message','Brand update Successfully');
    }
    public function delete($id)
    {
        $brand = Brand::find($id);
        $brand->delete();
        return redirect('brands')->with('message','Brand Delete Successfully');
    }
}
