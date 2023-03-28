<!DOCTYPE html>
<html>
<head>
    <title>Login - Work Sheet Issuer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <style>
        .container{
            top: 50%;
            transform: translate(0%, 50%);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: auto;
            max-width: 500px;
            padding: 30px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        h1 {
            font-size: 36px;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: none;
            border-radius: 3px;
            background-color: #f7f7f7;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            font-size: 18px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }

        .error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 10px;
        }

        .fa {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <form action="" method="post">
        <div class="form-group">
            <label for="username"><i class="fa fa-user"></i> Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div class="form-group">
            <label for="password"><i class="fa fa-lock"></i> Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <input type="submit" value="Login">
        <div class="error"><?php if (isset($error)){echo $error;}; ?></div>
    </form>
</div>
</body>
</html>