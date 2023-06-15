<?php
use Illuminate\Support\Str;
use App\Models\Token;
use Illuminate\Support\Facades\URL;
use App\Models\User;

$user = User::find($userid);
$textbtn = '';
$rand = '';

if (empty($user->verificationkey)) {
    $rand = Str::random(64);
    $user->verificationkey = $rand;
    $user->save();
    $textbtn = 'подтвердить учетную запись';
} else {
    $textbtn = 'Вход в учётную запись';
    $rand = $user->verificationkey;
}

?>


</html>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>send</title>
    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        p {
            font-weight: lighter;
            color: rgba(255, 255, 255, 0.9);
            margin: 0;
            padding: 0;
        }

        .send {
            padding: 40px;
            border-radius: 10px;
            background: #0c0c0c;
            background: url({{ asset('images/forest.jpg') }});
            max-width: 1000px;
        }

        h3 {
            color: white;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        button {
            padding: 8px;
            border-radius: 3px;
            outline: none;
            background: #1E5945;
            border: none;
            color: rgb(255, 255, 255);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .sendlogo {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: white;
        }

        .sendTitle {
            border-left: 4px solid #1E5945;
            color: white;
            padding-left: 10px;
        }

        .sendText {
            border-left: 2px solid #1E5945;
            color: white;
            padding: 20px;
            padding-left: 10px;
            margin: 20px 0 40px 0;
            backdrop-filter: blur(2px);
        }




        .sendTitle h1 {

            margin: 0;
            padding: 0;
        }

        .sendlogo img {
            height: 50px;
            margin: auto;
        }

        .link-orng {
            color: orangered;
            text-decoration: none;
            margin: 10px 0;
        }

    </style>
</head>

<body>
    <div class="send">
        <div class="sendlogo">
            <img src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div class="sendTitle">
            <h1>Library</h1>
            <h1>Электронная библиотека</h1>
        </div>
        <div class="sendText">
            <p> Приветствуем вас, это электронная библиотека «Library».
                <br>
                На сайте представлены книги разных жанров для бесплатного скачивания. Для удобства пользования
                библиотекой, есть разделы, в которых легко найти интересные новинки, бестселлеры и современную прозу.
                После простой регистрации вам будет доступна уникальная система достижений по просмотрам, лайкам и
                комментариям книг – теперь читать будет ещё интереснее! Также можно оставить отзыв о книге, вести диалог
                с другими читателями и просмотреть карточку другого пользователя, нажав на его аватарку.
            </p>

        </div>
        <div class="sendText">
            <h3>
                <?echo($user->first_name.' '.$user->patronymic);?>
            </h3>
            <p>
                В
                <?echo(date("G:i",strtotime('+3 hours')));?> UTC+3 МСК
                <?echo(date("d.m.Y",strtotime('+3 hours')));?> попытались войти на сайт «Library» с вашей электронной
                почты.
                Войдите, перейдя по ссылке ниже.
                Если это были не вы, просто проигнорируйте письмо.
            </p>
            <p class="link-orng">Нажать на кнопку вы сможете 1 раз, а дальше вход будет недействительным</p>
        </div>

        <a href="<?echo(URL::to('/api/sdfvsdfdsvfdscfdsvfsdvfdvfvdsfsds/'.$rand ));?>"> <button>
                <?echo($textbtn);?>
            </button></a>
    </div>

</body>

</html>
