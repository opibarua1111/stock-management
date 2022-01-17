@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{__('Update User')}}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('update-user') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <div class="form-group row">
                                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('User Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>
                                        <option value="admin"{{$user->role=='admin'?'selected':''}}>Admin</option>
                                        <option value="editor"{{$user->role=='editor'?'selected':''}}>Editor</option>
                                        <option value="user"{{$user->role=='user'?'selected':''}}>User</option>
                                    </select>

                                    @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('User status') }}</label>

                                <div class="col-md-6">
                                    <select id="status" class="form-control @error('status') is-invalid @enderror" name="status" value="{{ old('status') }}" required autocomplete="status" autofocus>
                                        <option value="active"{{$user->status=='active'?'selected':''}}>Active</option>
                                        <option value="pending"{{$user->status=='pending'?'selected':''}}>Pending</option>
                                        <option value="disable"{{$user->status=='disable'?'selected':''}}>Disable</option>
                                    </select>

                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
