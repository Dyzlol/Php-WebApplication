<?php
    session_start();
    require_once("data.php");
    require_once("db_access.php");
    include 'dbfunctions.php';

    if(!empty($_SESSION["applicant"])){
        $applicant = unserialize($_SESSION["applicant"]);
        $pword = $_SESSION["pass"];
        $name = $applicant->getName();
        $gpa = $applicant->getGPA();
        $year = $applicant->getYear();
        $gender = $applicant ->getGender();
        $email = $applicant->getEmail();
        $_SESSION["old"] = $email;

        if($year == "10"){
            $checked_year="<input type=\"radio\" name=\"year\" value=\"10\" checked/><label>10&nbsp;</label><input type=\"radio\" name=\"year\" value=\"11\"/>
                          <label>11&nbsp;</label><input type=\"radio\" name=\"year\" value=\"12\"/><label>12&nbsp;</label><br/><br/>";
        } else if ($year == "11"){
            $checked_year="<input type=\"radio\" name=\"year\" value=\"10\"/><label>10&nbsp;</label><input type=\"radio\" name=\"year\" value=\"11\" checked/>
                          <label>11&nbsp;</label><input type=\"radio\" name=\"year\" value=\"12\"/><label>12&nbsp;</label><br/><br/>";
        } else {
            $checked_year="<input type=\"radio\" name=\"year\" value=\"10\"/><label>10&nbsp;</label><input type=\"radio\" name=\"year\" value=\"11\"/>
                          <label>11&nbsp;</label><input type=\"radio\" name=\"year\" value=\"12\" checked/><label>12&nbsp;</label><br/><br/>";
        }

        if($gender == "M"){
            $checked_gender="<input type=\"radio\" name=\"gender\" value=\"M\" checked/><label>M&nbsp;</label><input type=\"radio\" name=\"gender\" value=\"F\"/><label>F&nbsp;</label><br/><br/>";
        } else {
          $checked_gender="<input type=\"radio\" name=\"gender\" value=\"M\"/><label>M&nbsp;</label><input type=\"radio\" name=\"gender\" value=\"F\" checked/><label>F&nbsp;</label><br/><br/>";
        }
        unset($_SESSION["applicant"]);

        print<<<EOBODY
        <!doctype html>
        <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Update Information</title>
                <link rel="stylesheet" type="text/css" href="mainstyle.css">
            </head>
            <body>
              <form action="{$_SERVER["PHP_SELF"]}" method="post">
                <label>Name:</label><input type="text" name="name" value="$name" required/><br/><br/>
                <label>Email:</label><input type="email" name="email" value="$email"/><br/><br/>
                <label>GPA:</label><input type="text" name="gpa" value="$gpa" required/><br/><br/>
                <label>Year:</label>
                  $checked_year
                <label>Gender:</label>
                  $checked_gender
                <label>Password:</label><input type="password" name="password" value="$pword" required/><br/><br/>
                <label>Verify Password:</label><input type="password" name="valid_password" value="$pword" required/><br/><br/>
                <input type="submit" name="submit" value="Submit Data"/><br/><br/>
              </form>
              <form action="main.html">
                <input type="submit" value="Return to main menu"/><br/><br/>
              </form>
            </body>
EOBODY;

    } else if(!empty($_POST["submit"])){
        $password = crypt(trim($_POST["password"]),"3x47H1kQ1l");
        $valid = crypt(trim($_POST["valid_password"]),"3x47H1kQ1l");

        if($password === $valid){
          $applicant = new DB_Entry(trim($_POST["name"]), $password, $_POST["gpa"], $_POST["email"], $_POST["year"], $_POST["gender"]);
          $_SESSION["applicant"] = serialize($applicant);
          submitDB($applicant, " ", $_SESSION["old"]);
          header("Location: update_conf.php");
        } else
          header("Location: invalid.html");
    }

?>
