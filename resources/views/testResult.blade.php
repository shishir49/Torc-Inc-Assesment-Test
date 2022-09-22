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

            .search, button { padding:5px; background: #eee;cursor:pointer;outline:none;border:none; }
            table { margin-top: 20px; }
        </style>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
        <h3>Welcome To the Dashboard</h3>
        <a href="{{url('test')}}">Participate the Test</a><br>
        <a href="{{url('test-result')}}" style="color:red">Test Result</a><br>
        <form action="{{url('logout')}}" method="post">
            @csrf
            <button type="submit">Logout</button>
        </form>

        <div class="test">
            <h3>Test Result</h3>

            <form action="{{url('test-result')}}" method="get">
                <h5>Get Test Result By :</h5>
                <select name="search" class="search" id="">
                    @if($filter == 1)
                    <option value="1">Department 1</option>
                    <option value="0">All</option>
                    <option value="2">Department 2</option>
                    @elseif($filter == 2)
                    <option value="2">Department 2</option>
                    <option value="0">All</option>
                    <option value="1">Department 1</option>
                    @else
                    <option value="0">All</option>
                    <option value="1">Department 1</option>
                    <option value="2">Department 2</option>
                    @endif
                </select>
                <button type="submit">Submit</button>
            </form>

            <table>
                <thead>
                    <th>#Position</th>
                    <th>Name</th>
                    <th>Score</th>
                </thead>
                <tbody>
                    @foreach($results as $key => $result)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $result->users->name }}</td>
                        <td>{{ $result->total_score }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script>
            $(document).ready(function(){
                $('.search').on('change',function(e){

                    var search = $('.search').val();
                    ele.parents(".test-question").find(".option_id").val(option);
                    ele.parents(".test-question").find(".is_correct").val(is_correct);
                })
            });

        </script>
    </body>
</html>
