<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactForm</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
</head>

<body>
    <main>
        <div class="thanks">
            <div class="thanks__text">
                お問い合わせありがとうございました
            </div>

            <div class="thanks__button">
                <form action="/" method="get">
                    <button class="thanks__button--submit">
                        HOME
                    </button>
                </form>
            </div>

            <div class="thanks__background">
                Thank You
            </div>
        </div>
    </main>
</body>

</html>