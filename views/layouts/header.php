<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
<header>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php?c=site&a=index">BatataDoce</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php?c=site&a=index">Ínicio</a>
                    </li>
                </ul>
            </div>

            <div class="my-2 my-lg-0" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <?php
                    if (isset($_SESSION['active_user_id'])) {
                        ?>


                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <?= $_SESSION['active_user_username'] ?>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="index.php?c=user&a=index">Perfil</a></li>
                                <li><a class="dropdown-item" href="#">Something in here</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?c=auth&a=signout">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                            </a>
                        </li>

                        <?php
                    }
                    else{
                        ?>

                        <li class="nav-item">
                            <a href="index.php?c=site&a=signup">
                                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Registo</button>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="index.php?c=auth&a=login">
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
                            </a>
                        </li>

                        <?php
                    }

                    ?>

                </ul>
            </div>

        </nav>
    </div>
</header>