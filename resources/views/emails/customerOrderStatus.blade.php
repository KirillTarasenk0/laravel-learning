<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Order Status mail</title>
</head>
<body>
    <h1>Приветствуем Вас, {{$customerFirstName}} {{$customerLastName}}</h1>
    <p>Стутус Вашего заказа с номером {{$orderNumber}} был изменён на {{$orderStatus}}</p>
</body>
</html>
