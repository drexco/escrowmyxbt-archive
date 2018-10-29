<!DOCTYPE html>
<html lang="zxx">
    <head>
        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Piguet Galland : Edit User</title>
        <meta name="description" content="stomise, well commented codes and seo friendly.">
        <meta name="keywords" content="piguet, galland, banking, company, finance, money, loans">
        <meta name="author" content="AnDrexx">

        <!-- ==============================================
        Favicons
        =============================================== -->
        <link rel="shortcut icon" type="image/x-icon" href="https://www.piguetgalland.ch/app/themes/piguet-galland/images/front/favicon.ico" />
         <!-- Styles -->
        <link rel='stylesheet' id='et-googleFonts-css'  href='https://fonts.googleapis.com/css?family=Open+Sans%3A300i%2C400%2C600&amp;ver=4.8.1' type='text/css' media='all' />
        <!-- <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet"> -->        
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">        
        <link href="assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="assets/plugins/uniform/css/default.css" rel="stylesheet"/>        
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">          
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>   
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>   
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>

        <!-- Theme Styles -->
        <link href="assets/css/space.min.css" rel="stylesheet">
        <link href="assets/css/custom.css" rel="stylesheet">

    </head>

    <body>

    <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html">
                    <span>pig</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            @if(Session::get('user_id'))
                                @if(Session::get('account_type')=='admin')
                                     <li>
                                        <a href="summary">
                                            <i class="menu-icon icon-home4"></i><span>Maison</span>
                                        </a>
                                    </li>
                                    <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon icon-person"></i><span>Profile</span><i class="accordion-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="profile">View Profile</a></li>
                                        <li><a href="updatepassword">Change Password</a></li>
                                    </ul>
                                </li>
                                     <li>
                                        <a href="javascript:void(0)">
                                            <i class="menu-icon icon-users"></i><span>Users</span><i class="accordion-icon fa fa-angle-left"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li class="active"><a href="createuser">Create User</a></li>
                                            <li><a href="users">View Users</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="menu-icon icon-reorder"></i><span>Accounts</span><i class="accordion-icon fa fa-angle-left"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="createaccount">Create Account</a></li>
                                            <li><a href="accounts">View Accounts</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="menu-icon icon-show_chart"></i><span>Transactions</span><i class="accordion-icon fa fa-angle-left"></i>
                                        </a>
                                        <ul class="sub-menu">
                                            <li><a href="createtransaction">Create Transaction</a></li>
                                            <li><a href="transactions">View Transasctions</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="log-out">
                                            <i class="menu-icon icon-exit"></i><span>Logout</span>
                                        </a>
                                    </li>
                                @endif
                            @else
                                <li class="active-page">
                                    <a href="/">
                                        <i class="menu-icon icon-home4"></i><span>Maison</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon icon-person"></i><span>Profile</span><i class="accordion-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="ui-alerts.html">View Profile</a></li>
                                        <li><a href="ui-buttons.html">Change Password</a></li>
                                        <li><a href="ui-icons.html">Update Security Question</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon icon-show_chart"></i><span>Transfers</span><i class="accordion-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="ui-icons.html">Own Account Transfer</a></li>
                                        <li><a href="ui-alerts.html">Transfer to Ultra Bank A/C</a></li>
                                        <li><a href="ui-buttons.html">Transfer to Other Banks</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">
                                        <i class="menu-icon icon-credit-card"></i><span>Factures</span><i class="accordion-icon fa fa-angle-left"></i>
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="layout-blank.html">Airtime Purchase</a></li>
                                        <li><a href="layout-boxed.html">Utility Bills</a></li>
                                        <li><a href="layout-collapsed-sidebar.html">Cable TV Bills</a></li>
                                        <li><a href="layout-fixed-header.html">Phone Bills</a></li>
                                        <li><a href="layout-fixed-sidebar.html">Internet Services</a></li>
                                        <li><a href="layout-fixed-sidebar-header.html">Donations</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="menu-icon icon-phone"></i><span>Commentaires</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="menu-icon icon-exit"></i><span>Logout</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="summary"><span>Piguet Galland</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                    <li><a href="javascript:void(0)" id="search-button"><i class="fa fa-search"></i></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="fa fa-envelope"></i></a></li>
                                    <li class="dropdown">
                                        <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-bell"></i></a>
                                        <ul class="dropdown-menu dropdown-lg dropdown-content">
                                            <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fa fa-angle-right"></i></a></li>
                                            <li class="slimscroll dropdown-notifications">
                                                <ul class="list-unstyled dropdown-oc">
                                                    <li>
                                                        <a href="#"><span class="notification-badge bg-primary"><i class="fa fa-photo"></i></span>
                                                            <span class="notification-info">Update password for improved security.
                                                                <small class="notification-date">20:00</small>
                                                            </span></a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar1.jpg" alt="" class="img-circle"></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="userprofile">Profile</a></li>
                                            <li><a href="createuser">Create User</a></li>
                                            <li><a href="createaccount">>Create Account</a></li>
                                            <li role="separator" class="divider"></li>
                                            <li><a href="changepassword">Update Password</a></li>
                                            <li><a href="log-out">Log Out</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Hello, {{Session::get('first_name')}}</h3>
                <p style="color: blue; margin-top: -22px;">Your Last Login was on: <span>{{Session::get('last_login')}} (GMT)</span></p>
                    </div>
                    <div>&nbsp;</div>
                    <h4>Edit User</h4><br>
                    <!-- Page Content -->
                    <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading clearfix">
                                    <h4 class="panel-title">User Details</h4>
                                </div>
                                <div class="panel-body">
                                    {{ Form::open(array('url' => '/users/edit/'.$data->id, 'method'=>'post','autocomplete' => 'off', 'role'=>'form', 'class'=>'form-horizontal')) }}
                                    {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="name" class="col-sm-2 control-label">Name</label>
                                            <div class="col-sm-5">
                                                {{ Form::text('first_name',$data->first_name,array('placeholder'=>'First Name','class'=>'form-control','id'=>'first_name','name'=>'first_name')) }}
                                            </div>
                                            <div class="col-sm-5">
                                                {{ Form::text('last_name',$data->last_name,array('placeholder'=>'Last Name','class'=>'form-control','id'=>'last_name','name'=>'last_name')) }}
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="form-group">
                                            <label for="other name" class="col-sm-2 control-label">Other Name</label>
                                            <div class="col-sm-10">
                                                {{ Form::text('middle_name',$data->middle_name,array('placeholder'=>'Middle Name','class'=>'form-control','id'=>'middle_name','name'=>'middle_name')) }}
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="form-group">
                                            <label for="address" class="col-sm-2 control-label">Address</label>
                                            <div class="col-sm-5">
                                                {{ Form::text('address_one',$data->address_one,array('placeholder'=>'Address I','class'=>'form-control','id'=>'address_one','name'=>'address_one')) }}
                                            </div>
                                            <div class="col-sm-5">
                                                {{ Form::text('address_two',$data->address_two,array('placeholder'=>'Address II','class'=>'form-control','id'=>'address_two','name'=>'address_two')) }}
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="form-group">
                                            <label for="personal_info" class="col-sm-2 control-label">Personal Information I</label>
                                            <div class="col-sm-5">
                                                {{ Form::text('dob',$data->dob,array('placeholder'=>'Date of Birth','class'=>'form-control','id'=>'dob','name'=>'dob')) }}
                                            </div>
                                            <div class="col-sm-5">
                                                {{ Form::text('occupation',$data->occupation,array('placeholder'=>'Occupation','class'=>'form-control','id'=>'occupation','name'=>'occupation')) }}
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="form-group">
                                            <label for="address_one" class="col-sm-2 control-label">Personal Information II</label>
                                            <div class="col-sm-5">
                                                {{ Form::text('ssn',$data->ssn,array('placeholder'=>'SSN','class'=>'form-control','id'=>'ssn','name'=>'ssn')) }}
                                            </div>
                                            <div class="col-sm-5">
                                                {{ Form::text('next_of_kin',$data->next_of_kin,array('placeholder'=>'Next of Kin','class'=>'form-control','id'=>'next_of_kin','name'=>'next_of_kin')) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">Login Details</label>
                                            <div class="col-sm-10">
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">@</span>
                                                    {{ Form::text('email',$data->email,array('placeholder'=>'Email','class'=>'form-control','id'=>'email','name'=>'email')) }}
                                                </div>
                                                <div style="margin-bottom:15px;" class="input-group">
                                                    <span class="input-group-addon" id="basic-addon1">#</span>
                                                    {{ Form::text('phone_no',$data->phone_no,array('placeholder'=>'Phone Number','class'=>'form-control','id'=>'phone_no','name'=>'phone_no')) }}
                                                </div>
                                            </div>
                                        </div>
                                        <div>&nbsp;</div>
                                        <div class="col-sm-10">
                                            @if(Session::get('user_message'))
                                                <div class="alert alert-info" role="alert">{{Session::get('user_message')}}</div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-danger pull-right">Edit</button>
                                    {{Form::close()}}
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->      
                <!-- END Page Content -->
                    <div class="page-footer">
                        <p>2018, Piguet Galland & vous. <span>&copy;</span></p>
                    </div>
                </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->

    <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/d3/d3.min.js"></script>
        <script src="assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>
        <script src="assets/plugins/chartjs/chart.min.js"></script>
        <script src="assets/js/space.min.js"></script>
        <script src="assets/js/pages/dashboard.js"></script>
        <script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/pages/table-data.js"></script>


    </body>
</html>