<?php include_once(dirname(__FILE__) .'/header.tpl.php');?>
<div class="container">
	<div class="row">
		<form enctype="multipart/form-data" action="" method="post">
			<div class="col-xs-12">
			  <select name="users[]" style="width: 200px;" multiple>
				<?php foreach ($users as $user){ ?>
			    	<option value="<?php echo $user['id']?>"><?php echo $user['username']?></option>
				<?php } ?>				  	
			  </select>
			</div>
			<div class="col-xs-12">
			Select upload file: <input type="file" name="file" required="yes"  />
			<input type="submit" name="addFile" value="Upload" />
			</div>		
			<p>
		</form>
	</div>
</div>	
<?php include_once(dirname(__FILE__) .'/footer.tpl.php');?>