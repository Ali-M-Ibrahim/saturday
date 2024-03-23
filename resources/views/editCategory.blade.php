@extends('layout')

@section('title')
    <title>Category page</title>
@endsection

@section('content')

    <form action="{{route('category.update',['category'=>$category->id])}}" method="post" class="signup-form">
        @csrf
        @method('put')
        <h2>Add Category
        </h2>
        <input type="text" placeholder="Name" value="{{$category->name}}" name="category_name" required>
        <textarea placeholder="Description" name="category_description" required>{{$category->description}}</textarea>
        <button type="submit">Save</button>
    </form>
@endsection
