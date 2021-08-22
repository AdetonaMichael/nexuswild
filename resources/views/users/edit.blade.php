@extends('layouts.app')
@section('title')
NexusWildSkinCare | Edit Profile
@endsection
@section('adminnav')
 @include('partials.myadminav')
 @endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>
                <div class="card-body">
                    @include('partials.errors')
                   <form action="{{ route('users.update-profile') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                    </div>
                    <div class="form-group">
                        <label for="about">About Me</label>
                        <textarea class="form-control" name="about" id="about" cols="5" rows="5" >{{ $user->name }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Upadate Profile</button>
                   </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
 