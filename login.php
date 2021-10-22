<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login-Bug Tracking system</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Link Bootstrap CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] == "POST") {

                include'connection.php';
                include'config.php';


                extract($_POST);
                $user_name = dataClean($user_name);
                if (empty($user_name)) {
                    $error['user_name'] = "User Name should not be blank...!";
                }
                $password = dataClean($password);
                if (empty($password)) {
                    $error['password'] = "password should not be blank...!";
                }
                


//                if($conn->connect_error){
//                    echo "Connection Faild";
//                }else{
//                    echo "Connection Success..!";
//                }


                $sql = "SELECT * FROM users WHERE UserName='$user_name' AND Password='" . sha1($password) . "'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $_SESSION['UserId'] = $row['UserID'];
                        $_SESSION['FirstName'] = $row['FirstName'];
                        $_SESSION['LastName'] = $row['LastName'];
                        $_SESSION['login_status'] = true;
                    }

                    //redirect to dashboard
                    header("Location:dashboard.php");
                } else {
                    echo "";
                }
            }
            ?>

            <div class="row justify-content-md-center" style="margin-top: 10%">

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header" style="background-color: darkblue">
                            <img src="" width="50" height="50">
                            <font color="white">Bug Tracking System - Login</font>
                        </div>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="user_name" class="form-label">User Name</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name">
                                    <span class="text-danger"><?php echo @$error['user_name']; ?></span>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                    <span class="text-danger"><?php echo @$error['password']; ?></span>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        <!-- Link Bootstrap JS -->
        <script src="js/bootstrap.bundle.min.js" type="text/javascript"></script>
    </body>
</html>



