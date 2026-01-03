<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録step2</title>
</head>

<body>
    <h1>PiCLy</h1>
    <h2>新規会員登録</h2>
    <h3>STEP2 体重データの入力</h3>
</body>
<form action="/register/step2" method="post">
    @csrf
    <table>
        <div>現在の体重</div>
        <div><input type="integer" placeholder="現在の体重"></div><br>
        <div>目標の体重</div>
        <div><input type="integer" name='target_weight' placeholder="目標の体重"></div><br>
        @error('target_weight')
        <div style="color:red">{{$errors->first('target_weight')}}</div>
        @enderror

    </table>

    <div><button type="submit">アカウント作成</button></div><br>
</form>

</html>