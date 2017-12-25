<?php
	
function navi()
{
  ?>
  <nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="index.php">New-<i>Z</i></a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
      <li><a href="index.php">Home</a></li>
      <li class="divider"></li>
      <li><a href="users.php">Usermanagement</a></li>
      <li class="divider"></li>
      <li><a href="blog.php">Blog</a></li>       
      <li class="divider"></li>
    </ul>
        <!-- Right Nav Section -->
    <ul class="right">
      <li><a href="../" class="alert button" target="_blank">Visit site</a></li>
      <li class="divider hide-for-small"></li>
      <li class="has-dropdown"><a href="#">Hello, <?php echo $_SESSION['user'];?></a>

        <ul class="dropdown">
          
          <li><a href="logout.php">Logout &rarr;</a></li>
        </ul>
      </li>
      <li class="divider"></li> 
    </ul>
  </section>
</nav><?
}
?>
