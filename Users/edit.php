<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header('Location:users.php');
}
?>
<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage User>>Update</h2>
</div>
<?php
extract($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$operate == "update") {
    $error = array();

    if (empty($UserTitle)) {
        $error['UserTitle'] = "Title should not be blank...!";
    }

    $FullName = dataClean($FullName);
    if (empty($FullName)) {
        $error['FullName'] = "Full Name should not be blank...!";
    }
    $UserAddress = dataClean($UserAddress);
    if (empty($UserAddress)) {
        $error['UserAddress'] = "Address should not be blank...!";
    }

    $UserMobile = dataClean($UserMobile);
    if (empty($UserMobile)) {
        $error['UserMobile'] = "Mobile no should not be blank...!";
    }

    if (!empty($UserMobile)) {
        if (strlen($UserMobile) != 10) {
            $error['UserMobile'] = "Mobile no should not be blank...!";
        }
    }

    $UserEmail = dataClean($UserEmail);
    if (empty($UserEmail)) {
        $error['UserEmail'] = "User email should not be blank...!";
    }
    //format validation
    if (!empty($UserEmail)) {//secondary validation--(2) check the email format is ok or not
        if (!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
            $error['UserEmail'] = "Invalid email format";
        }
    }


//    if (!empty($UserEmail)) {
//        $sql = "SELECT * FROM users WHERE UserEmail='$UserEmail'";
//        $result = $conn->query($sql);
//        if ($result->num_rows > 0) {
//            $error['UserEmail']="The User email already taken";
//        }
//    }
    if (empty($error)) {
        $sql = "UPDATE users SET UserTitle='$UserTitle',FullName='$FullName',UserAddress='$UserAddress',UserEmail='$UserEmail',UserTel='$UserTel',UserMobile='$UserMobile',UserDistrict='UserDistrict' WHERE UserId='$UserId'";
        $conn->query($sql);
    }
}

$sql = "SELECT * FROM users WHERE UserId='$UserId'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $UserId = $row['UserId'];
    $UserTitle = $row['UserTitle'];
    $FullName = $row['FullName'];
    $UserAddress = $row['UserAddress'];
    $UserEmail = $row['UserEmail'];
    $UserTel = $row['UserTel'];
    $UserMobile = $row['UserMobile'];
    $UserDistrict = $row['UserDistrict'];
}
?>

<div class="card mt-2">
    <div class="card-header">
        New User
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="card-body">
            <div class="mb-3">
                <label for="UserTitle" class="form-label">User Title</label>
                <select class="form-select"  name="UserTitle" id="UserTitle" value="<?php echo @$UserTitle; ?>">
                    <option value="">--Select Title--</option>
                    <option value="Mr." <?php if (@$UserTitle == 'Mr.') { ?>selected<?php } ?>>Mr.</option>
                    <option value="Mrs." <?php if (@$UserTitle == 'Mrs.') { ?>selected<?php } ?>>Mrs.</option>
                    <option value="Miss." <?php if (@$UserTitle == 'Miss.') { ?>selected<?php } ?>>Miss.</option>

                </select>
                <span class="text-danger"><?php echo @$error['UserTitle']; ?></span>


            </div>
            <div class="mb-3">
                <label for="FullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="FullName" name="FullName" value="<?php echo @$FullName; ?>">
                <span class="text-danger"><?php echo @$error['FullName']; ?></span>
            </div>
            <div class="mb-3">
                <label for="UserAddress" class="form-label">User Address</label>
                <input type="text" class="form-control" id="UserAddress" name="UserAddress" value="<?php echo @$UserAddress; ?>">
                <span class="text-danger"><?php echo @$error['UserAddress']; ?></span>
            </div>
            <div class="mb-3">
                <label for="UserEmail" class="form-label">User Email</label>
                <input type="text" class="form-control" id="UserEmail" name="UserEmail" value="<?php echo @$UserEmail; ?>">
                <span class="text-danger"><?php echo @$error['UserEmail']; ?></span>
            </div>
            <div class="mb-3">
                <label for="UserTel" class="form-label">User Tel.</label>
                <input type="text" class="form-control" id="UserTel" name="UserTel" value="<?php echo @$UserTel; ?>">
            </div>
            <div class="mb-3">
                <label for="UserMobile" class="form-label">User Mobile</label>
                <input type="text" class="form-control" id="UserMobile" name="UserMobile" value="<?php echo @$UserMobile; ?>">
                <span class="text-danger"><?php echo @$error['UserMobile']; ?></span>
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM district";
                $result = $conn->query($sql);
                ?>
                <label for="UserDistrict" class="form-label">District</label>
                <select class="form-select"  name="UserDistrict" id="UserDistrict" value="<?php echo @$DistrictName; ?>">
                    <option >--Select District--</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
        <!--                            <option value="<?php echo $row['DistrictId']; ?>"><?php echo $row['DistrictName']; ?></option>-->
                            <option value="<?php echo $row['DistrictId'] ?>"<?php if ($row['DistrictId'] == $UserDistrict) { ?>selected<?php } ?>>
                                <?php echo $row['DistrictName'] ?></option>
                                <?php
                        }
                    }
                    ?>
                </select>

            </div>


        </div>
        <div class="card-footer">
            <input type="hidden" name="UserId" value="<?php echo $UserId; ?>">
            <input type="hidden" name="operate" value="update">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>

</div>

<?php include '../footer.php'; ?>