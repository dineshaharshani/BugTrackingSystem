<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $error = array();

    if (empty($Ins_Name)) {
        $error['Ins_Name'] = "Title should not be blank...!";
    }
    $Ins_Code = dataClean($Ins_Code);
    if (empty($Ins_Code)) {
        $error['Ins_Code'] = "Institute Code should not be blank...!";
    }

    $Ins_Email = dataClean($Ins_Email);
    if (empty($Ins_Email)) {
        $error['Ins_Email'] = "Institute email should not be blank...!";
    }
    //format validation
    if (!empty($Ins_Email)) {//secondary validation--(2) check the email format is ok or not
        if (!filter_var($Ins_Email, FILTER_VALIDATE_EMAIL)) {
            $error['Ins_Email'] = "Invalid email format";
        }
    }

//    if (!empty($UserEmail)) {
//        $sql = "SELECT * FROM users WHERE UserEmail='$UserEmail'";
//        $result = $conn->query($sql);
//        if ($result->num_rows > 0) {
//            $error['UserEmail'] = "The User email already taken";
//        }
//    }
    $Ins_Tel = dataClean($Ins_Tel);
    if (empty($Ins_Tel)) {
        $error['Ins_Tel'] = "Telephone no should not be blank...!";
    }

    if (!empty($Ins_Tel)) {
        if (strlen($Ins_Tel) != 10) {
            $error['Ins_Tel'] = "Enter 10 digits...!";
        }
    }

    if (empty($error)) {

        $sql = "INSERT INTO institutions(Ins_Name,Ins_Code,Ins_Email,Ins_Tel,Title,Director,Ins_Subject) VALUES('$Ins_Name','$Ins_Code','$Ins_Email','$Ins_Tel','$Title','$Director','$Ins_Subject')";
        $conn->query($sql);
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Institute>>Add</h2>
    <a href="" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New Institute</a>


</div>
<div class="card mt-2">
    <div class="card-header">
        New Institute
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="card-body">
            <div class="mb-3">
                <label for="Ins_Name" class="form-label">Institute Name</label>
                <input type="text" class="form-control" id="FullName" name="Ins_Name" value="<?php echo @$Ins_Name; ?>">
                <span class="text-danger"><?php echo @$error['Ins_Name']; ?></span>
            </div>
            <div class="mb-3">
                <label for="Ins_Code" class="form-label">Institute Code</label>
                <input type="text" class="form-control" id="Ins_Code" name="Ins_Code" value="<?php echo @$Ins_Code; ?>">
                <span class="text-danger"><?php echo @$error['Ins_Code']; ?></span>
            </div>
            <div class="mb-3">
                <label for="Ins_Email" class="form-label">Institute Email</label>
                <input type="text" class="form-control" id="Ins_Email" name="Ins_Email" value="<?php echo @$Ins_Email; ?>">
                <span class="text-danger"><?php echo @$error['Ins_Email']; ?></span>
            </div>
            <div class="mb-3">
                <label for="Ins_Tel" class="form-label"> Telephone</label>
                <input type="text" class="form-control" id="Ins_Tel" name="Ins_Tel" value="<?php echo @$Ins_Tel; ?>">
            </div>
            <div class="mb-3">
                <label for="Title" class="form-label">User Title</label>
                <select class="form-select"  name="Title" id="UserTitle">
                    <option value="">--Select Title--</option>
                    <option value="Mr." <?php if (@$Title == 'Mr.') { ?>selected<?php } ?>>Mr.</option>
                    <option value="Mrs." <?php if (@$Title == 'Mrs.') { ?>selected<?php } ?>>Mrs.</option>
                    <option value="Miss." <?php if (@$Title == 'Miss.') { ?>selected<?php } ?>>Miss.</option>
                </select>
                <span class="text-danger"><?php echo @$error['Title']; ?></span>
                <label for="Director" class="form-label">Director</label>
                <input type="text" class="form-control" id="Director" name="Director" value="<?php echo @$Director; ?>">
            </div>
            <div class="mb-3">
                <label for="Subjects" class="form-label">Subjects</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Expenditure
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Revenue
                    </label>
                </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Purchasing
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                        Assets
                    </label>
                </div>
                 <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                       Budget
                    </label>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
    </form>

</div>

<?php include '../footer.php'; ?>