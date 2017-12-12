<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>
<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<form action="../public/index.php?m=users" method="post">
				<input type="hidden" name="s" value="useradd">
				<input type="submit" class="btn btn-primary" value="Add User">
			</form>	
		</div>	
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-2">Username</div>
		<div class="col-xs-2">Fullname</div>
		<div class="col-xs-2">Email</div>
		<div class="col-xs-2">Password</div>
		<div class="col-xs-1">Is Admin</div>
		<div class="col-xs-1"></div>
		<div class="col-xs-1"></div>
	</div>	
	<?php foreach ($users as $user){ ?>
	<div class="row">
		<div class="col-xs-2"><?php echo $user['username']?></div>
		<div class="col-xs-2"><?php echo $user['fullname']?></div>
		<div class="col-xs-2"><?php echo $user['email']?></div>
		<div class="col-xs-2"><?php echo $user['password']?></div>
		<div class="col-xs-1"><?php echo $user['isadmin']?></div>
		<div class="col-xs-1">
			<form action="../public/index.php?m=users" method="post">
				<input type="hidden" name="id" value="<?php echo $user['id']?>">
				<input type="hidden" name="s" value="useredit">
				<input type="submit" class="btn btn-primary" value="Edit">
			</form>		
		</div>	
		<div class="col-xs-1">	
			<form action="../public/index.php?m=users" method="post">
				<input type="hidden" name="id" value="<?php echo $user['id']?>">
				<input type="hidden" name="s" value="userdelete">
				<input type="submit" class="btn btn-primary" value="Delete">
			</form>						
		</div>
	</div>
	<?php } ?>
</div>
<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>