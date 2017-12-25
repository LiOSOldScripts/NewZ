
<?
############################################
#     Config für pasterntCMS               #
############################################
$site_title = "pasterntCMS"; 
$site_url = "mc.pasternt-cms.de/test"; 

############################################ 
#              MySQL-Details               # 
############################################ 
$host = "127.0.0.1"; 
$user = "mcsql1"; 
$passwrd = "377b663c"; 
$db = "mcsql1"; 
  
$connection=mysql_connect($host, $user, $passwrd) or die(mysql_error()); 
  
if(!$connection){
        die("Es konnte keine Verbindung zur Datenbank hergestellt werden"); 
} 
 
mysql_select_db($db, $connection) or die(mysql_error());
?>