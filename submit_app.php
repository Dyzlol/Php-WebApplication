<?php
    session_start();
    require_once("data.php");
    require_once("db_access.php");
    include 'dbfunctions.php';

    if(!empty($_POST["submit"])){
      $password=crypt(trim($_POST["password"]),"3x47H1kQ1l");
      $valid=crypt(trim($_POST["valid_password"]),"3x47H1kQ1l");

      if($password === $valid) {
        $applicant = new DB_Entry(trim($_POST["name"]), $password, trim($_POST["gpa"]),
                    trim($_POST["email"]), trim($_POST["year"]), trim($_POST["gender"]));
        $_SESSION["applicant"] = serialize($applicant);
        submitDB($applicant, "submitDB", "");
        header("Location: confirmation.php");
      } else
        header("Location: invalid.html");
    }

    print<<<EOBODY
    <!doctype html>
    <html>
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <title>Submit&nbsp;Application</title>
            <link rel="stylesheet" type="text/css" href="mainstyle.css">
        </head>
        <body>
            <form action="{$_SERVER["PHP_SELF"]}" method="post">
              <label>Name:</label><input type="text" name="name" required/><br/><br/>
              <label>Email:</label><input type="email" name="email"/><br/><br/>
              <label>GPA:</label><input type="text" name="gpa" required/><br/><br/>
              <label>Year:</label><input type="radio" name="year" value="10"/>10&nbsp;<input type="radio" name="year" value="11"/>11&nbsp;<input type="radio" name="year" value="12"/>12&nbsp;<br/><br/>
              <label>Gender:</label><input type="radio" name="gender" value="M"/>M&nbsp;<input type="radio" name="gender" value="F"/>F<br/><br/>
              <label>Password:</label><input type="password" name="password" required/><br/><br/>
              <label>Verify Password:</label><input type="password" name="valid_password" required/><br/><br/>
              <input type="submit" name="submit" value="Submit Data"/><br/><br/>
            </form>
            <form action="main.html">
                <input type="submit" value="Return to main menu"/><br/>
            </form>
        </body>
    </html>
EOBODY;
?>
