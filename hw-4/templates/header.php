<head>
    <title> HOME PAGE </title>

  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="home.css">
	<!--[if IE 6]>
		<link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" />
	<![endif]-->
</head>
<body>
<div class="container-fluid fixed-top header">
        <a href="home.php">
            <img src="imdb.png" class="logo">
        </a>
        <button class="outbtn " action="index.php" type="reset">Log out</button> 

        <div class="container searchbox">
        <form action="home.php" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Search">
                <div class="input-group-append">
                    <button class="btn btn-search" type="submit" name="search-submit">Go</button> 
                </div>
              </div>
        </form>
        </div>
           
	</div>
   
   
	<!-- end Header -->
