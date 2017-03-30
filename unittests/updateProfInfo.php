<!DOCTYPE html>
 <html>
 <head>
     <title>Register</title>
     <link rel="stylesheet" href="default.css">
     <meta charset="UTF-8">
     
 </head>
 <body>
     <h1>Unit Test Case #3</h1>
     <p>Submit the form with the following values to verify that the update process for professional information was successful.</p>
     <form action="testcase3.php" method='post'>
         <div class="container">
 
             <label><b>Position</b></label>
             <input type="number" name="position" value="2" min="0" max="3" required>
 
             <label><b>Salary</b></label>
             <input type="number" name="salary" value="30000" min="0" max="500000" required>
 
             <button type="submit">Submit</button>
         </div>
         <div class="container">
             <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
         </div>
     </form>
 </body>
 </html>
