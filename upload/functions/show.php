<?php

function show(){
    $id = $_GET['id'];
    include 'config.php';
    $connection=mysql_connect($host, $user, $passwrd);
    $id=mysql_real_escape_string($id);
if(!$connection){
	die('Error while connecting to Database!');
}

mysql_select_db($db, $connection);
        
        $id = mysql_real_escape_string($id);
        $sql = "SELECT * FROM `article` WHERE id = ".$id.""; 
        $db_erg = mysql_query( $sql );
        if ( ! $db_erg )
            {
                echo 'Invalid query: ' . mysql_error();
            }
        while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
            {
                $header = $zeile['header'];
                $content = $zeile['content'];
                $date = date("d.m.o",$zeile['date']);
                $time = date("G:i",$zeile['date']);
                echo '<div class="row"><div class="col-sm-2"></div><div class="col-sm-10"><h3>';
                echo '<h1>'.$header.'<small> '.$date.' at '.$time.'</small></h1><hr>';
                echo '</h3></div></div>';
                echo '<div class="row"><div class="col-sm-2"></div>';
                echo '<div class="col-sm-10">'.$content.'</div></div>';

            }
                mysql_free_result( $db_erg );

}

?>