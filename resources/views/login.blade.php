@extends('layout.visitor')

@section('content')
<div class="container">
    <div class="login">
    <h4>Please Login in order to access your dashboard</h4>
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
    </div>

    <div class="registration">
    <h4>Or Register if you are new</h4>
    <form action="{{url('registration')}}" method="POST">
        @csrf
        <label>
            Name
        </label>
        <br>
        <input type="text" name="name"> 
        <br>
        <label>
            Department Id
        </label>
        <br>
        <select name="department_id" id="">
            <option value="1">Department 1</option>
            <option value="2">Department 2</option>
        </select> 
        <br>
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
    </div>
    <div class="message">
    @if(session('msg'))
    <p style="color:red;background:#eee;padding:5px;">
      {{session('msg')}}
    </p>
    </div>
    @endif

    @if(session('success_msg'))
    <p style="color:green;background:#eee;padding:5px;">
      {{session('success_msg')}}
    </p>
    </div>
    @endif
    
</div>

@endsection