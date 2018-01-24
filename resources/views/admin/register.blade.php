@extends('layouts.adminMenu')

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1>Register product</h1>
        @if(count($errors)>0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif
        <form action="{{route('admin.register')}}" method="post">
            <div class="form-group">
                <label for="product_id">ID</label> 
                <input type="integer" id="product_id" name="product_id" class="form-control">
            </div>
            <div class="form-group">
                <label for="name">Product Name</label> 
                <input type="text" id="name" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label> 
                <input type="text" id="detail" name="detail" class="form-control">
            </div>
            <div class="form-group">
                <label for="price">Price</label> 
                <input type="integer" id="price" name="price" class="form-control">
            </div>
            <div class="form-group">
                <ul class="dropdown-menu">
                    <li>停止</li>
                    <li role="separator" class="divider"></li>
                    <li>公開</li>
                    <li role="separator" class="divider"></li>
                </ul>
            </div>            
            <div class="form-group">
                <label for="image_path">Image Path</label> 
                <input type="text" id="image_path" name="image_path" class="form-control">
            </div>
            <div class="form-group">
                <ul class="dropdown-menu">
                    <li>停止</li>
                    <li role="separator" class="divider"></li>
                    <li>公開</li>
                    <li role="separator" class="divider"></li>
                </ul>
            </div>     
            <table class="table">
                <tr>
                <td>
                    <p>Genre</p>
                    <select name="genre">
                        @foreach($genres as $genre)
                        <option value="{{$genre['genre_id']}}" >{{$genre['genre_name']}}</option>
                        @endforeach
                    </select>
                    </td>
                    <td>
                    <p>Brand</p>
                    <select name="brand">
                        @foreach($brands as $brand)
                        <option value="{{$brand['brand_id']}}" >{{$brand['brand_name']}}</option>
                        @endforeach
                    </select>
                    </td>
            </tr>
            </table>
            <hr>
            <button type="submit" class="btn btn-primary pull-right">Register</button>
            {{csrf_field()}}
        </form>
    </div>
</div>
@endsection