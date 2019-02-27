<?php
session_start();
$db = mysqli_connect("localhost", "root", "","instajob");
 if (isset($_POST['register_btn'])) {
    $firstName = mysqli_real_escape_string($db, $_POST['fName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lName']);
    $gender = mysqli_real_escape_string($db, $_POST['gender']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $password2 = mysqli_real_escape_string($db, $_POST['password2']);
    $usertype = mysqli_real_escape_string($db, $_POST['usertype']) ;
    if ($password == $password2) {
      //create user
      $random = rand(70000, 92729);
      $password = md5($password); //hash password before storing for security purposes
      $sql = "INSERT INTO USERS(Id, FName, LName, Gender, Email, Phone, Password, Repassword, user_type)
      VALUES('$random', '$firstName', '$lastName', '$gender', '$email', '$phone', '$password', '$password2', '$usertype')" ;
      mysqli_query($db, $sql);
      $_SESSION['message'] = "You are now logged in";
      $_SESSION['email'] = $email;
      $_SESSION['usertype'] = $usertype;
      header('location: index.php'); //redirect to home page
    } else {
      //failed
      $_SESSION['message'] = "The two passwords do not match";
      echo '<script language="javascript">';
      echo 'alert("Password is not matching")';
     echo '</script>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Register</title>
  <link href="css/signupCss.css" rel="stylesheet">
</head>
<body>
  <div class="box">
      <h2>Sign Up</h2>
      <form method ="post" action = "signup.php">
        <div class ="inputBox">
          <input type="text" name="fName" required="">
          <label>First Name</label>
          </div>
          <div class ="inputBox">
            <input type="text" name="lName" required="">
            <label>Last Name</label>
            </div>
            <div class ="inputBox">
              <input type="text" name="gender" required="">
              <label>Gender</label>
              </div>
            <div class ="inputBox">
              <input type="text" name="email" required="">
              <label>Email</label>
              </div>
              <div class ="inputBox">
                <input type="text" name="phone" required="">
                <label>Phone</label>
                </div>
                <div class ="inputBox">
                  <input type="password" name="password" required="">
                  <label>Password</label>
                  </div>
                <div class ="inputBox">
                  <input type="password" name="password2" required="">
                  <label>Confirm Password</label>
                </div>
                <div class ="inputBox">
                  <input type="text" name="usertype" required="">
                  <label>User Type</label>
                </div>
        <input type="submit" name="register_btn"  value="Register">
        <br><br>
        <a href="login.php">Already have an account</a>
        </form>
    </div>
</body>
</html>
