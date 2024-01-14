<p>ФИО: {{ $data['name'] }}</p>
<p>Задача: {{ $data['description'] }}</p>
<p>Время: {{ $data['timeDay'] }} {{ $data['timeFrom'] }}-{{ $data['timeTo'] }}</p>
<p>Адрес: {{ $data['address'] }}</p>
<p>телефон: {{ $data['phone'] }}</p>
<p>Предпочитаемая связь: {{ $data['contact'] }}</p>
@if($data['isImmediately'])
    <p>Срочно</p>
@endif