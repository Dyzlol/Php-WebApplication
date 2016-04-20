<?php
    session_start();
    require_once("data.php");
    require_once("db_access.php");
    include 'dbfunctions.php';

    $error_message="";

    if(!empty($_POST["submit"])){
        $applicant = new DB_Entry("temp","temp","temp","temp","temp","temp");
        $result = readDB(trim($_POST["email"]), trim($_POST["password"]), $applicant);
        if($result == "TRUE"){
            $_SESSION["pass"] = trim($_POST["password"]);
            $_SESSION["applicant"] = serialize($applicant);
            header("Location: update_submit.php");
        } else
            $error_message="<strong>No entry exists in the database for the specified email and password</strong>";
    }

    print<<<EOBODY
    <!doctype html>
    <html>
      <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Update Application Login</title>
        <link rel="stylesheet" type="text/css" href="mainstyle.css">
      </head>
      <body>
        <form action="{$_SERVER["PHP_SELF"]}" method="post">
          <label>Email:</label><input type="email" name="email"/><br/><br/>
          <label>Password:</label><input type="password" name="password" required/><br/><br/>
          <input type="submit" name="submit" value="Submit"/><br/><br/>
        </form>
        <form action="main.html">
          <input type="submit" value ="Return to main menu"/><br/><br/>
        </form>
        $error_message
      </body>
    </html>
EOBODY;
?>
