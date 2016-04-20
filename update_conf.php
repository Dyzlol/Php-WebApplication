<?php
  session_start();
  require_once("data.php");

  $applicant=unserialize($_SESSION["applicant"]);

  print<<<EOBODY
    <!doctype html>
    <html>
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
          <title>Update Confirmation</title>
          <link rel="stylesheet" type="text/css" href="mainstyle.css">
        </head>
        <body>
          <h2>The entry has been updated in the database and the new values are:</h2>
            <label>Name:</label> {$applicant->getName()} <br/>
            <label>Email:</label> {$applicant->getEmail()} <br/>
            <label>GPA:</label> {$applicant->getGPA()} <br/>
            <label>Year:</label> {$applicant->getYear()} <br/>
            <label>Gender:</label> {$applicant->getGender()} <br/><br/>
          <form action="main.html">
            <input type="submit" value="Return to main menu"/>
          </form>
        </body>
    </html>
EOBODY;

?>
