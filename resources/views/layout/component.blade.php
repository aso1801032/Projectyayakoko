<!DOCTYPE HTML>
    <html lang="ja">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- metaタグで定義が必要な場合に使用 -->
      @yield('meta')
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <!-- タイトル -->
      <title>@yield('title')</title>

      <!-- MDB icon -->
      <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
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
    </head>
    <body>

        <header>
            <nav class='navbar fixed-top navbar-expand-lg navbar-dark pink scrolling-navbar p-0 ' >
                <!-- 画面名を入れる -->
                <a class="navbar-brand" href="/home"><strong>ポジティブな2ch</strong>-@yield('name')</a>
                <div class="text-right ml-auto">
                    <form class="form-inline">
                        @csrf
                        <div class="md-form mt-3 mb-0">
                          <input class="form-control mr-sm-2" type="text" id="Search" aria-label="Search">
                          <label for='Search' class="text-white">Search</label>
                        </div>
                        <input type="submit" class="btn btn-primary mt-3" value="検索">

                      </form>
                </div>
            </nav>
        </header>
        <div class="container mt-5 pt-5 mb-3">
            <div class="row">
                <div class="col-2 card">
                    @foreach ($tag as $item)
                        <form method="post" action="/search">
                            <input type="submit" class="btn btn-link pb-0 pt-0 mt-0 mb-0 text-primary" value={{$item->name}} name={{$item->name}}>
                        </form>
                    @endforeach
                </div>

                <div class="col-8 card">
                    <!-- ここに画面ごとのコンテンツを入れる -->
                    @yield('content')
                </div>

                <div class="col-2 card">
                    <!-- ここにニュースのリンクを入力する -->
                </div>
            </div>


        </div>

        @yield('script')

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <!-- Your custom scripts (optional) -->
        <script type="text/javascript"></script>
  </body>
</html>
