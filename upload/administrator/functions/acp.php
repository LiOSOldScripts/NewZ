<?php
function news(){ 
$xml = simplexml_load_file('http://updates.pasternt-cms.de/newz/news.xml');   
   
   
foreach ( $xml->update as $user )   
{   
   $version_new = $user->version;
   $url = $user->url;
   $alias = $user->alias;
   $build = '2';
   if($build < $version_new){
       ?>
<div data-alert class="alert-box alert">
  New version available! It's v<?php echo $alias; ?> | Download it <?php echo '<a href="'.$url.'" target="_blank"';?><font color="white"><u>here</u></font></a>.
  <a href="#" class="close">&times;</a>
</div>

<?php
   }    
}   
}
function xml(){
$xml = simplexml_load_file('http://updates.pasternt-cms.de/newz/info.xml');   
$counter = '0';   
?>
<h3>News:</h3>
<?php
 
foreach ( $xml->news as $user )   
{
    while($counter < '1'){     
   $title = $user->title;
   $content = $user->content;

       ?>
<div class="panel">
<b><? echo $title; ?></b><hr>
<?php echo '<p>'.$content.'</p></div>';

   
   $zahl = '1';
   $counter = $counter + $zahl;             
}
}}
?>