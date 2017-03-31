<?php

use PHPUNIT\Framework\TestCase;

// POST method 
function getData($team, $function, $data)
{
	$url = "http://vm344f.se.rit.edu/API/API.php";
	$url .= "?team=$team&function=$function";
	$options = array(
		'http' => array(
			'header' => "Content-type: application/x-www-form-urlencoded\r\n",
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$content = stream_context_create($options);
	$result = file_get_contents($url, false, $content);
	return $result;
}

class assertAPI extends TestCase
{
	public function setUp() {}
	public function tearDown() {}
	
	public function testcreateProf()
	{	
		$arrayData = array("username"=> "vm344b", "password" => "password", "fname" => "Root", "lname"=> "Last", "email"=> "vm344b.se.rit.edu", "role"=> "Admin", "managerID"=> "1", "title"=> "Robot", "address"=> "127.0.0.1", "salary"=> 100000, "phone"=> "1231231234");
		$data = getData("human_resources", "createProf", $arrayData);
		$this->assertTrue($data === 'true');
	}

	public function testLogin()
	{
		$arrayData = array("username" => "vm344b", "password" => "password");
		$data = getData("general", "login", $arrayData);
		$result = json_decode($data);
		$this->assertTrue($result->{"ID"} === 1);
	}
	
	// Test: Finds an existing User with the provided Username and updates its first and last name fields.
	public function testUpdateFullName()
	{
		$arrayData = array("username" => "vm344b", "fname" => "NewName", "lname" => "None");
		$data = getData("human_resources", "updateName", $arrayData);
		$this->assertTrue($data === 'true');
	}

	// Test: Validate that database will not accept null value
	public function testUpdateFullNameNull()
	{
		$arrayData = array("username" => null, "fname" => "NewName", "lname" => "Nobody");
		$data = getData("human_resources", "updateName", $arrayData);
		$this->assertTrue($data !== "true");
	}
	
	//Test: Returns the personal info fields of the User corresponding to the provided Username. 
	public function testgetPersonalInfo()
	{
		$arrayData = array("username" => "vm344b");
		$data = getData("human_resources", "getPersonalInfo", $arrayData);
		$result = json_decode($data);
		$getAssert = ($result->{"ID"} === 1) && ($result->{"FIRSTNAME"} === "NewName") && ($result->{"EMAIL"} === "vm344b.se.rit.edu");
		$this->assertTrue($getAssert);
	}

	// Test: Validate that database will not accept null value
	public function testgetPersonalInfoNull()
	{
		$arrayData = array("username" => null);
		$data = getData("human_resources", "getPersonalInfo", $arrayData);
		$this->assertTrue($data !== "true");
    }
	
	// Takes in the id of an existing university employee and will return
	//  the professional information of the passed in employee.
	public function testgetProfInfo()
	{
		$arrayData = array("id" => 1);
		$data = getData("human_resources", "getProfInfo", $arrayData);
		$result = json_decode($data);
		$this->assertTrue($result->{"ADDRESS"} === "127.0.0.1");
	}

	// Test: Validate that database will not accept null value
	public function testgetProfInfoNull()
	{
		$arrayData = array("id" => null);
		$data = getData("human_resources", "getProfInfo", $arrayData);
		$this->assertTrue($data !== "true");
	}
	
	// Test: Finds an existing UniversityEmployee with the provided userId and updates its salary and title fields.
	public function testUpdatePerson()
	{
		$arrayData = array("username"=> "vm344b", "fname" => "NewName", "lname"=> "None", "email"=> "vm344b.se.rit.edu", "address"=> "127.0.0.2", "phone"=> "9879871234");
		$data = getData("human_resources", "updatePerson", $arrayData);
		$this->assertTrue($data === 'true');
	}

	// Test: Validate that database will not accept null value
	public function testUpdatePersonNull()
	{
		$arrayData = array("username"=> null, "fname" => "NewName", "lname"=> "None", "email"=> "vm344b.se.rit.edu", "address"=> "127.0.0.2", "phone"=> "9879871234");
		$data = getData("human_resources", "updatePerson", $arrayData);
		$this->assertTrue($data !== 'true');
	}
	
	// Finds an existing User with the provided Username and updates its password field. 
	// Encryption is used during this transaction for security purposes.
	public function testupdatePassword()
	{
		$arrayData = array("username" => "vm344b", "password" => "password");
		$data = getData("human_resources", "updatePassword", $arrayData);
		$this->assertTrue($data === 'true');
	}

	// Test: Validate that database will not accept null value
	public function testupdatePasswordNull()
	{
		$arrayData = array("username" => null, "password" => "password");
		$data = getData("human_resources", "updatePassword", $arrayData);
		$this->assertTrue($data !== 'true');
	}

	// Update professional information such as salary and title
	public function testupdateProf()
	{
		$arrayData = array("id" => 1, "salary" => 10000, "title" => "superadmin");
		$data = getData("human_resources", "updateProf", $arrayData);
		$this->assertTrue($data === 'true');
	}

	// Test: Validate that database will not accept null value
	public function testupdateProfNull()
    {
        $arrayData = array("id" => null, "salary" => 10000, "title" => "superadmin");
        $data = getData("human_resources", "updateProf", $arrayData);
        $this->assertTrue($data !== 'true');
    }
    
    // Terminate an employee by setting attribute to 1 for terminate
    public function testTerminate()
    {
    	$arrayData = array("id" => 1);
    	$data = getData("human_resources", "terminate", $arrayData);
    	$this->assertTrue($data === 'true');
    }
    
    // Test: Validate that database will not accept null value
    public function testTerminateNull()
    {
    	$arrayData = array("id" => null);
    	$data = getData("human_resources", "terminate", $arrayData);
    	$this->assertTrue($data !== 'true');
    }
    
    // Remove employee from the database
    public function testRemoveEmployee()
    {
    	$arrayData = array("id" => 1);
    	$data = getData("human_resources", "removeEmployee", $arrayData);
    	$this->assertTrue($data === 'true');
    }
    
    // Test: Validate that database will not accept null value
    public function testRemoveEmployeeNull()
    {
    	$arrayData = array("id" => null);
    	$data = getData("human_resources", "removeEmployee", $arrayData);
    	$this->assertTrue($data !== 'true');
    }

}

?>
