@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2 class="text-success text-center">{{Session::get('message')}}</h2>
                <table class="table table-sm table-striped">
                    <thead class="bg-success">
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Description</td>
                        <td>Status</td>
                        <td>Created By</td>
                        <td>Created at</td>
                        <td>Updated at</td>
                        <td>Action</td>
                    </tr>
                    </thead>
                    <tbody>
                    @php($n=1)
                    @foreach($brands as $brand)
                        <tr>
                            <td>{{$n++}}</td>
                            <td>{{$brand->name}}</td>
                            <td>{{$brand->description}}</td>
                            <td>{{$brand->status}}</td>
                            <td>{{$brand->uname}}</td>
                            <td>{{$brand->created_at}}</td>
                            <td>{{$brand->updated_at}}</td>
                            <td>
{{--                                <a {{Auth::user()->role=='admin'?"href=".route('edit-brand',['id'=>$brand->id]).".":''}}  class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>--}}
{{--                                <a {{Auth::user()->role=='admin'?"href=".route('delete-brand',['id'=>$brand->id])."":''}} class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>--}}
                                <a href="{{route('edit-brand',['id'=>$brand->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                <a href="{{route('delete-brand',['id'=>$brand->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Do you want to delete this?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
