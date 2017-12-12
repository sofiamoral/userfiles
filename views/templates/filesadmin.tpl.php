<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>
<div class="container">
	<div class="row">
		<div class="col-xs-2">
			<form action="../public/index.php?m=files" method="post">
				<input type="hidden" name="s" value="fileadd">
				<input type="submit" class="btn btn-primary" value="Add File">
			</form>	
		</div>	
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-3">filename</div>
		<div class="col-xs-3">created</div>
		<div class="col-xs-3">viewed</div>
		<div class="col-xs-3"></div>
	</div>	
	<?php foreach ($files as $file){ ?>
	<div class="row">
		<div class="col-xs-3"><?php echo $file['filename']?></div>
		<div class="col-xs-3"><?php echo $file['date']?></div>
		<div class="col-xs-3"><?php echo $file['viewed']?></div>
		<div class="col-xs-3">
			<form action="../public/index.php?m=files" method="post">
				<input type="hidden" name="id" value="<?php echo $file['id']?>">
				<input type="hidden" name="s" value="fileview">
				<input type="submit" class="btn btn-primary" value="View">
			</form>		
		</div>
	</div>
	<?php } ?>
</div>
<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>