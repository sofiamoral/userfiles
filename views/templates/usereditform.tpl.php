<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>

<form action="../public/index.php" method="post">
Username: 	<input type="text" name="username" value="<?php echo $user->getUsername()?>"><br>
Fullname: 	<input type="text" name="fullname" value="<?php echo $user->getFullname()?>"><br>
Email: 	<input type="email" name="email" value="<?php echo $user->getEmail()?>"><br>
Password: 	<input type="password" name="password" value="<?php echo $user->getPassword()?>"><br>
Is Admin: 	<select name="isAdmin">
			<option value="1">yes</option>
			<option value="0">no</option>
			</select><br>
<input type="hidden" name="id" value="<?php echo $user->getId()?>">
<input type="hidden" name="s" value="usereditform">
<input type="submit" value="save">
</form>

<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>