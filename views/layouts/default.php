<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>

<body>

    <!-- nav -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php?c=site&a=index">Worksheet Tracker</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php?c=site&a=index">Ínicio</a>
                </li>
                <?php if (isset($_SESSION['active_user_role']) && $_SESSION['active_user_role'] != User::$Role_User_Cliente) {
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Gestão
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="index.php?c=empresa&a=index">Empresa</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=user&a=index">Gestão de Utilizadores</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=iva&a=index">Iva</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=service&a=index">Serviços</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="index.php?c=folha&a=index">Folhas de Obra</a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>

                <?php if (isset($_SESSION['active_user_role']) && $_SESSION['active_user_role'] == User::$Role_User_Cliente){ ?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?c=folhacliente&a=index">Minhas Folhas</a>
                </li>

                <?php } ?>


            </ul>
        </div>


        <div class="my-2 my-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <?php
                if (isset($_SESSION['active_user_id'])) {
                    ?>

                    <li class="nav-item">
                        <a class="nav-link" href="index.php?c=user&a=view&id=<?= $_SESSION['active_user_id'] ?>">
                            <?= Auth::get_active_user($_SESSION['active_user_id']); ?>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="index.php?c=auth&a=signout">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
                        </a>
                    </li>


                    <?php
                } else {
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


    <!-- View  Content -->

    <div class="container">
        <?php require_once($viewPath) ?>
    </div>

    <!-- End View !-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/deleteMessage.js"></script>
</body>

</html>