<?php
//Loading Autoload file 
require '../vendor/autoload.php';

use Organogram\Role;

// Example to show some employee
$dep = new Role();
$data = $dep->setRoles();
echo "<pre>";
print_r($data);
echo "</pre>";

// echo $data;
