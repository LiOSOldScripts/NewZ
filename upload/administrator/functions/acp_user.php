<?php
function list_users(){
?>
<table width="100%">
<thead>
<tr>
<th>Username</th>
<th>E-Mail Adress</th>
<th>State</th>
<th>Options</th>
</tr>
</thead>
<tbody>
<?php
$sql = "SELECT * FROM user";	
$query = mysql_query($sql);

while($row = mysql_fetch_object($query)) {
$userid = $row->id;
$username = $row->name;
echo "<tr>";
echo "<th>" .$username. "</th>";
echo "<th>" .$row->email. "</th>";

if($row->banned == 0) {
?><th><span class="success label">Unlocked</span></th><?
} else {
?><th><span class="alert label">Locked</span></th><?
}
?><th><?echo delete_user($userid);?> <?

if($row->banned == 0){
echo lockuser($userid). "</th>";
} else {
echo unlockuser($userid). " " .lockdetails($userid). "</th>";
}

}
echo "</tr>";
echo "</tbody>";
echo "</table>";
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to delete a User												//
////////////////////////////////////////////////////////////////////////////// SEPERATOR

function delete_user($userid){
	
if(isset($_POST['delnow'])){
$id = $_POST['userid'];
$sql = "DELETE FROM user WHERE id = " . $id;
$query = mysql_query($sql);

?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_delete" class="small button alert"><i class="foundicon-remove"></i> Delete User</a>';
echo '<div id="'.$userid.'_delete" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>Do you really want to delete <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?>?</p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<input type="submit" value="Yes" name="delnow" class="button alert" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />Abort</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to unlock or lock a user										//
////////////////////////////////////////////////////////////////////////////// SEPERATOR
function lockuser($userid){
	
if(isset($_POST['locknow'])){
$id = $_POST['userid'];
$reason = $_POST['banreason'];

$datum = date("d.m.Y");
$uhrzeit = date("g:i a");

$sql = "UPDATE `user` SET `banned`=1,`banned_reason`='" .$reason. "',`banned_date`= '" .$datum. "', `banned_time`= '" .$uhrzeit. "' WHERE `id` = " . $id;
$query = mysql_query($sql);
?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_lock" class="small button alert"><i class="foundicon-remove"></i> Lock user</a>';
echo '<div id="'.$userid.'_lock" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>Locking a user is a alternative to deleting it.</p>
<p>Do yo really want to lock: <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?> ?</p>
<p>Why? (Optional):</p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<p><input type="text" name="banreason" /></p>
<input type="submit" value="Lock" name="locknow" class="button alert" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />Abort</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?	

}

function unlockuser($userid){
if(isset($_POST['unlocknow'])){
$id = $_POST['userid'];

$sql = "UPDATE `user` SET `banned`=0,`banned_reason`='', banned_time='', banned_date='' WHERE `id` = " . $id;
$query = mysql_query($sql);
?><script>javascript:location.reload()</script><?
}
	
echo '<a href="#" data-reveal-id="'.$userid.'_unlock" class="small button success"><i class="foundicon-remove"></i> Unlock User</a>';
echo '<div id="'.$userid.'_unlock" class="reveal-modal">'; 

$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);

?>
<div align="left">
<p>If you want to unlock a user, you are right here.</p>
<p>User to unlock: <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?></p>
<form action="<? echo $_SERVER['PHP_SELF'];?>" method="post" data-abide>
<input type="submit" value="Unlock user" name="unlocknow" class="button success" />  <a onclick="$('#1').foundation('reveal', 'close');" class="button secondary" />Abort</a></div>
<input name="userid" type="hidden" value="<?echo $userid;?>" />
</form><a class="close-reveal-modal">&#215;</a>
</div>
<?	
}

function lockdetails($userid)
{
$sql = "SELECT name FROM user WHERE id = " .$userid;
$query = mysql_query($sql);
$uname = mysql_fetch_assoc($query);	

$sql2 = "SELECT * FROM user WHERE id = " .$userid;
$query2 = mysql_query($sql2);
$reason = mysql_fetch_assoc($query2);
	
echo '<a href="#" data-reveal-id="'.$userid.'_lockdetails" class="small button secondary"><i class="foundicon-remove"></i> Ban-Details</a>';
echo '<div id="'.$userid.'_lockdetails" class="reveal-modal">'; 
?>
<div align="left">
<p>The User <?php echo '<span class="secondary label">'.$uname['name'].'</span>';?> was locked. Reason:</p>
<p><div class="panel"><?echo $reason['banned_reason'];?></div></p>
<p>Time the user was locked: <span class="secondary label"><?echo $reason['banned_date']. " " .$reason['banned_time'];?></span></p>
<a onclick="$('#1').foundation('reveal', 'close');" class="button alert" />Close</a>
<?
}


////////////////////////////////////////////////////////////////////////////// SEPERATOR
// Function to add a User													//
////////////////////////////////////////////////////////////////////////////// SEPERATOR


function adduser() {
include("acp_checkinput.php");
include ("../config.php");


if(isset($_POST['submite'])){
	


$name = check_input($_POST['name']);
$password = md5(md5($_POST['password']));
$email = check_input($_POST['email']);
$banned = "false";

$sql = "INSERT INTO user (`name`, `passwrd`, `email`, `banned`, `banned_reason`)
		VALUES (" .$name. ",'" .$password. "'," .$email. "," .$banned. ", '')";
		
$result = mysql_query($sql);
}
?>

<form method="post" action="<? echo $_SERVER['SCRIPT_NAME'];?>" data-abide>
<div class="name-field">
<label>Username <font color="#FE2E2E">*</font></label>
<input name="name" type="text" placeholder="Username" required pattern="[a-zA-Z0-9]+">
<small class="error">Please enter a correct User-Name.</small>
</div>
<div class="email-field">
<label>E-Mail <font color="#FE2E2E">*</font></label>
<input name="email" type="email" placeholder="E-Mail" required>
<small class="error">Please enter a correct E-Mail</small>
</div>


<div class="password-field">
<label>Password <font color="#FE2E2E">*</font></label>
<input name="password" type="password" placeholder="Password" required>
</div>
<p>All with <font color="#FE2E2E">*</font> marked fields have to be filled out!</p>
<button name="submite" value="1" type="submit">Create User</button>
</form>
<?}
?>