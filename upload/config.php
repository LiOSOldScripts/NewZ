
<?
############################################
#     Config for New-Z                     #
############################################
$site_title = "New-Z"; 
$news_page = "";

############################################ 
#              MySQL-Details               # 
############################################ 
$host = "localhost"; 
$user = ""; 
$passwrd = ""; 
$db = ""; 
  
$connection=mysql_connect($host, $user, $passwrd) or die(mysql_error());
  
if(!$connection){
        die("Es konnte keine Verbindung zur Datenbank hergestellt werden"); 
} 
 
mysql_select_db($db, $connection) or die(mysql_error());
?>