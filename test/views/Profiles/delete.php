<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Update User</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<span><h1>Are you sure that you want to delete <strong><?php echo $viewmodel['username']; ?> </strong> profile?</h1></span>
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Delete" />
    	<a class="btn btn-danger" href="<?php echo ROOT_URL.'profiles/view/'. $viewmodel['username']; ?>"name="Cancel">Cancel</a>
    </form>
  </div>
</div>


