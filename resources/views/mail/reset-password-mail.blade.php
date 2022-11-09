<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Template</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 30px;
        }

        align-items: center;
        }


        .card {
            padding: 10px;
            text-align: center;
        }

        .text-body {
            padding: 10px;
            margin: 0 10px;

        }


        .link-btn {
            text-decoration: none;
            background-color: rgb(34, 34, 34);
            text-align: center;
            color: rgb(230, 230, 230);
            padding: 10px;
            cursor: pointer;
            margin: 10px 0;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="card">
            <h1 style="background: #fff; padding:10px;">ClustTech Company Limited</h1>
            <h3 style="background: #254de4; color: #fff; padding:10px;">Please reset your password</h3>
            <p class="text-body">
                we have sent you this email in response to your request to reset your password.
            </p>
            <p style="margin-bottom: 2rem;">To reset password please follow the link below;</p>
            <a href="{{ route('resetpassword', $token) }}" class="link-btn">Reset Password</a>
            <p style="margin-top: 20px;">please ignore this if you did not request for this</p>
        </div>
    </div>

</body>

</html>
