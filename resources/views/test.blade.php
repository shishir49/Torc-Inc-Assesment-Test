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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <h3>Welcome To the Dashboard</h3>
        <a href="{{url('test')}}" style="color:red">Participate the Test</a><br>
        <a href="{{url('test-result')}}">Test Result</a><br>
        <form action="{{url('logout')}}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @if($alreadyParticipated === 1)
        <div class="test">
            <p>You already have participated, please check the <a href="{{url('test-result')}}">Result List</a></p>
        </div>
        @else
        <div class="test">
            <h5>Answer the following Questions :</h5>

            <form action="{{url('submit-test')}}" method="post">
                @csrf
                <input type="text" name="department_id" value="{{$User->department_id}}">
                @foreach($questionList as $questions)
                <div class="test-question">
                    ( {{$questions->question_number}} ) {{$questions->question_title}} <br>
                    <input type="hidden" name="question_id[]" value="{{$questions->id}}">
                    <input type="hidden" class="correct_answer" name="correct_answer[]" value="{{$questions->correct_option}}">
                    <input type="hidden" class="option_id" name="option_id[]" value="{{$questions->option_id}}">
                    <input type="hidden" class="is_correct" name="is_correct[]" value="{{$questions->option_id}}">
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
                </div>    
                @endforeach

                <button type="submit">Submit</button>
            </form>
        </div>
        @endif

        

        <script>
            $(document).ready(function(){
                $('.answer_option').on('change',function(e){
                    e.preventDefault();
                    var ele = $(this);
                    var is_correct;
                    var option = $(this).parent("label").find(".option_content").html();
                    var notOp = ele.parents("div").find(".user_answer").val();
                    var correct_answer = ele.parents(".test-question").find(".correct_answer").val();
                    console.log(option+','+correct_answer);
                    if(option == correct_answer){
                        is_correct = 1;
                    }else{
                        is_correct = 0;
                    }
                    ele.parents(".test-question").find(".option_id").val(option);
                    ele.parents(".test-question").find(".is_correct").val(is_correct);
                })
            });

        </script>
    </body>
</html>
