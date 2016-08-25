<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Update User</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Login Name</label>
    		<span><?php echo $viewmodel['username']; ?></span>
    	</div>
    	
    	<div class="form-group">
    		<label>Password</label>
    		<input type="password" name="password" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Verify</label>
    		<input type="password" name="verify" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Name</label>
    		<input type="text" name="name" class="form-control" placeholder="<?php echo $viewmodel['name']; ?>" />
    	</div>
    	<div class="form-group">
    		<label>Surname</label>
    		<input type="text" name="surname" class="form-control" placeholder="<?php echo $viewmodel['surname']; ?>" />
    	</div>
    	<div class="form-group">
    		<label>Country</label>
    		<input type="text" name="country" class="form-control" placeholder="<?php echo $viewmodel['Country']; ?>" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Update" />
    	<a class="btn btn-danger" href="<?php echo ROOT_URL.'profiles'; ?>"name="Cancel">Cancel</a>
        <a class="btn btn-danger" href="<?php echo ROOT_URL.'profiles/delete/'.$viewmodel['username']; ?>" name="delete">Delete</a>
    </form>
  </div>
</div>


