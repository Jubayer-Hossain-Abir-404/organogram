<?php
/**
 * Model - All kind of database query and fetching result.  
 *
 *
 * PHP version 7.3
 *
 *
 * @category   CategoryName
 * @package    Organogram
 * @author     Sarwar Hossain <sarwar@instabd.com>
 * @copyright  2020 Intalogic Bangaldesh
 * @version    1.0.1
 */
namespace Organogram;

// Include the configration file 
include_once 'config.php';


/**
 * Model Class Statically use to all over the system.
 * Usage: \Model::get()->
 * 
 */
class Model{

    /**
     * @var MySQLi Object  
     */
    private $_dbcon;

    /**
     * Constructor 
     */
    public function __construct(){
        $this->_dbcon = new \MySQLi(env('DB_HOST', 'localhost'), env('DB_USER', 'root'), env('DB_PASSWORD', ''), env('DB_NAME', 'emp_dpt_role'));
        
        if ($this->_dbcon->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    
    
    /**
     * Static method get the Model Object 
     * @return \Organogram\Model
     */
    public static function get() {
        return new Model();
    }

    /**
     * Query : Execute the base query 
     * @param String $sql
     * @return mixed 
     */
    private function query($sql){
        return $this->_dbcon->query($sql);
    }


    /**
     * fetch : get the first result 
     * @param mixed $result
     * @return Array
     */
    private function fetch($result){
        $data = $result->fetch_assoc();
        $result->free_result();
        $this->_dbcon->close();
        return $data; 

    }
    /**
     * fetchAll : get the full result of query
     * @param type $result
     * @return type
     */
    private function fetchAll($result){        
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $result->free_result();
        $this->_dbcon->close();
        return $data; 
    }

    /**
     * employee: get the employee data
     * @param type $id
     * @return type
     */
    public function employees($id = false){
        $where = $id ? "WHERE id='{$id}'" : "";
        $sql= "SELECT * FROM employee {$where}"; 
        $result = $this->query($sql);
        $data = $this->fetchAll($result);
        return $data; 
    }

    /**
     * ToDo:: // do something
     */
    public function roles(){
        // do something

    }
    
    /**
     * ToDo:: // do something
     */

     public function insertDepartment($rows){
        $count=0;
        foreach($rows as $row){
            $name =  $row[0];
            $sql = "INSERT INTO department (name)
            VALUES ('$name')";
            $result = $this->query($sql);
            if($result){
                $count++;
            }
        }
        if($count==count($rows)){
            return "All the departments saved successfully";
        }else{
            return "Failed to save data";
        }
     }

    public function insertRoles($rows)
    {
        $count = 0;
        foreach ($rows as $row) {
            $name = $row[0];
            $position = $row[1];
            $sql = "INSERT INTO role (name, position)
            VALUES ('$name','$position')";
            $result = $this->query($sql);
            if ($result) {
                $count++;
            }
        }
        if ($count == count($rows)) {
            return "All the roles saved successfully";
        } else {
            return "Failed to save data";
        }
    }
    public function department(){
        // do something
    }
    
    /**
     * ToDo:: // do something
     */

    public function employeeUnderMe($employeeId, $departmentId){
        // do something
    }


}


