<!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta charset="utf-8" />
  <title>EscrowMyXBT : Transaction Status</title>
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
          <span class="hidden-nav-xs">EscrowMyXBT</span>
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
                      <a href="signup" class="auto">
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
                            <div class="col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading clearfix">
                                        <h4 class="panel-title">XBT Transactions</h4>
                                    </div>
                                    <div class="panel-body">
                                       <div class="table-responsive">
                                        @if(!$data->isEmpty())
                                            <table class="table table-striped js-dataTable-full" style="width: 100%; cellspacing: 0;">
                                                <thead>
                                                  <tr>
                                                    <th class="th-sortable" data-toggle="class">Bitcoin Address
                                                        </th>
                                                        <th>Amount(BTC)</th>
                                                        <th>Amount(USD)</th>
                                                        <th>Confirmations</th>
                                                        <th>Status</th>
                                                        <th>Balance</th>
                                                        <th>Actions</th>
                                                      </tr>
                                                    </thead>
                                                <tbody>
                                                    @foreach($data as $tx)
                                                    <tr>
                                                        <td class="hidden-xs hidden-sm font-w600">{{$tx->btc_address}}</td>
                                                                                    <td>{{$tx->amount_in_btc}}</td>
                                                                                    <td>{{$tx->amount_in_usd}}</td>
                                                                                    <td class="hidden-xs hidden-sm font-w600">{{$tx->confirmations}}</td>
                                                                                    <td class="hidden-xs">
                                                                                         @if($tx->status == 'Confirmed')
                                                                                        <span class="label label-success">{{$tx->status}}</span>
                                                                                        @endif
                                
                                                                                        @if($tx->status == 'Unconfirmed')
                                                                                        <span class="label label-warning">{{$tx->status}}</span>
                                                                                        @endif
                                                                                    </td>
                                                                                    <td>{{$tx->btc_balance}}</td>
                                                                                    <td><a href="statuses-{{$tx->id}}"><button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Transaction"><i class="fa fa-eye"></i></button></a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                               </table> 
                                               @else
                                                There are no transactions currently.
                                            @endif 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row -->
                        </div><!-- Main Wrapper --> 
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