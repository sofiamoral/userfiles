<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>
<div class="container">
	<form action="../public/index.php?m=users" method="post">
		<div class="row">
			<div class="col-xs-1">Username: </div>
			<div class="col-xs-11"><input type="text" name="username"></div>
		</div>
		<div class="row">
			<div class="col-xs-1">Fullname:</div>
			<div class="col-xs-11"><input type="text" name="fullname"></div>
		</div>
		<div class="row">
			<div class="col-xs-1">Email:</div>
			<div class="col-xs-11"><input type="email" name="email"></div>
		</div>
		<div class="row">
			<div class="col-xs-1">Password: </div>
			<div class="col-xs-11"><input type="password" name="password"></div>	 
		</div>		
		<input type="hidden" name="isadmin" value="0">
		<input type="hidden" name="s" value="useraddform">
		<input type="submit" value="save">
	</form>
</div>
<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>