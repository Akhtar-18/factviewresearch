@extends('layout')
@section('title','Users Edit')
@section('page')
<div class="container-fluid">


<!-- Page Heading -->
<!-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> -->

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
        <a href="{{ route('users.index') }}">
            <span class="btn btn-primary float-right">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> Back
            </span>
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('users.update',$user->id)}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    @method('patch')
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control"
                                placeholder="Enter name"
                                name="name"
                                value="{{ $user->name }}"
                                required>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control"
                                placeholder="Enter email"
                                name="email"
                                value="{{ $user->email }}"
                                required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control"
                                placeholder="Enter password"
                                name="password"
                                value="{{ $user->password }}"
                                required>
                                @if ($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Confirm Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control"
                                placeholder="Enter confirm-password"
                                name="confirm-password"
                                value="{{ $user->password }}"
                                required>
                                @if ($errors->has('confirm-password'))
                                    <span class="text-danger">{{ $errors->first('confirm-password') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="mb-2">Roles<span class="text-danger">*</span></label>
                               <select class="form-control select2" name="roles" required>
                                <option value="">Select Role</option>
                                @foreach($roles as $list)
                                @if($userRole==$list)
                                <option selected>{{ $list }}</option>
                                @else
                                <option>{{ $list }}</option>
                                @endif
                                @endforeach
                               </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <button class="btn btn-success">Save</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

</div>
@endsection
