<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Система розрахунку чисельності студентів</title>

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .hide, .hideSubject, .hideRowQualification, .addRowQualification{display: none;}
    </style>

</head>

<body>

<!— Navigation —>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">



            <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" style="border-bottom-width: 1px;margin-bottom: 10px;margin-top: 10px;">Вихід із системи</button>
            </form>
        </div>
        <!— /.navbar-collapse —>
    </div>
    <!— /.container —>
</nav>

<!-- Page Content -->
<div class="container">

    <h2 style="text-align: center;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><strong>Інструкція</strong></span></h2>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1">Для правильного використання системи, будь-ласка, уважно прочитайте інструкцію по використанню.</span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1">Щоб додати новий предмет необхідно:</span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Натистуни на кнопку "Додати предмет".</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Вибрати в таблиці необхідний предмет із всього списку.</span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб змінити ступіть студентів необхідно:</span></span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Спочатку додати предмет.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Вибрати в таблиці із всього списку необхідний ступіть.</span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб додати аспірантуру, необхідно настиснути на кнопку "Додати аспірантуру".</span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб додати докторантуру, необхідно натиснути на кнопку&nbsp;<span data-mce-mark="1">"Додати докторантуру".</span></span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Щоб провезти розрахунки таблиці необхідно:</span></span></span></p>
    <ol>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Додати предмет.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Додати ступінь студентів.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Заповнити кількість студентів денної і заочної форми.</span></li>
        <li><span style="font-size: medium; font-family: verdana, geneva;">Натиснути на кнопку&nbsp;<span style="text-align: justify;" data-mce-mark="1">"Розрахувати".</span></span></li>
    </ol>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1"><span style="font-size: medium;" data-mce-mark="1">Після введення всіх данних з'явиться нова, повна таблиця с розрахунками. Нову таблицю можна зберегти в форматах: Excel, PDF; відправити на почту, або роздрукувати її. Для цього потрібно використовувати горизонтальне меню, в якому знаходяться функції, які були описані вище.&nbsp;</span></span></span></span></p>
    <p style="text-align: justify; text-indent: 1.5em;"><span style="font-size: medium; font-family: verdana, geneva;"><span style="font-size: medium;"><span style="font-size: medium;"><span style="font-size: medium;">Увага! В випадку, коли була допущена помилка при введенні данних, чи не повністю заповнена таблиця, потрібно натиснути на кнопку&nbsp;<span style="font-size: medium;">"Редагувати таблицю". Користувач автоматично повернеться до першої таблиці і зможе змінити або додати необхідну інформацію. Для збереження таблиці знову, всі кроки повторюються.&nbsp;</span></span></span></span></span></p>




        <button type="button" onClick='location.href="{{route('table')}}"'
                class="btn btn-primary center-block" style=" border-bottom-width: 1px; margin-bottom: 10px;">Почати розрахунок</button>




</div>
<!-- /.container -->

<!-- jQuery -->
<script src="/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.min.js"></script>



</body>

</html>
