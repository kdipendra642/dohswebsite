@extends('backend.layout.master')

@section('mainContent')

<section class="wrapper">
    <!-- page start-->
    <div class="row">
        <aside class="profile-nav col-lg-3">
            <section class="card">
                <div class="user-heading round">
                    <h1>{{$user->name}}</h1>
                    <p>{{$user->email}}</p>
                </div>
            </section>
        </aside>
        <aside class="profile-info col-lg-9">
            <section class="card">
                <div class="bio-graph-heading">
                    Password Update
                </div>
                <div class="card-body bio-graph-info">
                    <h1>Password Update</h1>
                    <form action="{{ route('password.update', $user->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="current_password" class="col-sm-2 col-form-label">Current Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="current_password" placeholder="Password" name="current_password" value="{{ old('current_password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="{{ old('password')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password_confirmation" placeholder="Password" name="password_confirmation" value="{{ old('password_confirmation')}}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Submit</button>

                    </form>
                </div>
            </section>
        </aside>
    </div>
    <!-- page end-->
</section>
@endsection