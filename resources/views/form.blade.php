<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
</head>
<body>
    <form action="" method="POST">
        @csrf
        <label for="name">Name</label>
        <div><input type="text" id="name" name="name" placeholder="Введите имя"/></div>
        <label for="email">Email</label>
        <div><input type="email" id="email" name="email" placeholder="Введите email"/></div>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
