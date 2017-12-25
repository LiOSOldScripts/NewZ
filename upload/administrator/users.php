<?php
    include 'functions/navi.php';
    include 'functions/acp_footer.php';
	include 'functions/acp_user.php';
	include '../config.php';
	include 'functions/auth.php';
?>
<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>New-Z | User</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />

  <!-- If you are using the gem version, you need this only -->
  <link rel="stylesheet" href="css/app.css" />

  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>

<?
navi();
?>
<div class="row">
<div class="large-12 columns">
	
<h2>Usermanagment </h2><br>
 <a href="#" data-reveal-id="1" class="small button success">Add new User </a>
<div id="1" class="reveal-modal">
  <h2>Add new user</h2>
 <? adduser() ?>
  <a class="close-reveal-modal">&#215;</a>
</div>

<? list_users() ?>

</tbody>
</table>
<br>
<hr>



</div>
</div>
<!--<?

// $sql = "SELECT * FROM user";
// $query = mysql_query($sql);
// $result = mysql_fetch_assoc($query);

// if(!$result){
//	die('Fehler beim Anzeigen aller User: ' .mysqlerror());
//}
?>-->


<?php
    footer();
?>

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.alerts.js"></script>
  <script src="js/foundation/foundation.clearing.js"></script>
  <script src="js/foundation/foundation.cookie.js"></script>
  <script src="js/foundation/foundation.dropdown.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.joyride.js"></script>
  <script src="js/foundation/foundation.magellan.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.reveal.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.tooltips.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script src="js/foundation/foundation.interchange.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>
