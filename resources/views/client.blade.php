<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
</head>
<body>
    <form action="{{url('/oauth/clients')}}" method="POST">
        <p>
            <input type="text" name="name">
        </p>
        <p>
            <input type="text" name="redirect">
        </p>
        <p>
            {{csrf_field()}}
        </p>
        <p>
            <input type="submit" name="send" value="Enviar">
        </p>
    </form>
</body>
</html>
