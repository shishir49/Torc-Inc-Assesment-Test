<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
         
        <title>Torc Inc Test</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            label {display: block; padding: 5px; position: relative; padding-left: 20px;}
            label input {display: none;}
            label span {border: 1px solid #ccc; width: 15px; height: 15px; position: absolute; overflow: hidden; line-height: 1; text-align: center; border-radius: 100%; font-size: 10pt; left: 0; top: 50%; margin-top: -7.5px;}
            input:checked + span {background: #ccf; border-color: #ccf;}
        </style>
    </head>
    <body>
        <h3>Welcome To the Dashboard</h3>
        <a href="{{url('test')}}" style="color:red">Participate the Test</a><br>
        <a href="{{url('department-result')}}">Check Result (Department wise)</a><br>
        <a href="{{url('all-result')}}">Check Result (All)</a><br>
        <form action="{{url('logout')}}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div class="test">
            <h5>Answer the following Questions :</h5>

            <form action="{{url('submit-test')}}" method="post">
                @foreach($questionList as $questions)
                ( {{$questions->question_number}} ) {{$questions->question_title}} <br>

                @if($questions->type == "radio")
                    @foreach($questions->options as $optionList)
                        <label data-id="{{$optionList->id}}" class="get_user_option">
                        <input id="" type="radio" class="answer_option" value="{{$optionList->correct_option}}" name="{{$optionList->question_id}}" /><span class="option_content">{{$optionList->option_name}}</span> {{$optionList->option_title}}</label>
                        <!-- ( {{$optionList->option_name}} ) {{ $optionList->option_title }} <br> -->
                    @endforeach
                @elseif($questions->type == "check")
                    @foreach($questions->options as $optionList)
                        <label data-id="{{$optionList->id}}" class="get_user_option">
                        <input id="" type="checkbox" class="answer_option" value="{{$optionList->correct_option}}" name="{{$optionList->question_id}}" /><span class="option_content">{{$optionList->option_name}}</span> {{$optionList->option_title}}</label>
                        <!-- ( {{$optionList->option_name}} ) {{ $optionList->option_title }} <br> -->
                    @endforeach
                    @elseif($questions->type == "check")
                    @foreach($questions->options as $optionList)
                        <label data-id="{{$optionList->id}}" class="get_user_option option_checkbox">
                        <input id="" type="checkbox" class="answer_option" value="{{$optionList->correct_option}}" name="{{$optionList->question_id}}" /><span class="option_content">{{$optionList->option_name}}</span> {{$optionList->option_title}}</label>
                        <!-- ( {{$optionList->option_name}} ) {{ $optionList->option_title }} <br> -->
                    @endforeach
                @endif 
                <br>
                @endforeach

                <button type="submit">Submit</button>
            </form>
        </div>
    </body>
</html>
