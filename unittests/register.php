<!DOCTYPE html>
 <html>
 <head>
     <title>Register</title>
     <link rel="stylesheet" href="default.css">
     <meta charset="UTF-8">
     
 </head>
 <body>
     <h1>Unit Test Case #1</h1>
     <p>Submit the form with the following values to verify that the registration process (done by HR admin for newhire) was successful.</p>
     <form action="testcase1.php" method='post'>
         <div class="container">
 
             <label><b>Username</b></label>
             <input type="text" name="user" placeholder="Username" value="ese3633" required>
             
             <label><b>Password</b></label>
             <input type="password" name="password" value="lala" placeholder="Password" required>
 
             <label><b>First Name</b></label>
             <input type="text" name="fName" value="Eric" placeholder="First name" required>
             
             <label><b>Last Name</b></label>
             <input type="text" name="lName" value="Epstein" placeholder="Last name" required>
 
             <label><b>Position</b></label>
             <input type="number" name="position" value="2" min="0" max="3" required>
 
             <label><b>Salary</b></label>
             <input type="number" name="salary" value="60000" min="0" max="500000" required>
 
             <button type="submit">Submit</button>
         </div>
         <div class="container">
             <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
         </div>
     </form>
 </body>
 </html>
