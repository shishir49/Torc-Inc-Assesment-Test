@extends('layout.visitor')

@section('content')
<p>{{ session('msg') }}</p>
<form action="{{url('login-action')}}" method="POST">
    @csrf
    <label>
        User Name
    </label>
    <br>
    <input type="text" name="email"> 
    <br>
    <label>
        Password
    </label>
    <br>
    <input type="password" name="password">    
    <br>
    <br>
    <button type="submit">Login</button>
</form>
@endsection