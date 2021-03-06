@extends('layouts.adminMenu')



@section('content')
<div class="row  alert-info ">
    <div class="col-md-4 col-md-offset-4">
        <h1>Administrator Login</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.index')}}" method="post">
            <div class="form-group">
                <label for="email">E-mail</label> 
                <input type="email" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="pasword">Password</label> 
                <input type="password" id="password" name="password" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Sign In</button>
            {{csrf_field()}}
        </form>
        {{--  <p>Don't have an account?<a href="{{route('user.signup')}}">Sign up!</a></p>  --}}
    </div>
</div>
@endsection