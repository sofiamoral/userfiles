<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>

Username: <?php echo $user->getUsername()?><br>
Fullname: <?php echo $user->getFullname()?><br>
Email: <?php echo $user->getEmail()?><br>
Password: <?php echo $user->getPassword()?><br>

<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>