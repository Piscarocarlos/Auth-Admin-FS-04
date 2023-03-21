@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 offset-md-3">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <h5 class="text-center my-4">Create New user</h5>
                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="name" class="col-sm-4 col-form-label">Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="name" name="name">
                                    @error('name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="staticEmail" name="email">
                                    @error('email')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="role" class="col-sm-4 col-form-label">Role User</label>
                                <select name="role" id="" class="col-sm-8 form-select">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                    <option value="seller">Seller</option>
                                    <option value="delivery">Delivery</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary w-100">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
