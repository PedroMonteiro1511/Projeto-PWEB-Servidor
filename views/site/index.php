<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome to my site</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            font-size: 36px;
            font-weight: 700;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
            text-transform: uppercase;
        }

        p {
            font-size: 20px;
            line-height: 1.5;
            color: #555;
            margin-bottom: 30px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 12px 32px;
            font-size: 18px;
            font-weight: 600;
            color: #fff;
            background-color: #f44336;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #c62828;
        }

        .social-icons {
            margin-top: 40px;
            text-align: center;
        }

        .social-icons a {
            display: inline-block;
            margin: 0 10px;
            font-size: 24px;
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #f44336;
        }

        .social-icons a i {
            vertical-align: middle;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome to my site</h1>
    <p>This is a simple welcome page created using HTML and CSS. It uses a modern design with a bold header, clean typography, and large call-to-action button to encourage visitors to take action. Follow us on social media to stay up-to-date with our latest news and updates.</p>
    <a href="#" class="btn">Learn more</a>
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
</div>
</body>
</html>