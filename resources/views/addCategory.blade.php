@extends('layout')

@section('title')
    <title>Category page</title>
@endsection

@section('content')

    <form action="{{route('category.store')}}" method="post" class="signup-form">
        @csrf
        <h2>Add Category
        </h2>
        <input type="text" placeholder="Name" name="category_name" required>
        <textarea placeholder="Description" name="category_description" required></textarea>
        <button type="submit">Save</button>
    </form>
@endsection
