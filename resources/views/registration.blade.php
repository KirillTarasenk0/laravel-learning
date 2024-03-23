@php
use Illuminate\View\Middleware\ShareErrorsFromSession;
@endphp

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User registration</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        <label for="email">Введите email</label>
        <div><input id="email" type="email" name="email" placeholder="Email:"/></div>
        <label for="pass">Введите пароль</label>
        <div><input id="password" type="password" name="password" placeholder="Введите пароль"/></div>
        <label for="pass_confirmation">Введдите подтверждение пароля</label>
        <div><input id="pass_confirmation" type="password" name="pass_confirmation" placeholder="Подтвердите пароль"/></div>
        <button type="submit">Отправить</button>
    </form>
    @if($errors->any())
        <div>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @else
        <div>Регистрация прошла успешно</div>
    @endif
</body>
</html>
