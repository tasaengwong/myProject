<?php

session_start();

require_once "connection.php";

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $userlevel = $_POST['userlevel'];
   
    
   

    $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result = mysqli_query($con, $user_check);
    $user = mysqli_fetch_assoc($result);

    if ($user['username'] === $username) {
        echo "<script>alert('Username already exists');</script>";
    } else {
        $passwordenc = md5($password);

        $query = "INSERT INTO user (username, password, firstname, lastname,  userlevel)
                        VALUE ('$username', '$passwordenc', '$firstname', '$lastname', '$userlevel')";
        $result = mysqli_query($con, $query);

        if ($result) {
            $_SESSION['success'] = "Insert user successfully";
            header("Location: singin.php");
        } else {
            $_SESSION['error'] = "Something went wrong";
            header("Location: singin.php");
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
 <div class="contrainer">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="row g-3 form-register ">
        <div class="row mb-3 g-3 align-items-center"> 
            <div class="col-auto">
                <label for="usernaem" class="form-label">Username</label>
             
            </div>
            <div class="col-auto">
                <input type="text" name="username" class="form-control " id="username" placeholder="????????????????????????????????????" required>
            
            </div>
            <div class="col-auto">
                <label for="password" class="form-label">Password</label>
            </div>
            <div class="col-auto">
                <input type="password" name="password" class="form-control  " id="password" placeholder="Enter your password" required>
            </div>
        </div>
        

        <div class="row mb-3 g-3 align-items-center">
            <div class="col-auto">
                <label for="name" class="form-label">????????????</label>
            </div>
            <div class="col-auto">
                <input type="text" name="fistname" class="form-control " id="name" placeholder="????????????" required>
            </div>
            <div class="col-auto">
                <label for="lastname" class="form-label">?????????????????????</label>
            </div>
            <div class="col-auto">
                <input type="text" name="lastname" class="form-control  " id="lastname" placeholder="?????????????????????" required>
            </div>
            <div class="col-auto">
                <label for="lastname" class="form-label">?????????????????????????????????</label>
            </div>
            <div class="col-auto">
                <input type="text" name="userlevel" class="form-control  " id="lastname" placeholder="?????????????????????????????????" required>
            </div>
        </div>

      

        <div class="col-12">
        <input type="submit" name="submit" class="btn btn-primary mb-3" value="Submit">
        </div>
     </form>
    </div>
    <a href="index.php">Go back to index</a>

</body>

</html>