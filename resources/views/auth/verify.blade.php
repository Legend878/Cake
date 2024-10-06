<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Код подтверждения</title>
</head>
<body>
    <div class="conteiner-code">
    <h1>Введите код подтверждения</h1>

    @if ($errors->any())
        <div style="color:red;">
            {{ implode('', $errors->all(':message')) }}
        </div>
    @endif

    <form class="form "action="{{ route('verification.verify') }}" method="POST">
        @csrf
        <label for="code">Код:</label>
        <input class="text-confimed"type="text" name="code" id="code" required maxlength="6" pattern="\d{6}">
        <button class="button-confirmed" type="submit">Подтвердить</button>
    </form>
    <div>
</body>
<style>
    body{
        display: flex;
    width: 100%;
    height: 100%;
    position: absolute
    }
    .conteiner-code{
        display: flex;
        box-sizing: border-box;
        margin: auto;
        flex-direction: column;
    }
    .form{
        display: flex;
        flex-direction: column;
        gap:20px;
    }
    .text-confimed{
        display: flex;
    width: 100%;
    max-width: 200px;
    padding: 5px;
    font-size: 21px;
    }
    .button-confirmed{
        display: flex;
    justify-content: center;
    width: 100%;
    max-width: 100px;
    }

</style>
</html>