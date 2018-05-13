<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />
        <title>UTP Mais Saudável</title>        
        <link href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo BASE_URL; ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">  
        <link href="<?php echo BASE_URL; ?>assets/css/custom.min.css" rel="stylesheet">    
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="/home" class="site_title"><i class="fa fa-heartbeat"></i> <span>Fisioterapia</span></a>
                        </div>
                        <div class="clearfix"></div>

                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">               
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-users"></i> Usuários <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo BASE_URL; ?>usuarios/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>usuarios/editar">Editar</a></li>
                                            <li><a href="<?php echo BASE_URL; ?>usuarios/visualizar">Visualizar</a></li>                                            
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR) : ?>
                                        <li><a><i class="fa fa-edit"></i> Perfis <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo BASE_URL; ?>perfis/cadastrar">Cadastrar</a></li>                                                
                                                <li><a href="<?php echo BASE_URL; ?>usuarios/editar">Editar</a></li>
                                                <li><a href="<?php echo BASE_URL; ?>usuarios/visualizar">Visualizar</a></li>                                                    
                                            </ul>
                                        </li>                                    
                                        <li><a><i class="fa fa-arrow-up"></i> URLs <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="form.html">Cadastrar</a></li>
                                                <li><a href="form_advanced.html">Editar</a></li>
                                                <li><a href="form_validation.html">Visualizar</a></li> 
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <li><a><i class="fa fa-hospital-o"></i> Unidades de Saúde <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="form.html">Cadastrar</a></li>
                                            <li><a href="form_advanced.html">Editar</a></li>
                                            <li><a href="form_validation.html">Visualizar</a></li> 
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-stethoscope"></i> Triagem <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="form.html">Cadastrar</a></li>
                                            <li><a href="form_advanced.html">Editar</a></li>
                                            <li><a href="form_validation.html">Visualizar</a></li> 
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-calendar"></i> Agendamentos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="form.html">Cadastrar</a></li>
                                            <li><a href="form_advanced.html">Editar</a></li>
                                            <li><a href="form_validation.html">Visualizar</a></li> 
                                        </ul>
                                    </li>                                    
                                </ul>
                            </div>
                        </div>                 
                    </div>
                </div>

                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/michael.png" alt="">Olá, <?= $_SESSION['usuario']['nome_pessoa'] ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Profile</a></li>                                        
                                        <li><a href="/login.php"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
                                    </ul>
                                </li>

                                <li role="presentation" class="dropdown">
                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <a>
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="text-center">
                                                <a>
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div class="right_col" role="main">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">                                           
                            <?php $this->loadViewInTemplate($viewName, $viewData); ?>
                        </div>
                    </div>
                </div>                
                <footer>
                    <div class="pull-right">
                        UTP Mais Saudável - Todos os direitos reservados
                    </div>
                    <div class="clearfix"></div>
                </footer>        
            </div>
        </div>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.min.js"></script>    
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/custom.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/validator/validator.js"></script>
    </body>
</html>