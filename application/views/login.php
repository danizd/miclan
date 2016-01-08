<!doctype html>
<html class="no-js">
    <head>
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Mi Clan &middot; <?= $this->lang->line('login_access'); ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!--<link rel="shortcut icon" href="/favicon.ico">-->
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css" />
         <link rel="stylesheet" href="/assets/css/styles.css" />

         <script type="text/javascript" src="/assets/bootstrap/jquery-1.11.3.min"</script>
         <script type="text/javascript" src="/assets/bootstrap/assets/js/bootstrap.js"></script>
        <!--[if lt IE 9]>
        <script src="/admin/assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="/admin/assets/libs/respond/respond.min.js"></script>
        <![endif]-->

    </head>
    <body class="body-sign-in">
    <div class="container caja-login">
        <div class="panel panel-default form-container">
            <div class="panel-body">
                <form method="POST" role="form">
                    <h3 class="text-center margin-xl-bottom page-title">Mi CLAN</h3>

                    <div class="form-group text-center">
                        <label class="sr-only" for="username">Usuario</label>
                        <input type="text" class="form-control input-lg" id="username" name="username" placeholder="Usuario">
                    </div>
                    <div class="form-group text-center">
                        <label class="sr-only" for="password">Contraseña</label>
                        <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Contraseña">
                    </div>

                    <button class="btn btn-primary btn-block btn-lg">Entra</button>
                </form>
            </div>
            <?php if(isset($make_login_result) && isset($make_login_result['status']) && $make_login_result['status'] == "error" && isset($make_login_result['type'])): ?>
            <div class="panel-body text-center">
                <div class="margin-bottom">
                    <?php
                    if(!empty($make_login_result['type']))
                    {
                        echo $this->lang->line($make_login_result['type']);
                    }
                    ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>
