<?php include("class_lib.php"); ?>

<?php session_start(); ?>

<?php 
$employees = $_SESSION['employees'];
$employee = $employees->pop();
$employees->add_employee($employee);
$salary = $employee->get_salary();
$position = $employee->get_position();
$_SESSION['employee'] = $employee;
?>

<!DOCTYPE html>
 <html>
 <head>
     <title>Register</title>
     <link rel="stylesheet" href="default.css">
     <meta charset="UTF-8">
     
 </head>
 <body>
     <h1>Unit Test Case #3</h1>
     <p>Submit the form with the following values ("2" for position and "30000" for salary) to verify that the update process for professional information was successful.</p>
     <form action="testcase3.php" method='post'>
         <div class="container">
 
             <label><b>Position</b></label>
             <input type="number" name="position" value=<?=$position?> min="0" max="3" required>
 
             <label><b>Salary</b></label>
             <input type="number" name="salary" value=<?=$salary?> min="0" max="500000" required>
 
             <button type="submit">Submit</button>
         </div>
         <div class="container">
             <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
         </div>
     </form>
 </body>
 </html>
