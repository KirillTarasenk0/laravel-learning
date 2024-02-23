<form action="" method="post">
    @csrf
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div><label for="userName">Введите имя</label></div>
    <input id="userName" name="userName" type="text" placeholder="Имя"/>
    <div><label for="userEmail">Введите Email</label></div>
    <input id="userEmail" name="userEmail" placeholder="Email" type="email"/>
    <div><label for="userPassword">Введите пароль</label></div>
    <input id="userPassword" name="userPassword" placeholder="Пароль" type="password"/>
    <div><label for="secondUserPassword">Повторно введите пароль</label></div>
    <input name="secondUserPassword" id="secondUserPassword" placeholder="Повторно введите пароль" type="password"/>
    <div><button type="submit">Отправить</button></div>
</form>
