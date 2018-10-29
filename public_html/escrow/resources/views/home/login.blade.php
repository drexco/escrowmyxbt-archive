<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title>EscrowMyXBT : Secure Login</title>
  <meta name="description" content="app, escrow, finance, btc bitcoin, xbt" />  
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />  
    <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">EscrowMyXBT</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in</strong>
        </header>
        {{ Form::open(array('url' => '/login', 'method'=>'post','role'=>'form')) }}
                                {{ csrf_field() }}
                                <div class="list-group">
                                    <div class="list-group-item">
                                          {{ Form::text('email','',array('class'=>'form-control', 'id'=>'email', 'name'=>'email')) }}
                                            <label for="login-username">Email</label>
                                    </div>
                                    <div class="list-group-item">
                                          {{ Form::password('password',array('class'=>'form-control', 'id'=>'password', 'name'=>'password')) }}
                                            <label for="login-password">Password</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                                <div class="text-center m-t m-b"><a href="#"><small>Forgot password?</small></a></div>
                                <div class="line line-dashed"></div>
                                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                                <a href="signup" class="btn btn-lg btn-default btn-block">Create an account</a>
                                <div class="form-group">
                                  <div class="col-xs-12">
                                    @if(Session::get('login_message'))
                                      {{Session::get('login_message')}}
                                    @endif
                                  </div>
                                </div>
                            {{ Form::close() }}
                            <!-- END Login Form -->
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>EscrowMyXBT<br>&copy; 2018</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <script src="assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="assets/js/app.js"></script>  
  <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/app.plugin.js"></script>
</body>
</html>