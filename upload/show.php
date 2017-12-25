<!DOCTYPE html>
<html>
  <head>
<?php
    include 'config.php';
    include 'functions/show.php';
?>
    <title><?php echo $site_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <meta name="author" content="Tim Pasternak">
    <meta name="description" content="pasterntCMS - Dein neues CMS! Newsportal">
    <meta name="keywords" content="pasterntCMS, CMS, pasternt, pasterntcms, Google"
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body background="img/bg.jpg">
      <br><br><br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            
<?php
echo '<a href="'.$news_page.'">Go back to overview</a>';
 show(); ?>  
    </div></div>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>