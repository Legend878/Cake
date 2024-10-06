<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статус заказа обновлен</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
        }
        p {
            line-height: 1.6;
            color: #555555;
        }
        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777777;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #007bff; /* Цвет кнопки */
            text-decoration: none;
            border-radius: 5px;
        }
        .button:hover {
            background-color: #0056b3; /* Цвет кнопки при наведении */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Здравствуйте!</h1>
        <p>Статус вашего заказа <strong>#{{ $order }}</strong> был обновлен на:</p>
        <h2>{{ $status }}</h2>
        
        <p>Спасибо за использование нашего сервиса!</p>
        
        <p>Если у вас есть вопросы, не стесняйтесь обращаться к нам.</p>

        <a href="{{ url('/') }}" class="button">Перейти на сайт</a>

        <div class="footer">
            <p>С уважением,<br>NATALIE</p>
        </div>
    </div>
</body>
</html>