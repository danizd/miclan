<?php
$section_name = "";

switch($this->router->class)
{
    case "mc":
        switch($this->router->method)
        {
            case "index":
                $section_name = $this->lang->line('index');
            break;

            case "users":
                $section_name = $this->lang->line('users');
            break;           
            case "events":
                $section_name = $this->lang->line('events');
            break;
            case "albums":
                $section_name = $this->lang->line('albums');
            break;           
            case "pics":
                $section_name = $this->lang->line('pics');
            break;


        }
    break;
}
?>

<!doctype html>
<!--[if IE 8]>         <html class="ie8"> <![endif]-->
<!--[if IE 9]>         <html class="ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Vunee Pro Admin &middot; <?= $section_name; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">
    <!--<link rel="shortcut icon" href="/favicon.ico">-->
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/css/iriy-admin.css">
    <link rel="stylesheet" href="/admin/vuneepro_admin/css/styles.css">
    <link rel="stylesheet" href="/admin/assets/font-awesome/css/font-awesome.css">

    <!--<link rel="stylesheet" href="/admin/css/plugins/jquery-select2.min.css">-->
    <link rel="stylesheet" href="/admin/assets/plugins/jquery-select2/css/select2.min.css">
    <link rel="stylesheet" href="/admin/css/plugins/jquery-dataTables.css">
    <link rel="stylesheet" href="/admin/css/plugins/jquery-selectBoxIt.min.css">
    <link rel="stylesheet" href="/admin/css/plugins/jquery-chosen.min.css">
    <link rel="stylesheet" href="/admin/css/plugins/bootstrap-tagsinput.min.css">
    <link rel="stylesheet" href="/admin/css/plugins/bootstrap-switch.min.css">
    <link rel="stylesheet" href="/admin/css/plugins/bootstrap-lightbox.css">   
    <link rel="stylesheet" href="/admin/css/styles.css">   
    <link rel="stylesheet" href="/admin/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">


  


    <!--[if lt IE 9]>
        <script src="/admin/assets/libs/html5shiv/html5shiv.min.js"></script>
        <script src="/admin/assets/libs/respond/respond.min.js"></script>
    <![endif]-->
</head>

<body class="sidebar-condensed">
    <header>
        <nav class="navbar navbar-default navbar-static-top no-margin" role="navigation">
            <div class="navbar-brand-group">
                <a class="navbar-sidebar-toggle navbar-link" data-sidebar-toggle>
                    <i class="fa fa-lg fa-fw fa-bars"></i>
                </a>
                <a class="navbar-brand hidden-xxs" href="mc/index">
                    <span class="sc-visible">
                        M
                    </span>
                    <span class="sc-hidden">
                        <span class="semi-bold">VUNEE PRO</span>
                        Admin
                    </span>
                </a>
            </div>
            <ul class="nav navbar-nav navbar-nav-expanded pull-right margin-md-right">

                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle navbar-user" href="javascript:;">
                        <?php if(isset($_SESSION) && isset($_SESSION['avatar'])): ?>
                        <img class="img-circle" src="/admin/images/avatars/<?= $_SESSION['avatar']; ?>">
                        <?php else: ?>
                        <img class="img-circle" src="/admin/vuneepro_admin/images/profile.png">
                        <?php endif; ?>
                        <span class="hidden-xs"><?= (isset($_SESSION) && isset($_SESSION['user_full_name'])) ? $_SESSION['user_full_name'] : ""; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu pull-right-xs">
                        <li class="arrow"></li>
                        <!--<li><a href="/admin/user/profile"><?= $this->lang->line('profile'); ?></a>
                        </li>
                        <li class="divider"></li>-->
                        <li><a href="/admin/adminuser/logout"><?= $this->lang->line('logout'); ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>
    <div class="page-wrapper">
        <aside class="sidebar sidebar-default">
            <div class="sidebar-profile">
                <?php if(isset($_SESSION) && isset($_SESSION['avatar'])): ?>
                <img class="img-circle profile-image" src="/admin/images/avatars/<?= $_SESSION['avatar']; ?>">
                <?php else: ?>
                <img class="img-circle profile-image" src="/admin/vuneepro_admin/images/profile.png">
                <?php endif; ?>

                <div class="profile-body">
                    <h4><?= $this->lang->line('administrator'); ?></h4>

                    <div class="sidebar-user-links">
                        <!--<a class="btn btn-link btn-xs" href="/admin/user/profile" data-placement="bottom" data-toggle="tooltip" data-original-title="Perfil"><i class="fa fa-user"></i></a>-->
                        <a class="btn btn-link btn-xs" href="/admin/adminuser/logout" data-placement="bottom" data-toggle="tooltip" data-original-title="Salir"><i class="fa fa-sign-out"></i></a>
                    </div>
                </div>
            </div>

            <nav>
                <h5 class="sidebar-header"><?= $this->lang->line('principal_menu'); ?></h5>


                <ul class="nav nav-pills nav-stacked">
                    <li><a href="/admin/mc/summary" title="summary"><i class="fa fa-lg fa-fw fa-home"></i>Summary</a></li>
           <!--         <li><a href="/admin/mc/users" title="users"><i class="fa fa-lg fa-fw fa-user"></i>Users</a></li>-->
                    <li class="nav-dropdown<?= ($this->router->class == "mc") ? " active open" : ""; ?>">
                        <a href="#" title="Tablas">
                            <i class="fa fa-lg fa-fw fa-glass"></i>Client 
                        </a>
                        <ul class="nav-sub">
                            <li>
                                <a href="/admin/mc/events" title="<?= $this->lang->line('events'); ?>">
                                    <i class="fa fa-fw fa-caret-right"></i> <?= $this->lang->line('events'); ?>
                                </a>
                            </li>
                        
                            <li>
                                <a href="/admin/mc/albums" title="<?= $this->lang->line('albums'); ?>">
                                    <i class="fa fa-fw fa-caret-right"></i> <?= $this->lang->line('albums'); ?>
                                </a>
                            </li>
                            <li>
                                <a href="/admin/mc/pics" title="<?= $this->lang->line('pics'); ?>">
                                    <i class="fa fa-fw fa-caret-right"></i> <?= $this->lang->line('pics'); ?>
                                </a>
                            </li>   
                        </ul>                  
                    </li>
                    <li><a href="/admin/mc/stadistics" title="stadistics"><i class="fa fa-bar-chart-o"></i>Statistics </a></li>                    
                </ul>
            </nav>
        </aside>

        <div class="page-content">

      