<?php 	

/*
Employee class represents entity with username, password, first name, last name, salary, and position. Its purpose is to demonstrate capacity without API connections.
*/
	class employee {
        var $username;
        var $password;
        var $fname;
        var $lname;
        var $salary;
        var $position;
        
        /*
        Constructs Employee object 
        @params: $username, $password, $fname, $lname, $salary, $position
        */
		function __construct($username, $password, $fname, $lname, $salary, $position) {
            $this->username = $username;
            $this->password = $password;
            $this->fname = $fname;
            $this->lname = $lname;
            $this->salary = $salary;
            $this->position = $position;
		}
        
        /*
        Returns first name
        */
        function get_fname() {
            return $this->fname;
        }
        
        /*
        Returns last name
        */
        function get_lname() {
            return $this->lname;
        }
        
        /*
        Updates professional information
        */
        function set_prof_info($salary, $position) {
            $this->salary = $salary;
            $this->position = $position;
        }
        
        /*
        Updates personal information
        */
        function set_personal_info($fname, $lname) {
            $this->fname = $fname;
            $this->lname = $lname;
        }
 
        /*
        Returns username
        */
		function get_username() {
		 	 return $this->username;		
        }	
        
        /*
        Returns salary
        */
        function get_salary() {
            return $this->salary;
        }
        
        /*
        Returns position
        */
        function get_position() {
            return $this->position;
        }
        
        /*
        Prints results
        */
        function echo_results() {
            print_r($this);
        }

	}	 	

/*
Employee Collection class represents collection of Employee objects for persistent data storage. Its purpose is to demonstrate capacity without API connections.
*/
    class employee_collection {
        var $arr;
        
        /*
        Constructs empty Employee Collection object
        */
        function __construct() {
            $this->arr = array();
        }
        
        /*
        Returns array
        */
        function get_arr() {
            return $this->arr;
        }
        
        /*
        Adds Employee object to the array
        */
        function add_employee($new_employee) {
            array_push($this->arr, $new_employee);
        }
        
        /*
        Pops Employee object from the array
        */
        function pop() {
            $employee = array_pop($this->arr);
            return $employee;
        }
        
        /*
        Removes Employee object from the array given the username
        */
        function remove_employee($username) {
            foreach ($this->arr as $employee) {
                if (strcmp($employee->get_username(), $username) == 0) {
                    $key = array_search($employee, $this->arr); 
                    $employee = $this->arr[$key];
                    unset($this->arr[$key]);
                    
                }
            }
            
            
        }
        
        /*
        Prints results
        */
        function echo_results() {
            print_r(array_values($this->arr));
        }
    }
?>