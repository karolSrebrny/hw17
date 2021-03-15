@extends('layout')

@section('content')

    <form action="" method="post">
        @csrf

        @if($errors->has('email'))
            @foreach($errors->get('email') as $error)
                <p style="color: red">{{$error}}</p>
            @endforeach
        @endif
    <label for="email">Email:</label>
    <input type="email" name="email" id="email">
    <br>
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>
    <br>

    <input type="submit" value="login">


</form>


@endsection
