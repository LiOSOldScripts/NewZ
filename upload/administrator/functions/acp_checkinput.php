<?php
function check_input($value)
{
if (is_numeric($value)){
$value = "'" . $value . "'";
	
} else {
	
if (get_magic_quotes_gpc())
{
$value = stripslashes($value);
}
$value = "'" . mysql_real_escape_string($value) . "'";
return $value;
}

}
	

?>