<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>EscrowMyXBT : View Status</title>
  <meta name="description" content="app, escrow, finance, btc bitcoin, xbt" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/icon.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/font.css" type="text/css" />
  <link rel="stylesheet" href="assets/css/app.css" type="text/css" />  
  <link rel="stylesheet" href="assets/js/calendar/bootstrap_calendar.css" type="text/css" />
  <link rel="stylesheet" href="assets/plugins/datatables/css/jquery.dataTables.min.css">
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
<body class="" >
  <section class="vbox">
    <header class="bg-white header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="fa fa-bars"></i>
        </a>
        <a href="index.html" class="navbar-brand">
          <img src="assets/images/logo.png" class="m-r-sm" alt="scale">
          <span class="hidden-nav-xs">escrowMyXBT</span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>     
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->
        <aside class="bg-black aside-md hidden-print hidden-xs" id="nav">          
          <section class="vbox">
            <section class="w-f scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">            


                <!-- nav -->                 
                <nav class="nav-primary hidden-xs">
                  <ul class="nav nav-main" data-ride="collapse">
                    @if(!Session::get('user_id'))
                            @if(!Session::get('account_type')=='user' || Session::get('account_type')=='admin' )
                    <li  class="active">
                      <a href="#" class="auto">
                        <i class="i i-book icon">
                        </i>
                        <span class="font-bold">Sign Up</span>
                      </a>
                    </li>
                    <li>
                      <a href="login" class="auto">
                        <i class="i i-login icon">
                        </i>
                        <span>Sign In</span>
                      </a>
                    </li>
                    @endif
                        @else
                            <li  class="active">
                              <a href="log-out" class="auto">
                                <i class="i i-statistics icon">
                                </i>
                                <span>Sign Out</span>
                              </a>
                            </li>
                    @endif
                  </ul>
                </nav>
                <!-- / nav -->
              </div>
            </section>
          </section>
        </aside>
        <!-- /.aside -->
        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                      <div id="main-wrapper">
                        <div class="row">
                            @foreach($data as $tx)
                                <div class="col-md-12">
                                    <div class="panel panel-info">
                                    <div class="panel-body">
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>XBT Address:</td>
                                                    <td>{{$tx->btc_address}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Amount in BTC:</td>
                                                    <td>{{$tx->amount_in_btc}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Amount in USD:</td>
                                                    <td>{{$tx->amount_in_usd}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Confirmations:</td>
                                                    <td>{{$tx->confirmations}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Status:</td>
                                                    <td>{{$tx->status}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Address Balance:</td>
                                                    <td>{{$tx->btc_balance}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Escrow Charge:</td>
                                                    <td>{{$tx->escrow_charge}}</td>
                                                </tr>
                                                <tr>
                                                    <td>Transaction Time:</td>
                                                    <td>{{date('d M Y  h:i a',strtotime($tx->transaction_time))}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                         <a href="statuses"><button class="btn btn-secondary pull-right">Back</button></a>
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div><!-- Row -->
                  </section>
                </section>
              </section>
            </section>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen,open" data-target="#nav,html"></a>
        </section>
      </section>
    </section>
  </section>
  <script src="assets/js/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.js"></script>
  <!-- App -->
  <script src="assets/js/app.js"></script>  
  <script src="assets/js/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="assets/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="assets/js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.min.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.spline.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.resize.js"></script>
  <script src="assets/js/charts/flot/jquery.flot.grow.js"></script>
  <script src="assets/js/charts/flot/demo.js"></script>

  <script src="assets/js/calendar/bootstrap_calendar.js"></script>
  <script src="assets/js/calendar/demo.js"></script>

  <script src="assets/js/sortable/jquery.sortable.js"></script>
  <script src="assets/js/app.plugin.js"></script>
  <!-- Page JS Plugins -->
        <script src="assets/plugins/datatables/js/jquery.dataTables.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/plugins/datatables/js/base_tables_datatables.js"></script>
</body>
</html>