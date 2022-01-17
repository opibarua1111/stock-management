@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard | <span class="text-success">{{Session::get('message')}}</span></div>

                <div class="card-body">

                    @if(Auth::User()->role=='admin')
                    <table class="table table-sm table-striped">
                        <thead class="bg-dark">
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Email</td>
                            <td>Contact</td>
                            <td>status</td>
                            <td>role</td>
                            <td>Registration Date</td>
                            <td>Action</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->contact}}</td>
                                <td>{{$user->status}}</td>
                                <td>{{$user->role}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>
                                    <a href="{{route('edit-user',['id'=>$user->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete-user',['id'=>$user->id])}}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        {{$users->links()}}
                    @endif
                    @if(Auth::User()->role=='user')
                            <table class="table table-bordered">
                                <tr>
                                    <th colspan="2" class="bg-primary text-center text-light">Your Information</th>
                                </tr>
                               <tr>
                                   <th class="text-right"></th>
                                   <td>
                                       <img src="{{asset('/')}}{{Auth::user()->photo}}" style="height: 150px; width: 150px; border-radius: 50%" alt="">
                                   </td>
                               </tr>
                               <tr>
                                   <th class="text-right">Name :</th>
                                   <td>{{Auth::user()->name}}</td>
                               </tr>
                               <tr>
                                   <th class="text-right">Mobile No : </th>
                                   <td>{{Auth::user()->contact}}</td>
                               </tr>
                               <tr>
                                   <th class="text-right">Email :</th>
                                   <td>{{Auth::user()->email}}</td>
                               </tr>
                               <tr>
                                   <th class="text-right">Status :</th>
                                   <td>
                                       @if(Auth::user()->status=='active')
                                           <span class="badge badge-success">{{Auth::user()->status}}</span>
                                       @elseif(Auth::user()->status=='pending')
                                           <span class="badge badge-warning">{{Auth::user()->status}}</span>
                                       @else
                                           <span class="badge badge-danger">{{Auth::user()->status}}</span>
                                       @endif
                                   </td>
                               </tr>
                               <tr>
                                   <th class="text-right">Role :</th>
                                   <td>{{Auth::user()->role}}</td>
                               </tr>
                               <tr>
                                   <th class="text-right">Registration Date :</th>
                                   <td>{{Auth::user()->created_at}}</td>
                               </tr>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        <a href="{{route('edit-user-profile',['id'=>Auth::user()->id])}}" class="btn btn-sm btn-primary">Edit your Info</a>
                                    </td>
                                </tr>
                            </table>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
