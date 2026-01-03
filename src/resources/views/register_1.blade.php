<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新規会員登録</title>
</head>

<body>
    <h1>PiCLy</h1>
    <h2>新規会員登録</h2>
    <h3>STEP1 アカウント情報の登録</h3>
</body>
<form action="/register" method="post">
    @csrf
    <table>
        <div>お名前</div>
        <div><input type="text" name="name" value=" {{old('name')}}" placeholder="名前を入力"></div><br>
        @error('name')
        <div>{{$errors->first('name')}}</div>
        @enderror
        <div>メールアドレス</div>
        <div><input type="email" name="email" value=" {{old('email')}}" placeholder="メールアドレスを入力"></div><br>
        @error('email')
        <div>{{$errors->first('email')}}</div>
        @enderror
        <div>パスワード</div>
        <div><input type="password" name="password" placeholder="パスワードを入力"></div>
        @error('password')
        <div>{{$error->first('password')}}</div>
        @enderror
        <div>確認用パスワード</div>
        <input name="password_confirmation" type="password">
        </div><br><br>
    </table>
    <div><button type="submit">次に進む</button>
    </div><br>
</form>
<form action="/login" method="get"><button type="submit">ログインはこちら</button>
</form>

</html>