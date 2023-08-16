<?php
//Loading Autoload file 
require '../vendor/autoload.php';

use Organogram\Department;

// Example to show some employee
$dep = new Department();
$data = $dep->setDepartments();
echo "<pre>";
print_r($data);
echo "</pre>";

// echo $data;

