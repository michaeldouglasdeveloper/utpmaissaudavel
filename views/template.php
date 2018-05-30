<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="UTF-8" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">        
        <title>UTP Mais Saudável</title>
        <link href="<?php echo URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo URL; ?>/assets/css/custom.min.css" rel="stylesheet">
        <script type="text/javascript">var URL = '<?php echo URL; ?>';</script>   
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/bootstrap.min.js"></script>
    </head>
    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo URL; ?>/home" class="site_title"><i class="fa fa-heartbeat"></i> <span>Fisioterapia</span></a>
                        </div>
                        <div class="clearfix"></div>
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-calendar"></i> Agendamentos <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/agendamentos/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/agendamentos/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR || $_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::FISIOTERAPEUTA) : ?>
                                        <li><a><i class="fa fa fa-heart"></i> Especialidades <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/especialidades/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/especialidades/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <li><a><i class="fa fa-file-text-o"></i> Formulários <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/formularios/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/formularios/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-bar-chart"></i> Relatórios <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/relatorios/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/relatorios/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::COORDENADOR || $_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR) : ?>
                                        <li><a><i class="fa fa-users"></i> Pessoas <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/pessoas/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/pessoas/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>
                                    <?php if ($_SESSION['usuario']['id_perfil'] == Perfis::ADMINISTRADOR) : ?>
                                        <li><a><i class="fa fa-user-plus"></i> Perfis <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/perfis/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/perfis/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                        <li><a><i class="fa fa-arrow-up"></i> URLs <span class="fa fa-chevron-down"></span></a>
                                            <ul class="nav child_menu">
                                                <li><a href="<?php echo URL; ?>/urls/cadastrar">Cadastrar</a></li>
                                                <li><a href="<?php echo URL; ?>/urls/visualizar">Visualizar</a></li>
                                            </ul>
                                        </li>
                                    <?php endif ?>

                                    <li><a><i class="fa fa fa-wheelchair"></i> Pacientes <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/pacientes/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/pacientes/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-stethoscope"></i> Triagem <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/triagem/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/triagem/visualizar">Visualizar</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-hospital-o"></i> Unidades de Saúde <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="<?php echo URL; ?>/unidades/cadastrar">Cadastrar</a></li>
                                            <li><a href="<?php echo URL; ?>/unidades/visualizar">Visualizar</a></li>
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
                                        <li><a href="<?php echo URL; ?>/login/logout"><i class="fa fa-sign-out pull-right"></i> Sair </a></li>
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
                                                    <span>MICHAEL DOUGLAS</span>
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
                <div class="right_col">
                    <div class="row">
                        <?= $this->loadViewInTemplate($viewName, $viewData); ?>
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
    </body>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/sweetAlert.js"></script>                
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/custom.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery.dataTable.min.js"></script>    
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/validator/validator.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/jquery.inputmask.bundle.min.js"></script>  
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>/assets/js/libs/datatable/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
</html>
