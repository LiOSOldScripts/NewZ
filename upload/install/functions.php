<?php
    function start(){
?>
        <div class="row">
                <div class="col-md-5">
                    <h1>Install New-Z</h1>
                    <hr>
                    <p>With this setup you can install your copy of New-Z.</p>
                    <h4>Explanation</h4>
<p>At the left you see the things you have to do, at the right site you see the forms</p>
                    <p>All with <font color="#FE2E2E">*</font> marked fields have to be filled out!</p>
                </div>
                <div class="col-md-7">
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%<span class="sr-only">0% Complete</span>
                    </div>
                </div>
                    <a href="index.php?step=config" class="btn btn-success">Start setup!</a>
                </div></div>
<?php        
    };
    function config(){
    if(isset($_GET['action'])){
            $action = $_GET['action'];
        if($action == 'write'){
if(!isset($_POST['sitename']) or !isset($_POST['siteurl']) or !isset($_POST['host']) or !isset($_POST['user']) or !isset($_POST['password']) or !isset($_POST['db'])){
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        20%<span class="sr-only">20% Complete</span>
                    </div>
                </div>
                    <h1 class="text-danger">Please fill out every field!</h1>
                    <a href="index.php?step=config" class="btn btn-success">Back</a>
                </div></div>
<?php      
}else{
            $config = '
<?
############################################
#     Config für New-Z                     #
############################################
$site_title = "'.$_POST['sitename'].'"; 
$news_page = "'.$_POST['news'].'"; 

############################################ 
#              MySQL-Details               # 
############################################ 
$host = "'.$_POST['host'].'"; 
$user = "'.$_POST['user'].'"; 
$passwrd = "'.$_POST['password'].'"; 
$db = "'.$_POST['db'].'"; 
  
$connection=mysql_connect($host, $user, $passwrd) or die(mysql_error()); 
  
if(!$connection){
        die("Es konnte keine Verbindung zur Datenbank hergestellt werden"); 
} 
 
mysql_select_db($db, $connection) or die(mysql_error());
?>';


$file = file_put_contents('../config.php', $config);
if(!$file){
?>

                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        20%<span class="sr-only">20% Complete</span>
                    </div>
                </div>
                    <h1 class="text-danger">There was an error while writing the config!</h1>
                    <p>Please check CHMOD'S!</p>
                    <a href="index.php?step=config" class="btn btn-success">Back</a>
                </div></div>
<?php      
}else{
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 30%">
                        30%<span class="sr-only">30% Complete</span>
                    </div>
                </div>
                    <h1 class="text-success">The config was successfully written!</h1>
                    <a href="index.php?step=database" class="btn btn-success">Start MySQL-Import!</a>
                </div></div>
<?php    
}
}
        }
    }else{
                    ?>
                    <div class="row">
                <div class="col-md-5">
                    <h1>Create the config</h1>
                    <hr>
                    <p>With the help of this form you can create your own config.</p>
                    <h4>Explanation</h4>
                    <ul class="list-unstyled">
                        <li><b>Sitename</b> How is your site called? </li>
                        <li><b>Overview-URL</b> How is the file called where you will see all news?</li>
                        <li><b>MySQL-Host</b> At which server is the MySQL-Service running?</li>
                        <li><b>MySQL-User</b> How is the MySQL-User called?</li>
                        <li><b>MySQL-Password</b> What's the password for the MySQL-User?</li>
                        <li><b>MySQL-Database</b> How is your Database called?</li>
                    </ul>
                    <p>All with <font color="#FE2E2E">*</font> marked fields have to be filled out!</p>
                </div>
                <div class="col-md-7">
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                        20%<span class="sr-only">20% Complete</span>
                    </div>
                </div>
                <form method="post" action="index.php?step=config&action=write" data-abide>
                <div class="name-field">
                <label>Sitename <font color="#FE2E2E">*</font></label>
                <input name="sitename" type="text" class="form-control" placeholder="e.g. New-Z" required>
                </div>
                <div class="name-field">
                <label>Overview-URL <font color="#FE2E2E">*</font></label><br>
                <input name="siteurl" type="text" class="form-control" placeholder="for example index.php" required>
                </div>


                <div class="password-field">
                <label>MySQL-Host <font color="#FE2E2E">*</font></label>
                <input name="host" type="text" class="form-control" placeholder="typically 127.0.0.1" required>
                </div>
                <div class="password-field">
                <label>MySQL-User <font color="#FE2E2E">*</font></label>
                <input name="user" type="text" class="form-control" placeholder="e.g. root">
                </div>
                <div class="password-field">
                <label>MySQL-Password <font color="#FE2E2E">*</font></label>
                <input name="password" type="password" class="form-control" placeholder="e.g. 12345678">
                </div>
                <div class="password-field">
                <label>MySQL-Database <font color="#FE2E2E">*</font></label>
                <input name="db" type="text" class="form-control" placeholder="e.g. new-z" required>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Create config</button>
                </form></div></div>
<?php
        }        
    };
    function finish(){
?>
          <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        100%<span class="sr-only">100% Complete</span>
                    </div>
                </div>
                    <h1 class="text-success">The setup was completed successfully!</h1>
                        <p>You are now able to:</p>
                    <a href="../administrator" class="btn btn-primary">Login into the Admin-CP</a><br><br>
                    <a href="../" class="btn btn-primary">view your site</a><br><br>
<h2 class="text-danger">Please delete the <pre>install</pre> directory</h2>
                </div></div>
<?php
    }
    function user(){
    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'add'){
            include ("../config.php");
            $username = $_POST['name'];
            $password = $_POST['password'];
            $email = $_POST['email'];

        $pw_encrypted = md5(md5($password));
        $sqlsec_mail = mysql_real_escape_string($email);
        $sqlsec_user = mysql_real_escape_string($username);
         ?>
        <div class="row">
                <div class="col-md-5">
                    <h1>Creating a user</h1>
                    <hr>
                    <p>With this form you can add your admin-account.</p>
                    <h4>Explanation</h4>
                    <ul class="list-unstyled">
                        <li><b>Username</b> Enter here your Admin-Username </li>
                        <li><b>E-mail</b> How is the E-mail you are using called?</li>
                        <li><b>Password</b> What password do you want to use?</li>
                    </ul>
                    <p>All with <font color="#FE2E2E">*</font> marked fields have to be filled out!</p>
                </div>
                <div class="col-md-7">
<?php
    if(!isset($_POST['name']) or !isset($_POST['password']) or !isset($_POST['email'])){
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        80%<span class="sr-only">80% Complete</span>
                    </div>
                </div>
                    <h1 class="text-danger">Please fill out every field!</h1>
                    <a href="index.php?step=user" class="btn btn-success">Back</a>
                </div></div>
<?php                   
    }else{
        if(! mysql_query("INSERT INTO `user` (`name`, `passwrd`, `id`, `email`, `banned`, `banned_reason`) VALUES
        ('".$sqlsec_user."','".$pw_encrypted."', 1,'".$sqlsec_mail."' , '0', '');")){
            $error = mysql_error();
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        80%<span class="sr-only">80% Complete</span>
                    </div>
                </div>
                    <h1 class="text-danger">There was an error in the SQL-Query:</h1>
<pre><?php echo $error; ?></pre>
                    <a href="index.php?step=user" class="btn btn-success">Back</a>
                </div></div>
<?php                  
        }else{
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                        100%<span class="sr-only">100% Complete</span>
                    </div>
                </div>
                    <h1 class="text-success">User was added successfully</h1>
                    <a href="index.php?step=finish" class="btn btn-success">Finish setup!</a>
                </div></div>
<?php    }  
    }        
        }
    }else{
        ?>
                    <div class="row">
                <div class="col-md-5">
                    <h1>Creating a user</h1>
                    <hr>
                    <p>With this form you can add your admin-account.</p>
                    <h4>Explanation</h4>
                    <ul class="list-unstyled">
                        <li><b>Username</b> Enter here your Admin-Username </li>
                        <li><b>E-mail</b> How is the E-mail you are using called?</li>
                        <li><b>Password</b> What password do you want to use?</li>
                    </ul>
                    <p>All with <font color="#FE2E2E">*</font> marked fields have to be filled out!</p>
                </div>
                <div class="col-md-7">
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                        80%<span class="sr-only">20% Complete</span>
                    </div>
                </div>
                <form method="post" action="index.php?step=user&action=add" data-abide>
                <div class="name-field">
                <label>Username <font color="#FE2E2E">*</font></label>
                <input name="name" type="text" class="form-control" placeholder="Username" required pattern="[a-zA-Z0-9]+">
                </div>
                <div class="email-field">
                <label>E-Mail <font color="#FE2E2E">*</font></label><br>
                <input name="email" type="email" class="form-control" placeholder="E-Mail" required>
                </div>


                <div class="password-field">
                <label>Password <font color="#FE2E2E">*</font></label>
                <input name="password" type="password" class="form-control" placeholder="Password" required>
                </div>
                <br>
                <button class="btn btn-primary" type="submit">Create user</button>
                </form></div></div>
<?php        }
    };
    function db(){
include '../config.php';
$article = mysql_query("CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `header` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `preview` text NOT NULL,
  `pic` varchar(255) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;");

$user = mysql_query("CREATE TABLE IF NOT EXISTS `user` (
  `name` text CHARACTER SET latin1 NOT NULL,
  `passwrd` text CHARACTER SET latin1 NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned_reason` varchar(255) CHARACTER SET latin1 NOT NULL,
  `banned_date` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  `banned_time` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=26 ;");

if(!$user){
    $error =mysql_error();
}
if(!$article){
        if(isset($error)){
    $error = $error.'<br>'.mysql_error();
    }else{
        $error = mysql_error();
    }
}
if(!$article or !$user){
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                        40%<span class="sr-only">40% Complete</span>
                    </div>
                </div>
                    <h1 class="text-danger">There was an error while writing the database!</h1>
                    <pre>
                            <?php echo $error; ?>
                    </pre>
                    <p>Please contact us!</p>
<?php
}else{
?>
                    <h2>Setup-Status:</h2>
                <div class="progress progress-striped active">
                    <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                        45%<span class="sr-only">45% Complete</span>
                    </div>
                </div>
                    <h1 class="text-success">The tables were written successfully!</h1>
                    <a href="index.php?step=user" class="btn btn-success">Next step</a>
<?php
}             
    };
    function action(){
     if(isset($_GET['step'])){
        $step = $_GET['step'];
   
        if($step == 'user'){
            user();               
        }elseif($step == 'finish'){
            finish();
        }elseif($step == 'config'){
            config();
        }elseif($step == 'database'){
            db();
        }
    }else{
            start();
        }
    }
?>