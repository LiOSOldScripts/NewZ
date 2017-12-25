<?php
function show(){
    include 'config.php';
    $connection=mysqli_connect($host, $user, $passwrd);

if(!$connection){
	die('Es konnte keine Verbindung zur Datenbank hergestellt werden');
}

mysqli_select_db($db, $connection);


        $sql = "SELECT * FROM `article` ORDER by `id` desc LIMIT 0, 5 "; 
        $db_erg = mysqli_query( $sql );
        if ( ! $db_erg )
            {
                echo 'Ung&uuml;ltige Abfrage: ' . mysqli_error($connection);
            }
        while ($zeile = mysqli_fetch_array( $db_erg, MYSQLI_ASSOC))
            {
                $header = $zeile['header'];
                $content = $zeile['preview'];
                $date = date("d.m.o",$zeile['date']);
                $time = date("G:i",$zeile['date']);
                $pic = $zeile['pic'];
                $id = $zeile['id'];
                echo '<div class="row"><div class="col-sm-2"></div><div class="col-sm-9"><h3>';
                echo $header.'<small> '.$date.' at '.$time.'</small>';
                echo '</h3></div></div>';
                echo '<div class="row"><div class="col-sm-2"><a href="show.php?id='.$id.'" class="thumbnail"><img src="'.$pic.'" width="100"></a></div>';
                echo '<div class="col-sm-9">'.$content.'<br><br><a href="show.php?id='.$id.'">Read more <span class="glyphicon glyphicon-circle-arrow-right"></span></a></div></div>';

            }
                mysqli_free_result( $db_erg );
            if(!isset($content) or !isset($header)){
                echo '<div class="alert alert-info">No current news found!</div>';
            }

}

?>