@extends('layouts.app')


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-5">
                <div class="list-group">
                    <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                        Dashboard
                    </a>
                    <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action">Create new user</a>
                    <a href="#" class="list-group-item list-group-item-action">Settings</a>
                    <a href="#" class="list-group-item list-group-item-action">Profile</a>
                    <a class="list-group-item list-group-item-action disabled">Pages</a>
                </div>
            </div>
        </div>
    </div>
@endsection
