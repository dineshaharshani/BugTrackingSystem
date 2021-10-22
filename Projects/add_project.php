<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $error = array();
    if (empty($ProjectName)) {
        $error['ProjectName'] = "Project Name should not be blank...!";
    }
    $ProjectManager = dataClean($ProjectManager);
    if (empty($ProjectManager)) {
        $error['ProjectManager'] = "Project Manager should not be blank...!";
    }
    $StartDate = dataClean($StartDate);
    if (empty($StartDate)) {
        $error['StartDate'] = "Start Date should not be blank...!";
    }
    $EndDate = dataClean($EndDate);
    if (empty($EndDate)) {
        $error['EndDate'] = "End Date should not be blank...!";
    }
    if (empty($error)) {
        $sql = "INSERT INTO projects(ProjectName,ProjectManager,StartDate,EndDate) VALUES('$ProjectName','$ProjectManager','$StartDate','$EndDate')";
        $conn->query($sql);
    }
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Project>>Add</h2>
    <a href="" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New Project</a>
</div>
<div class="card mt-2">
    <div class="card-header">
        New Project
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="card-body">
            <div class="mb-3">
                <label for="ProjectName" class="form-label">Project Name</label>
                <input type="text" class="form-control" id="ProjectName" name="ProjectName" value="<?php echo @$ProjectName; ?>">
                <span class="text-danger"><?php echo @$error['ProjectName']; ?></span>
            </div>
            <div class="mb-3">
                <label for="ProjectManager" class="form-label">Project Manager</label>
                <input type="text" class="form-control" id="ProjectManager" name="ProjectManager" value="<?php echo @$ProjectManager; ?>">
                <span class="text-danger"><?php echo @$error['ProjectManager']; ?></span>
            </div>
            <div class="mb-3">
                <label for="StartDate" class="form-label">Start Date</label>
                <input type="date" class="form-control" id="StartDate" name="StartDate" value="<?php echo @$StartDate; ?>">
                <span class="text-danger"><?php echo @$error['StartDate']; ?></span>
            </div>
            <div class="mb-3">
                <label for="EndDate" class="form-label">End Date</label>
                <input type="date" class="form-control" id="EndDate" name="EndDate" value="<?php echo @$EndDate; ?>">
                <span class="text-danger"><?php echo @$error['EndDate']; ?></span>
            </div>
           
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<?php include '../footer.php'; ?>
