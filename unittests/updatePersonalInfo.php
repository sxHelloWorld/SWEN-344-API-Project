<?php 
/*
Form for updating personal information and instructions on unit tests
*/

include("class_lib.php"); ?>

<?php session_start(); ?>

<?php 
$employees = $_SESSION['employees'];
$employee = $employees->pop();
$employees->add_employee($employee);
$fname = $employee->get_fname();
$lname = $employee->get_lname();
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
     
     <h1>Unit Test Case #2</h1>
     <?php
     /*
     Instruction for test case
     */
     ?>
     <p>Submit the form with the following values ("John" for first name and "Doe" for last name) to verify that the update process for personal information was successful.</p>
     
     <?php
     /*
     Form to update personal information
     */
     ?>
     <form action="testcase2.php" method='post'>
         <div class="container">
 
             <label><b>First Name</b></label>
             <input type="text" name="fName" value=<?=$fname?> placeholder="First name" required>
             
             <label><b>Last Name</b></label>
             <input type="text" name="lName" value=<?=$lname?> placeholder="Last name" required>
 
             <button type="submit">Submit</button>
         </div>
         <div class="container">
             <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
         </div>
     </form>
 </body>
 </html>
