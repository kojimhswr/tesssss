@extends('site.app')
@section('title', 'Edit Profile')
@section('content')
<br>
<br>
<br>
<br>
<div class="ps-section__header mb-50">
        <h3 class="ps-section__title2" data-mask="Edit Profile"></h3>
</div>
    <section class="section-content padding-y border-top">
        <div class="container">
            <div class="row">
            </div>
            <div class="row">
                <main class="col-sm-12">
                    <table class="table table-borderless">
                        <tbody>
                            <td>
                        <div class="form-group form-group--inline">
                                @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                                </div>
                                @endif
                                <form action="{{route('profile.update',['id'=>$user->id])}}" method="POST" enctype="multipart/form-data">
                                        @method('PATCH')
                                    @csrf
                                                <div class="form-group form-group--inline">
                                                  <label>First Name
                                                  </label>
                                                <input class="form-control {{$errors->has('name_first') ? 'is-invalid' : ''}}" type="text" name="name_first" value="{{Auth::user()->first_name}}" placeholder="Enter Your First Name">
                                                @if ($errors->has('name_first'))
                                                <small class="color-red text-danger">{{$errors->first('name_first')}}</small>
                                                @endif
                                                </div>
                                                <div class="form-group form-group--inline">
                                                  <label>Last Name</label>
                                                <input class="form-control {{$errors->has('name_last') ? 'is-invalid' : ''}}" type="text" name="name_last" value="{{Auth::user()->last_name}}" placeholder="Enter Your Last Name">
                                                @if ($errors->has('name_last'))
                                                <small class="color-red text-danger">{{$errors->first('name_last')}}</small>
                                                @endif
                                                </div>
                                                <div class="form-group form-group--inline">
                                                    <label>Password
                                                    </label>
                                                    <input class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" type="password" placeholder="Enter New Password">
                                                    <div>Leave password blank to keep current password</div>
                                                    @if ($errors->has('password'))
                                                    <small class="color-red text-danger">{{$errors->first('password')}}</small>
                                                    @endif
                                                </div>
                                                <div class="form-group form-group--inline">
                                                    <label>Confrimation Password
                                                    </label>
                                                    <input class="form-control" name="password_confirmation" type="password" placeholder="Confirmation New Password">
                                                </div>
                                                <div class="form-group form-group--inline">
                                                    <input type="submit" value="SAVE" class="button btn-primary btn-md">
                                                </div>
                                </form>
                        </div>
                </main>
            </div>
        </div>
    </section>
@stop
