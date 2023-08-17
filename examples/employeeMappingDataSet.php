<?php
//Loading Autoload file 
require '../vendor/autoload.php';


use Organogram\Employee;

// Example to show some employee
$emp = new Employee();
$data = $emp->setEmployeeMapping();
echo "<pre>";
print_r($data);
echo "</pre>";

// echo $data;
