<!DOCTYPE html>
<html lang="en">
   
<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:06:57 GMT -->
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title') - ECOM</title>
      <!-- Favicon and touch icons -->
      <link rel="shortcut icon" href="{{ asset('back/dist/img/ico/favicon.png') }}" type="image/x-icon">
      <!-- Start Global Mandatory Style
         =====================================================================-->
      <!-- jquery-ui css -->
      <link href="{{ asset('back/plugins/jquery-ui-1.12.1/jquery-ui.min.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap -->
      <link href="{{ asset('back/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Bootstrap rtl -->
      <!--<link href="{{ asset('back/bootstrap-rtl/bootstrap-rtl.min.css') }}" rel="stylesheet" type="text/css"/>-->
      <!-- Lobipanel css -->
      <link href="{{ asset('back/plugins/lobipanel/lobipanel.min.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Pace css -->
      <link href="{{ asset('back/plugins/pace/flash.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Font Awesome -->
      <link href="{{ asset('back/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Pe-icon -->
      <link href="{{ asset('back/pe-icon-7-stroke/css/pe-icon-7-stroke.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Themify icons -->
      <link href="{{ asset('back/themify-icons/themify-icons.css') }}" rel="stylesheet" type="text/css"/>
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- Emojionearea -->
      <link href="{{ asset('back/plugins/emojionearea/emojionearea.min.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Monthly css -->
      <link href="{{ asset('back/plugins/monthly/monthly.css') }}" rel="stylesheet" type="text/css"/>
      <!-- End page Label Plugins 
         =====================================================================-->
      <!-- Start Theme Layout Style
         =====================================================================-->
      <!-- Theme style -->
      <link href="{{ asset('back/dist/css/stylecrm.css') }}" rel="stylesheet" type="text/css"/>
      <!-- Theme style rtl -->
      <!--<link href="{{ asset('back/dist/css/stylecrm-rtl.css') }}" rel="stylesheet" type="text/css"/>-->

      <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">

      <!-- End Theme Layout Style
         =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
      <!--preloader-->
      <div id="preloader">
         <div id="status"></div>
      </div>
      <!-- Site wrapper -->
      <div class="wrapper">
         @include('back.layout.header');
         <!-- =============================================== -->
         <!-- Left side column. contains the sidebar -->
         @include('back.layout.sidebar');
         <!-- =============================================== -->
         <!-- Content Wrapper. Contains page content -->
         @yield('content');
         <!-- /.content-wrapper -->
         @include('back.layout.footer');
      </div>
      <!-- /.wrapper -->
      <!-- Start Core Plugins
         =====================================================================-->
      <!-- jQuery -->
      <script src="{{ asset('back/plugins/jQuery/jquery-1.12.4.min.js') }}" type="text/javascript"></script>
      <!-- jquery-ui --> 
      <script src="{{ asset('back/plugins/jquery-ui-1.12.1/jquery-ui.min.js') }}" type="text/javascript"></script>
      <!-- Bootstrap -->
      <script src="{{ asset('back/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
      <!-- lobipanel -->
      <script src="{{ asset('back/plugins/lobipanel/lobipanel.min.js') }}" type="text/javascript"></script>
      <!-- Pace js -->
      <script src="{{ asset('back/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
      <!-- SlimScroll -->
      <script src="{{ asset('back/plugins/slimScroll/jquery.slimscroll.min.js') }}" type="text/javascript">    </script>
      <!-- FastClick -->
      <script src="{{ asset('back/plugins/fastclick/fastclick.min.js') }}" type="text/javascript"></script>
      <!-- CRMadmin frame -->
      <script src="{{ asset('back/dist/js/custom.js') }}" type="text/javascript"></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- ChartJs JavaScript -->
      <script src="{{ asset('back/plugins/chartJs/Chart.min.js') }}" type="text/javascript"></script>
      <!-- Counter js -->
      <script src="{{ asset('back/plugins/counterup/waypoints.js') }}" type="text/javascript"></script>
      <script src="{{ asset('back/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
      <!-- Monthly js -->
      <script src="{{ asset('back/plugins/monthly/monthly.js') }}" type="text/javascript"></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="{{ asset('back/dist/js/dashboard.js') }}" type="text/javascript"></script>
      <!-- End Theme label Script
         =====================================================================-->
   
      {{-- cdn ckeditor --}}
      <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
      <script>
            CKEDITOR.replace( 'editor1' );
      </script>
      <script>
            CKEDITOR.replace( 'editor2' );
      </script>

      {{-- datatable --}}
      <script src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script>
         $(document).ready( function () {
             $('#myTable').DataTable();
         } );
      </script>


      <script>
         function dash() {
         // single bar chart
         var ctx = document.getElementById("singelBarChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["Sun", "Mon", "Tu", "Wed", "Th", "Fri", "Sat"],
         datasets: [
         {
         label: "My First dataset",
         data: [40, 55, 75, 81, 56, 55, 40],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
               //monthly calender
               $('#m_calendar').monthly({
                 mode: 'event',
                 //jsonUrl: 'events.js') }}on',
                 //dataType: 'json'
                 xmlUrl: 'events.xml'
             });
         
         //bar chart
         var ctx = document.getElementById("barChart");
         var myChart = new Chart(ctx, {
         type: 'bar',
         data: {
         labels: ["January", "February", "March", "April", "May", "June", "July", "august", "september","october", "Nobemver", "December"],
         datasets: [
         {
         label: "My First dataset",
         data: [65, 59, 80, 81, 56, 55, 40, 65, 59, 80, 81, 56],
         borderColor: "rgba(0, 150, 136, 0.8)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(0, 150, 136, 0.8)"
         },
         {
         label: "My Second dataset",
         data: [28, 48, 40, 19, 86, 27, 90, 28, 48, 40, 19, 86],
         borderColor: "rgba(51, 51, 51, 0.55)",
         width: "1",
         borderWidth: "0",
         backgroundColor: "rgba(51, 51, 51, 0.55)"
         }
         ]
         },
         options: {
         scales: {
         yAxes: [{
             ticks: {
                 beginAtZero: true
             }
         }]
         }
         }
         });
             //counter
             $('.count-number').counterUp({
                 delay: 10,
                 time: 5000
             });
         }
         dash();         
      </script>
   </body>

<!-- Mirrored from thememinister.com/crm/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 02 Jun 2019 11:08:11 GMT -->
</html>

