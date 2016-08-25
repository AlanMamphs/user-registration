<?php
// Start Session

session_start();

// Include Config
require('config.php');

require('classes/Bootstrap.php');
require('classes/Messages.php');
require('classes/Model.php');
require('classes/Controller.php');

require('controllers/home.php');
require('controllers/users.php');
require('controllers/profiles.php');

require('models/home.php');
require('models/user.php');
require('models/profile.php');

// new instance of Bootsrap class at index file
$bootstrap = new Bootstrap($_GET);
$controller = $bootstrap->createController();
if ($controller){
	$controller->executeAction();
}