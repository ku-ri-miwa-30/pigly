<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widdiv=create_log, initial-scale=1.0">
    <title>create_log</title>
</head>

<body>
    @if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <form action="/weight_logs/{{$log->id}}/update" method="post">
        @csrf
        <h1>Weight Logを追加</h1>
        <div>日付</div>
        <div><input type="date" name="date" value="{{$log->date}}"></div><br>
        @error('date')
        <div style="color:red">{{$errors->first('date')}}</div>
        @enderror
        <div>体重</div>
        <div><input type="intger" name="weight" value="{{$log->weight}}"></div><br>
        @error('weight')
        <div style="color:red">{{$errors->first('weight')}}</div>
        @enderror
        <div>摂取カロリー</div>
        <div><input type="integer" name="calories" value="{{$log->calories}}"></div><br>
        @error('calories')
        <div style="color:red">{{$errors->first('calories')}}</div>
        @enderror
        <div>運動時間</div>
        <div><input type="time" name="execise_time" value="{{$log->execise_time}}"></div><br>
        @error('execise_time')
        <div style="color:red">{{$errors->first('execise_time')}}</div>
        @enderror
        <div>運動内容</div>
        <div><input type="text" name="execise_content" value="{{$log->execise_content}}"></div><br>
        @error('execise_content')
        <div style="color:red">{{$errors->first('execise_content')}}</div>
        @enderror
        <button type="submit">登録</button><br>
    </form>
    <form action="/weight_logs" method="get">
        @csrf
        <button type="submit">戻る</button>
    </form>

    <form action="/weight_logs/{{$log->id}}/delete" method="post">
        @csrf
        <button type="submit">🗑️</button>
    </form>
</body>

</html>