<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: "Open Sans", sans-serif;
            font-size: 16px;
            line-height: 1.5;
            color: #333;
            background: #f5f5f5;
            display: grid;
            grid-template-columns:

        }

        .container {
            max-width: 960px;
            margin: 100px auto;
            padding: 10px;
        }

        .item {
            background: steelblue;
            color: white;
            font-size: 20px;
            padding: 20px;
            border: skyblue 1px solid;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
