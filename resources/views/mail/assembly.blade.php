<!DOCTYPE html>
<html>
<head>
    <title>Новый заказ: Сборка ПК</title>
</head>
<body>
    <p>Бюджет: {{ $data['price'] }}</p>
    <p>Задача: {{ $data['tasks'] }}</p>
    <p>Количество: {{ $data['quantity'] }}</p>
    <p>ФИО: {{ $data['name'] }}</p>
    <p>телефон: {{ $data['phone'] }}</p>
    <p>Предпочитаемая связь: {{ $data['contact'] }}</p>
    <p>{{ $data['delivery'] }}</p>
</body>
</html>