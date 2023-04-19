<section style="margin-top: 2%">
    <div class="container py-5" style="background-color: lightgray;"> <?php  //TODO Alterar a cor, maybe?  ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-2">
                    <div class="card-body text-center">
                        <h5 class="my-3"><?= $_SESSION['active_user_username'] ?></h5>
                        <img class="rounded-circle mt-1"
                             width="150px"
                             src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">


                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"> <b>Email</b> </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['active_user_email'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"> <b>Telefone</b> </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['active_user_telefone'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"> <b>Morada</b> </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['active_user_morada'] ?></p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0"> <b>Localidade</b> </p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0"><?= $_SESSION['active_user_localidade'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="card mb-4 mb-md-0">
                            <a href="index.php?c=user&a=form" class="btn btn-success">Alterar os meus dados!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>