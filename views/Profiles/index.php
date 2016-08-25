<div>
	<?php foreach($viewmodel as $item) : ?>
		<div class="well">
			<h3><?php echo $item['username']; ?></h3>
			<small><a href="<?php echo ROOT_URL.'profiles/view/'.$item['username']; ?>">View Profile</a></small>
			
			
		</div>
	<?php endforeach; ?>
</div>

<?php
$page = isset($_GET['page']) ? (int)$_GET['page']:1;
$total = isset($_SESSION['total']) ?(int)$_SESSION['total']:1;
if($page>$total){
	header('Location: '.ROOT_URL.'profiles/'.$total);
}
else if ($page <1){
	header('Location: '.ROOT_URL.'profiles/1');
}
// setting pagination numbering
for($i=1; $i<=$total; $i++){
	if($page == $i){
		echo $i.' ';
	}
	else{
		echo '<a href="'.ROOT_PATH.'profiles/'.$i.'">'.$i.' </a>';
	}
}
