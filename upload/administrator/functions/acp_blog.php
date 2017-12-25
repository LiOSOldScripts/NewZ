<?php
    function show(){

        $sql = "SELECT * FROM `article` ORDER by `id` desc LIMIT 0, 5 "; 
            $db_erg = mysql_query( $sql );
            if ( ! $db_erg )
                {
                    die('Ungültige Abfrage: ' . mysql_error());
                }
                while ($zeile = mysql_fetch_array( $db_erg, MYSQL_ASSOC))
                {
                    $header = $zeile['header'];
                    $id = $zeile['id'];
                    $text = $zeile['preview'];
                    $pic = $zeile['pic'];
                    echo '<fieldset><h2>'.$header.'</h2>';
                    echo '<hr>';
                    echo $text.'<br><br>';
                    delete($id);
                    echo '</fieldset>';
?>

<?php
                }
    }
    function add(){
?>
<a href="#" data-reveal-id="create" class="small button success"><i class="foundicon-add-doc"></i> New Entry</a>
<div id="create" class="reveal-modal"> 
    <h2>Add a new entry</h2>
      <form action="blog.php" method="post" data-abide>
        <input type="text" name="titel" size="20" placeholder="Title" required><br>
        <input type="text" name="url" size="20" placeholder="Picture-URL (inkl. http(s)://" required><br>
        <textarea cols="80" name="preview" rows="10" required placeholder="Preview-Text"></textarea><br>
        <textarea cols="80" id="content" name="content" rows="10" required></textarea><br>
        <input type="submit" value="Create" name="submit" class="button success" />
        <input type="hidden" value="add" name="action" />
    </form>    <script>
    CKEDITOR.replace( 'content' );
</script>      <a class="close-reveal-modal">&#215;</a>
</div>
<?php        
    }
    function delete($id){
    ?>
    <form action="blog.php" method="post">
        <input type="hidden" name="action" value="delete">
   <?php echo '<input type="hidden" name="id" value="'.$id.'">';?>
        <input type="submit" value="Delete" class="button alert tiny">
    </form>
<?php        
    }
    function getAction(){
         
        if(isset($_POST['action'])){
            $action = $_POST['action'];
            $id = mysql_real_escape_string($_POST['id']);
            if($action == 'delete'){
                $sql = "DELETE FROM `article` WHERE `id` = $id LIMIT 1";
                if(!mysql_query($sql)){
                    echo mysql_error();
                }
            }elseif($action == 'add'){
                $titel = mysql_real_escape_string($_POST['titel']);
                $url = mysql_real_escape_string($_POST['url']);
                $preview = mysql_real_escape_string($_POST['preview']);
                $content = mysql_real_escape_string($_POST['content']);
                $datum = time();
                $sql = "INSERT INTO `article` (`id`, `header`, `date`, `preview`, `pic`, `content`) VALUES (NULL, '$titel', '$datum', '$preview', '$url', '$content')";
                if(!mysql_query($sql)){
                    echo mysql_error();
                    echo '<br>';
                    echo $sql;
                }else{
                    
                }
            }
        }
    }
?>