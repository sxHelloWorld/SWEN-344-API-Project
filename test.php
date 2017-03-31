<?php include("class_lib.php"); ?>

<?php  
	$stefan = new employee("Stefan Mischook");   
    $employees = new employee_collection();
    $employees->add_employee($stefan);
    $employees->echo_results();

	echo "Stefan's full name: " .  $stefan->get_name() ;  
 
	/*  
	Since $pinn_number was declared private, this line of code 
	will generate an error. Try it out!   
	*/  
?>