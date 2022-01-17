<?php

namespace App\Http\Controllers;
use App\category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use file;
use Illuminate\Support\Str; //uuid

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('home',['users'=>$users]);
    }

    public function editUser($id){
        $user = User::find($id);
        return view('auth/user/edit-user',['user'=>$user]);
    }
    public  function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/home')->with('message','User Delete Successfully');
    }
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $user->role = $request->role;
        $user->status = $request->status;
        $user->update();
        return redirect('/home')->with('message','User value Updated Successfully');
    }
    public function editUserprofile($id){
        $user = User::find($id);
        return view('auth/user/edit-user-profile',['user'=>$user]);
    }
    public function updateUserProfile(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        if ($request->name!=null)
        {
            $user->name = $request->name;
        }

        if ($request->contact!=null)
        {
            $user->contact = $request->contact;
        }

        if ($request->file('photo')!=""){
              $image= $request->file('photo');
              $ext = $image->getClientOriginalExtension();
              $name = str::uuid().'_'.$request->name.'.'.$ext;
              $dir = 'images/';
              $image->move($dir,$name);
              $user->photo = $dir.$name;
        }
        $user->update();
        return redirect('/home')->with('message','profile Updated Successfully');
    }

}
