<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widdiv=create_log, initial-scale=1.0">
    <title>create_log</title>
</head>

<body>
    <form action="/weight_logs/create" method="post">
        @csrf
        <h1>Weight Logを追加</h1>
        <div>日付</div>
        <div><input type="date" name="date"></div>
        @error('date')
        <div style="color:red">{{$errors->first('date')}}</div><br>
        @enderror

        <div>体重</div>
        <div><input type="integer" name="weight"></div>
        @error('weight')
        <div style="color:red">{{$errors->first('weight')}}</div><br>
        @enderror

        <div>摂取カロリー</div>
        <div><input type="integer" name="calories"></div>
        @error('calories')
        <div style="color:red">{{$errors->first('calories')}}</div><br>
        @enderror

        <div>運動時間</div>
        <div><input type="time" name="execise_time"></div>
        @error('execise_time')
        <div style="color:red">{{$errors->first('execise_time')}}</div><br>
        @enderror

        <div>運動内容</div>
        <div><input type="text" name="execise_content"></div>
        @error('execise_content')
        <div style="color:red">{{$errors->first('execise_content')}}</div><br>
        @enderror

        </table>

        <button type="submit">登録</button><br>
    </form>
    <form action="/weight_logs" method="get"><button type="submit">戻る</button></form>
</body>

</html>