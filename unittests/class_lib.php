<?php 		
	class employee {
        var $username;
        var $password;
        var $fname;
        var $lname;
        var $salary;
        var $position;
        
		function __construct($username, $password, $fname, $lname, $salary, $position) {
            $this->username = $username;
            $this->password = $password;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->salary = $salary;
            $this->position = $position;
		}
        
        function get_fname() {
            return $this->fname;
        }
        
        function get_lname() {
            return $this->lname;
        }
        
        function set_prof_info($salary, $position) {
            $this->salary = $salary;
            $this->position = $position;
        }
        
        function set_personal_info($fname, $lname) {
            $this->fname = $fname;
            $this->lname = $lname;
        }
 
		function get_username() {
		 	 return $this->username;		
        }	
        
        function get_salary() {
            return $this->salary;
        }
        
        function get_position() {
            return $this->position;
        }
        
        function echo_results() {
            print_r($this);
        }

	}	 	

    class employee_collection {
        var $arr;
        
        function __construct() {
            $this->arr = array();
        }
        
        function get_arr() {
            return $this->arr;
        }
        
        function add_employee($new_employee) {
            array_push($this->arr, $new_employee);
        }
        
        function pop() {
            $employee = array_pop($this->arr);
            return $employee;
        }
        
        function remove_employee($username) {
            echo "In function";
            foreach ($employees as $employee) {
                if (strcmp($employee->get_username(), $username) == 0) {
                    if ($key = array_search($employee, $this->arr) != false) {
                        echo "in search";
                        $employee = $this->arr[$key];
                        print_r($employee);
                        unset($this->arr[$key]);
                    }
                }
            }
            
            
        }
        
        function echo_results() {
            print_r(array_values($this->arr));
        }
    }
?>