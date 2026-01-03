<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>体重管理画面</title>
</head>

<body>
    @if (Auth::check())
    <form action="/logout" method="post">
        @csrf
        <div><button type='submit'>ログアウト</button></div><br>
    </form>
    @endif
    <div>目標体重</div>
    <div>{{ $targetWeight ?? '未設定' }} kg</div>
    dd({{$targetWeight}});
    <div>{{ $targetWeight }} kg</div>
    <div>目標まで</div>
    @if ($diffWeight !== null)
    -{{ $diffWeight }} kg
    @else
    未設定
    @endif</div><br>
    <div>最新体重</div>
    <div>{{ $currentWeight }} kg</div>
    <form action="/weight_logs/search" method=get>
        @csrf
        <input type="date" name="start_date">～
        <input type="date" name="end_date"><button type="submit"> 検索</button>
    </form>
    </div>
    <form action="/weight_logs/create" method="get"><button type="submit"> データ追加</button></form>
    <table>
        <tr>
            <th>日付</th>
            <th>体重</th>
            <th>摂取カロリー</th>
            <th>運動時間</th>
            <th>運動内容</th>
        </tr>
        @foreach ($logs as $log)
        <tr>
            <td>{{$log->date}}</td>
            <td>{{$log->weight}}</td>
            <td>{{$log->calories}}</td>
            <td>{{$log->execise_time}}</td>
            <td>{{$log->execise_content}}</td>
            <td>
                <a href="/weight_logs/{{$log->id}}">
                    @csrf<button type="submit">✏</button>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>