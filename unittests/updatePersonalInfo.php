<!DOCTYPE html>
 <html>
 <head>
     <title>Register</title>
     <link rel="stylesheet" href="default.css">
     <meta charset="UTF-8">
     
 </head>
 <body>
     <h1>Unit Test Case #2</h1>
     <p>Submit the form with the following values to verify that the update process for personal information was successful.</p>
     <form action="testcase2.php" method='post'>
         <div class="container">
 
             <label><b>First Name</b></label>
             <input type="text" name="fName" value="Erik" placeholder="First name" required>
             
             <label><b>Last Name</b></label>
             <input type="text" name="lName" value="Lars" placeholder="Last name" required>
 
             <button type="submit">Submit</button>
         </div>
         <div class="container">
             <a href="/"><button type="button" class="cancelbtn">Cancel</button></a>
         </div>
     </form>
 </body>
 </html>
