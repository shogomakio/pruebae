@extends('layouts.adminMenu')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>TEST for Address</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        @if(!empty($arr))
        <form action="{{route('shop.address')}}" method="post">
            <div class="form-group">
                <label for="product_id">郵便番号</label> 
                <input type="text" id="zip" name="zip" class="form-control" value="{{$zipp}}">
            </div>
            <div class="form-group">
                <label for="name">sadsadsa</label> 
                <input type="text" city="stateName" name="stateName" class="form-control" value="{{$arr->stateName}}">
            </div>
            <div class="form-group">
                <label for="detail">市区部</label> 
                <input type="text" id="city" name="city" class="form-control" value="{{$arr->city}}">
            </div>
            <div class="form-group">
                <label for="price">町名</label> 
                <input type="text" id="street" name="street" class="form-control" value="{{$arr->street}}">
            </div>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Register</button>
            {{csrf_field()}}
        </form>
        @else
        <form action="{{route('shop.address')}}" method="post">
                <div class="form-group">
                    <label for="product_id">郵便番号</label> 
                    <input type="text" id="zip" name="zip" class="form-control">
                </div>
                <div class="form-group">
                    <label for="name">都道府県</label> 
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="detail">市区部</label> 
                    <input type="text" id="detail" name="detail" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="price">町名</label> 
                    <input type="text" id="price" name="price" class="form-control">
                </div>
                <hr>
                <button type="submit" class="btn btn-primary pull-right">Register</button>
                {{csrf_field()}}
            </form>
            @endif
    </div>
</div>
@endsection