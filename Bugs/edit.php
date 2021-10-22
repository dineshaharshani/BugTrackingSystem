<?php
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header('Location:bugs.php');
}
?>
<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Bug>>Update</h2>

</div>
<?php
extract($_POST);
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$operate == "update") {
    $error = array();

    if (empty($BugDescription)) {
        $error['BugDescription'] = "Bug Description should not be blank...!";
    }
    $Project = dataClean($Project);
    if (empty($Project)) {
        $error['Project'] = "Project should not be blank...!";
    }
    $BugPiority = dataClean($BugPiority);
    if (empty($BugPiority )) {
        $error['BugPiority'] = "Bug Piority  should not be blank...!";
    }
    $BugStatus = dataClean($BugStatus);
    if (empty($BugStatus)) {
        $error['BugStatus'] = "Bug Status should not be blank...!";
    }
    $BugSummary = dataClean($BugSummary);
    if (empty($BugSummary)) {
        $error['BugSummary'] = "Bug Summary should not be blank...!";
    }
    if (empty($error)) {
        $sql = "UPDATE bugs SET BugDescription='$BugDescription', Project='$Project', BugPiority='$BugPiority',BugStatus='$BugStatus', BugSummary='$BugSummary' WHERE BugId='$BugId'";
        $conn->query($sql);
    }
}
if ($_SERVER['REQUEST_METHOD'] == "POST" && @$operate == "edit") {
    $sql = "SELECT * FROM bugs WHERE BugId='$BugId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {


        $row = $result->fetch_assoc();
        $BugId = $row['BugId'];
        $BugDescription = $row['BugDescription'];
        $Project = $row['Project'];
        $BugPiority = $row['BugPiority'];
        $BugStatus = $row['BugStatus'];
        $BugSummary = $row['BugSummary'];
    }
}
?>

<div class="card md-6">
    <div class="card-header">
        Update Bug
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="card-body">
            <div class="row">
            <div class="col-6 col-md-4">
                <label for="BugRefId" class="form-label">Bug Ref_Id</label>
                <input type="text" class="form-control" id="BugRefId" name="BugRefId" value="<?php echo @$BugRefId; ?>">
                <span class="text-danger"><?php echo @$error['BugRefId']; ?></span>
            </div>
            <div class="col-6 col-md-4">
                <label for="Assignee" class="form-label">Assignee</label>
                <input type="text" class="form-control" id="Assignee" name="Asignee" value="<?php echo @$Assignee; ?>">
                <span class="text-danger"><?php echo @$error['Assignee']; ?></span>
            </div>
           
            <div class="col-6 col-md-4">
                <label for="OpenDate" class="form-label">Open Date</label>
                <input type="text" class="form-control" id="OpenDate" name="Asignee" value="<?php echo @$OpenDate; ?>">
                <span class="text-danger"><?php echo @$error['OpenDate']; ?></span>
            </div>
            </div>
            <div class="col-6 col-md-4">
                <label for="BugDescription" class="form-label">Bug Description</label>
                <input type="text" class="form-control" id="BugDescription" name="BugDescription" value="<?php echo @$BugDescription; ?>">
                <span class="text-danger"><?php echo @$error['BugDescription']; ?></span>
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM projects";
                $result = $conn->query($sql);
                ?>
                <label for="Project" class="form-label">Project</label>
                <select class="form-select"  name="Project" id="Project" value="<?php echo @$Project; ?>">
                    <option >--Select Project--</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['ProjectId']; ?>"><?php echo $row['ProjectName']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM piority";
                $result = $conn->query($sql);
                ?>
                <label for="BugPiority" class="form-label">Piority</label>
                <select class="form-select"  name="BugPiority" id="BugPiority" value="<?php echo @$BugPiority; ?>">
                    <option >--Select Piority--</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['PiorityId']; ?>"><?php echo $row['PiorityName']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <?php
                $sql = "SELECT * FROM status";
                $result = $conn->query($sql);
                ?>
                <label for="BugStatus" class="form-label">Status</label>
                <select class="form-select"  name="BugStatus" id="BugPiority" value="<?php echo @$BugStatus; ?>">
                    <option >--Select Status--</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <option value="<?php echo $row['StatusId']; ?>"><?php echo $row['StatusName']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="BugSummary" class="form-label">Bug Summary</label>
                <input type="text" class="form-control" id="BugSummary" name="BugSummary" value="<?php echo @$BugSummary; ?>">
                <span class="text-danger"><?php echo @$error['BugSummary']; ?></span>
            </div>
        </div>
        <div class="card-footer">
            <input type="hidden" name="BugId" value="<?php echo $BugId; ?>">
            <input type="hidden" name="operate" value="update">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<?php include '../footer.php'; ?>