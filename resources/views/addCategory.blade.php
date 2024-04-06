@extends('layout')

@section('title')
    <title>Category page</title>
@endsection

@section('content')

    <form action="{{route('category.store')}}" method="post" class="signup-form">
        @csrf
        <h2>Add Category
        </h2>
        <input type="text" value="{{old('category_name')}}" placeholder="Name" name="category_name" >
        @error('category_name')
        <div class="alert alert-danger">Hello from vergine</div>
        @enderror
        <textarea placeholder="Description" name="category_description" >{{old('category_description')}}</textarea>
        @error('category_description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit">Save</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

@endsection
