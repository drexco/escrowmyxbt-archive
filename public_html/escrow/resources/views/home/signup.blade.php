<!DOCTYPE html>
<html lang="en" class=" ">
<head>  
  <meta charset="utf-8" />
  <title>EscrowMyXBT : Sign Up</title>
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
  <section id="content" class="m-t-lg wrapper-md animated fadeInDown">
    <div class="container aside-xl">
      <a class="navbar-brand block" href="index.html">escrowMyXBT</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign up</strong>
        </header>
        <form action="signup" role="form" method="post">
          <div class="list-group">
            <div class="list-group-item">
                                            <input class="form-control" id="first_name" name="first_name" />
                                            <label for="first_name">First Name</label>
                                    </div>
                                    <div class="list-group-item">
                                          <input class="form-control" id="last_name" name="last_name" />
                                            <label for="last_name">Last Name</label>
                                    </div>
            <div class="list-group-item">
                                            <input class="form-control" id="email" name="email" />
                                            <label for="email">Email</label>
                                    </div>
                                    <div class="list-group-item">
                                          <input class="form-control" id="password" name="password" type="password" />
                                            <label for="password">Password</label>
                                    </div>
          </div>
          <div class="checkbox m-b">
            <label>
              <input type="checkbox"> Agree the <a href="#">terms and policy</a>
            </label>
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
          <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Already have an account?</small></p>
          <a href="login" class="btn btn-lg btn-default btn-block">Sign in</a>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
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