<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Login</title>

    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- <link rel="stylesheet" href="styles.css"> -->

    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/materialize.js"></script>

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> -->
    <script src="<?= base_url() ?>assets/js/axios.js"></script>
    <script src="<?= base_url() ?>assets/js/vue.js"></script>
</head>
<br><br><br><br>

<body class="blue-grey lighten-1">
    <div id="main-app">
        <div class="container">
            <div class="row">
                <div class="col s12 m12 l8 offset-l2">
                    <div class="card darken-1 center-align">
                        <form action="<?= base_url() ?>auth/register" method="POST">
                            <div class="card-content blue-grey-text darken-4">
                                <h4 class=""><b>FORM REGISTRASI</b></h4>
                                <div class="row">
                                    <div class="input-field col s10 offset-s1">
                                        <i class="material-icons prefix">account_circle</i>
                                        <input name="username" id="username" type="text" class="validate" value="<?= set_value('username') ?>">
                                        <label for="username">Username</label>
                                        <?= form_error('username', '<smal class="red-text text-accent-3 pl-3">', '</smal>'); ?>
                                    </div>
                                    <div class="input-field col s10 offset-s1">
                                        <i class="material-icons prefix">lock</i>
                                        <input name="password1" id="password1" type="password" class="validate" value="<?= set_value('password') ?>">
                                        <label for="password1">Password</label>
                                        <?= form_error('password1', '<smal class="red-text text-accent-3 pl-3">', '</smal>'); ?>
                                    </div>
                                    <div class="input-field col s10 offset-s1">
                                        <i class="material-icons prefix">lock</i>
                                        <input name="password2" id="password2" type="password" class="validate" value="<?= set_value('password') ?>">
                                        <label for="password2">Repeat Password</label>
                                        <?= form_error('password2', '<smal class="red-text text-accent-3 pl-3">', '</smal>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <button type="submit" class="waves-effect waves-light btn blue-grey darken-1">Submit<i class="material-icons right">send</i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br>
</body>

</html>