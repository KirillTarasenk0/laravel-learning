<div>
    <h1>Оцените товар</h1>
    <div>
        <form action="" method="post">
            @csrf
            <div>
                <h3>Ноутбук</h3>
                <input name="ladtop" type="number" step="1" min="1" max="5"/>
            </div>
            <div>
                <h3>Телевизор</h3>
                <input name="tv" type="number" step="1" min="1" max="5"/>
            </div>
            <div>
                <h3>Машина</h3>
                <input name="car" type="number" step="1" min="1" max="5"/>
            </div>
            <button name="sendRating" type="submit">Отправить</button>
        </form>
        <div>Средняя оценка товаров: {{ $averageRating }}</div>
    </div>
</div>
