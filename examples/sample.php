<?php
//Loading Autoload file 
require '../vendor/autoload.php'; 

use Organogram\employee;

// Example to show some employee
$emp = new Employee();
$data = $emp->getEmployee();        
echo "<pre>"; 
print_r($data); 
echo "</pre>"; 

// ToDo:: call your getEmployeeUnerMe(EMP_ID, DPT_ID) and print all the ids here 
// $data = $emp->getEmployeeUnerMe(5,1); 
// echo "<pre>"; 
// print_r($data); 
// echo "</pre>"; 

$arr = array(
    array('id' => 100, 'parentid' => 0, 'name' => 'a'),
    array('id' => 101, 'parentid' => 100, 'name' => 'a'),
    array('id' => 102, 'parentid' => 101, 'name' => 'a'),
    array('id' => 103, 'parentid' => 101, 'name' => 'a'),
);

$new = array();
foreach ($arr as $a) {
    $new[$a['parentid']][] = $a;
}
echo "<pre>";
print_r($new);
echo "</pre>";
$tree = createTree($new, array($arr[0]));
echo "<pre>";
print_r($tree);
echo "</pre>";

function createTree(&$list, $parent)
{
    $tree = array();
    foreach ($parent as $k => $l) {
        if (isset($list[$l['id']])) {
            $l['children'] = createTree($list, $list[$l['id']]);
        }
        $tree[] = $l;
    }
    return $tree;
}
