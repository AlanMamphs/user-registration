<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Register User</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    	<div class="form-group">
    		<label>Login Name</label>
    		<input type="text" name="username" class="form-control" />
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
    		<input type="text" name="name" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Surname</label>
    		<input type="text" name="surname" class="form-control" />
    	</div>
    	<div class="form-group">
    		<label>Country</label>
    		<input type="text" name="country" class="form-control" />
    	</div>
    	<input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
  </div>
</div>


