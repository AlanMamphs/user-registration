<div>
		<?php if(isset($_SESSION['is_logged_in'])) : ?>
		<div class="well">
		<table class="table">
			<tr>
				<td>LOGIN NAME</td>
				<td><?php echo $viewmodel['username']; ?></td>
			</tr>
			<tr>
				<td>NAME</td>
				<td><?php echo $viewmodel['name']; ?></td>
			</tr>
			<tr>
				<td>SURNAME</td>
				<td><?php echo $viewmodel['surname']; ?></td>
			</tr>
			<tr>
				<td>COUNTRY</td>
				<td><?php echo $viewmodel['Country']; ?></td>
			</tr>
				
				
		</table>	
		<?php else: ?>
					
			<?php header('Location: '.ROOT_URL.'users/login/username'); ?>

		<?php endif; ?>			
			
		</div>
	
</div>