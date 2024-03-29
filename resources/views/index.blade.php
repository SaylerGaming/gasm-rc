<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Заявки</title>
</head>
<body>
    <form action="/send/assembly" method="post" style="display:flex; flex-direction:column; width:30%; margin-left: 35%">
        <h2>Сборка ПК</h2>
        @csrf
        <input type="text" name="name" placeholder="ФИО">
        <input type="text" name="phone" placeholder="телефон">
        
        <input type="radio" id="WhatsApp" name="contact" value="WhatsApp"/>
        <label for="WhatsApp">WhatsApp</label>
        <input type="radio" id="Telegram" name="contact" value="Telegram"/>
        <label for="Telegram">Telegram</label>
        <input type="radio" id="Call" name="contact" value="Call" checked />
        <label for="Call">Call</label>
        
        <textarea name="tasks" cols="30" rows="10" placeholder="Задачи компьютера"></textarea>
        
        <input type="number" name="price" placeholder="Цена до скольки">
        <input type="number" name="quantity" placeholder="Количество" value="1">

        <input type="radio" id="pickup" name="delivery" value="Самовывоз" checked/>
        <label for="pickup">Самовывоз</label>
        <input type="radio" id="delivery" name="delivery" value="Доставка"/>
        <label for="delivery">Доставка</label>
        
        <button type="submit">отправить заявку</button>
    </form>
    <br><br><br>
    <form action="/send/door-to-door" method="post" style="display:flex; flex-direction:column; width:30%; margin-left: 35%">
        <h2>Работа на дому</h2>
        @csrf
        <input type="text" name="name" placeholder="ФИО">
        <input type="text" name="phone" placeholder="телефон">
        
        <input type="radio" id="WhatsApp" name="contact" value="WhatsApp"/>
        <label for="WhatsApp">WhatsApp</label>
        <input type="radio" id="Telegram" name="contact" value="Telegram"/>
        <label for="Telegram">Telegram</label>
        <input type="radio" id="Call" name="contact" value="Call" checked />
        <label for="Call">Call</label>
        
        <textarea name="desciption" cols="30" rows="10" placeholder="Описание проблемы"></textarea>
        
        <label>Удобное время</label>
        <input type="text" name="timeDay" placeholder="День">
        <input type="text" name="timeFrom" placeholder="С:">
        <input type="text" name="timeTo" placeholder="До:">

        <input type="checkbox" name="isImmediately" value="1"/>
        <label for="pickup">Срочно</label>

        <input type="text" name="address" placeholder="Адрес">
        
        <button type="submit">отправить заявку</button>
    </form>
</body>
</html>