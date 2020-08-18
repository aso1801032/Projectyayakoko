<!DOCTYPE HTML>
    <html lang="ja">
    <head>
      <meta charset="UTF-8">
      @yield('meta')
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>positive.2ch</title>
      <!-- MDB icon -->
      <link rel="icon" href="/images/favicon.ico">
      <!-- Font Awesome -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
      <!-- Google Fonts Roboto -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
      <!-- Bootstrap core CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Material Design Bootstrap -->
      <link rel="stylesheet" href="css/mdb.min.css">
      <!-- Your custom styles (optional) -->
      <link rel="stylesheet" href="css/style.css">
      @section('meta')
        <meta name="csrf-token" content="{{ csrf_token() }}">
      @endsection
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <style>
          .row{
              margin-top: 10%;
              margin-bottom: 10%;
          }
          .main_card{

            margin-bottom: 3%;
            padding: 5%;
          }
          .right_card{
            height: 200px;
            margin-bottom: 3%;
            padding:10%
          }
          .left_card{
            height: 400px;
            margin-bottom: 3%;
            padding:10%
          }
          #new_thre{
            position: fixed;
            bottom: 15%;
            right: 5%;
            border-radius: 6px;
            background-color: while;
            color:#00FFFF;
            padding: 3px 3px;
          }
          #top_btn{
            position: fixed;
            bottom: 5%;
            right: 5%;
            border-radius: 6px;
            background-color: rgba(0, 81, 255, 0.8);
            color: aliceblue;
            padding: 6px 3px;
          }
          footer{
            bottom: 0; /*下に固定*/
          }
          header{
            position: fixed;
            top: 0;
            width: 100%;
          }
          .newform{
            margin:0 auto;
            padding:10px;
            width: 70%;
          }
          .purple-border textarea {
            border: 1px solid #ba68c8;
          }

          .purple-border .form-control:focus {
            border: 1px solid #ba68c8;
            box-shadow: 0 0 0 0.2rem rgba(186, 104, 200, .25);
          }
          
          .atag{
            opacity: 0.5;
          }
      </style>
    </head>
    <body>
      @yield('content')
        <header>
          <nav class="navbar navbar-dark default-color justify-content-between">
            <a class="navbar-brand" href="/home"><strong>yayakoko</strong></a>
            <form class="form-inline my-1" name="search" method="post" action="/search">
              {!! csrf_field() !!}
              <div class="md-form form-sm my-0">
                <input class="search form-control form-control-sm mr-sm-2 mb-0" name="search" id="search" type="text" placeholder="Search" aria-label="Search">
              </div>
              <button class="btn btn-outline-white btn-sm my-0" type="submit">Search</button>
          </form>
          </nav>
        </header>

        

        <div class="container">
            
        </div>
        <button id="new_thre"><a class="" href="/make"><i class="far fa-calendar-plus"></i> New Thread</a></button>

        
        <button id="top_btn"><i class="fas fa-angle-double-up"></i></button>
        <!-- Footer -->
<footer class="page-footer font-small special-color-dark pt-4">

<!-- Footer Elements -->
<div class="container">

  <!-- Social buttons -->
  <ul class="list-unstyled list-inline text-center">
    <li class="list-inline-item">
      <a class="btn-floating btn-fb mx-1">
        <i class="fab fa-facebook-f"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-tw mx-1">
        <i class="fab fa-twitter"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-gplus mx-1">
        <i class="fab fa-google-plus-g"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-li mx-1">
        <i class="fab fa-linkedin-in"> </i>
      </a>
    </li>
    <li class="list-inline-item">
      <a class="btn-floating btn-dribbble mx-1">
        <i class="fab fa-dribbble"> </i>
      </a>
    </li>
  </ul>
  <!-- Social buttons -->

</div>
<!-- Footer Elements -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2020 Copyright:
  <a href="/home">positive.2ch</a>
</div>
<!-- Copyright -->

</footer>

<!-- Footer -->
            <!-- jQuery -->
      <script type="text/javascript" src="js/jquery.min.js"></script>
      <!-- Bootstrap tooltips -->
      <script type="text/javascript" src="js/popper.min.js"></script>
      <!-- Bootstrap core JavaScript -->
      <script type="text/javascript" src="js/bootstrap.min.js"></script>
      <!-- MDB core JavaScript -->
      <script type="text/javascript" src="js/mdb.min.js"></script>
      <!-- Your custom scripts (optional) -->
      <script type="text/javascript">
      $(function(){
        $("#top_btn").on("click", function(){
          $("html, body").animate({scrollTop: 0 }, 1000, "swing");
        });
      });
      </script>
      
      <script type="text/javascript">$('#your-custom-id').mdbDropSearch();
      </script>
    </body>
</html>
