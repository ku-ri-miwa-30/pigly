<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>

<body>
    <h1>PiGLy</h1>
    <h2>ログイン</h2>
    <form action="/login" method="post">
        @csrf
        <div>メールアドレス</div>
        <div><input type="email" name="email" placeholder="メールアドレスを入力"></div>
        @error('email')
        <div style="color:red">{{$errors->first('email')}}</div>
        @enderror
        <div>パスワード</div>
        <div><input type="password" name="password" placeholder="パスワードを入力"></div>
        @error('password')
        <div style="color:red">{{$errors->first('password')}}</div>
        @enderror
        <button type="submit">ログイン</button>
    </form>
</body>

</html>