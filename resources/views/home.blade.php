@extends('layouts.lay')

@section('header')

@endsection

@section('style')
    <style>
        table{text-align: center;}
    </style>
@endsection

@section('scripts')

@endsection

@section('content')
<div class="container">

    <h2 style="text-align: center;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><strong>Інструкція</strong></span></h2>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1">Для правильного використання системи, будь-ласка, уважно прочитайте інструкцію по використанню.</span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1">Щоб додати новий предмет, необхідно:</span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Натистуни на кнопку "Додати предмет".</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Із запропонованого в таблиці списку предметів вибрати необхідний предмет.</span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб змінити ступінь студентів,  необхідно: </span></span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Додати предмет. </span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Вибрати зі списку в таблиці необхідний ступінь. </span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб додати аспірантуру, необхідно натиснути на кнопку "Додати аспірантуру".</span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб додати докторантуру, необхідно натиснути на кнопку&nbsp;<span data-mce-mark="1">"Додати докторантуру".</span></span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб провести розрахунки таблиці, необхідно: </span></span></span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Додати предмет.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Додати ступінь студентів.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Заповнити кількість студентів денної та заочної форм навчання. </span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Натиснути на кнопку&nbsp;<span style="text-align: justify;" data-mce-mark="1">"Розрахувати".</span></span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Після введення всіх даних з'явиться нова, заповнена таблиця з розрахунками. Цю таблицю можна зберегти у форматах: Excel, PDF; відправити на електронну пошту, або роздрукувати її.  Для цього потрібно використовувати горизонтальне меню, в якому знаходяться функції, які були описані вище. &nbsp;</span></span></span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;"><span style="font-size: medium;"><span style="font-size: medium;"><span style="font-size: medium;">Увага! У випадку, якщо була допущена помилка при введенні даних, або ж  не повністю заповнена таблиця, потрібно натиснути на кнопку "Редагувати таблицю". Користувач автоматично повернеться до першої таблиці і зможе змінити або додати необхідну інформацію. Для повторного збереження таблиці всі кроки  повторюються.&nbsp;</span></span></span></span></p>




        <button type="button" onClick='location.href="{{route('table')}}"'
                class="btn btn-primary center-block" style=" border-bottom-width: 1px; margin-bottom: 10px;">Почати розрахунок</button>




</div>
@endsection
