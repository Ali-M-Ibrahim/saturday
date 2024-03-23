@extends('layout')

@section('title')
    <title>product page</title>
@endsection

@section('content')

    <form action="{{route('product.store')}}" method="post" class="signup-form">
        @csrf
        <h2>Add product
        </h2>
        <input type="text" placeholder="Name" name="product_name" required>
        <textarea placeholder="Description" name="product_description" required></textarea>
        <input type="text" placeholder="price" name="product_price" required>
        <select name="product_category">

            @foreach($cats as $obj)
                <option value="{{$obj->id}}">{{$obj->name}}</option>

            @endforeach
        </select>
        <button type="submit">Save</button>
    </form>
@endsection
