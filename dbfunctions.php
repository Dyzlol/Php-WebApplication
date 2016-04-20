<?php
  function submitDB($applicant, $switch, $oldEmail){
    include 'dblogin.php';
    $namet = $applicant->getName();
    $emailt = $applicant->getEmail();
    $gpat = $applicant->getGpa();
    $yeart = $applicant->getYear();
    $gendert = $applicant->getGender();
    $passwordt = $applicant->getPassword();

    if($switch === "submitDB")
      return mysqli_query($db, "insert into $table (name,email,gpa,year,gender,password) values ('$namet','$emailt','$gpat','$yeart','$gendert','$passwordt')");
    else
      return mysqli_query($db, "update $table set name='$namet',email='$emailt',gpa='$gpat',year='$yeart',gender='$gendert',password='$passwordt' where email='$oldEmail'");
  }


  function readDB($email, $user_password, $db_entry){
      include 'dblogin.php';
      $result = mysqli_query($db, "select * from $table where email='$email';");

      if($result){
          $numrows = mysqli_num_rows($result);
          if($numrows == 0){
              return "FALSE";
          } else {
            while($recordArray = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              $db_entry->setName($recordArray["name"]);
              $db_entry->setPassword($recordArray["password"]);
              if($db_entry->getPassword() == crypt($user_password, "3x47H1kQ1l")){
                $db_entry->setGPA($recordArray["gpa"]);
                $db_entry->setYear($recordArray["year"]);
                $db_entry->setGender($recordArray["gender"]);
                $db_entry->setEmail($recordArray["email"]);
                return "TRUE";
              }
            }
            return "FALSE";
          }
      }
    }

 ?>
