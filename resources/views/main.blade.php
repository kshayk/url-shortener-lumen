<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Shorten URL</title>
    <meta name="description" content="The HTML5 Herald">
    <meta name="author" content="SitePoint">

    <link href="css/main.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
    <div class="text-center">
        <h1>URL Shortener</h1>
        <?php session_start() ?>
        @if ( ! empty($_SESSION['errors']))
            <ul class="text-red center-input" style="width: 20%;">
                @foreach($_SESSION['errors'] as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        @endif
        <form method="post" action="/shorten">
            <input style="width: 30%" type="text" name="url" class="form-control center-input" required placeholder="Enter your full URL here with http / https">
            <br>
            <button type="submit" class="btn btn-success">Shorten</button>
        </form>

        <br><br>

        @if( ! empty($_SESSION['short_url']))
            <h3 style="color:green">Your short URL</h3>
            <span><a  href="{{$_SESSION['short_url']}}">{{$_SESSION['short_url']}}</a></span>
            <?php unset($_SESSION['short_url']) ?>
        @endif
    </div>
<body>
</body>
</html>