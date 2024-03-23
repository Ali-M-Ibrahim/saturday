@extends('layout')

@section('title')
    <title>First page</title>
@endsection

@section('content')

        <form class="signup-form">
            <h2>

                @if($flag)
                    The value is true
                @else
                    The value is false
                @endif


                @for($i=0;$i<10;$i++)

                    @if($i==3) @continue @endif
                    {{$i}}

                    @endfor
            </h2>
            <h2>{{$global_variable}}</h2>
            <input type="text" placeholder="Name" value="{{$product->name}}" required>
            <textarea placeholder="Description" required> {{$product->description}}</textarea>
            <input type="number" placeholder="price" value="{{$product->price}}">
            <button type="submit">Sign Up</button>
        </form>
@endsection
