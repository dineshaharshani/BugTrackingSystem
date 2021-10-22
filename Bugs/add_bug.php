<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $error = array();
    if (empty($BugDescription)) {
        $error['BugDescription'] = "Bug Description should not be blank...!";
    }
    $Project = dataClean($Project);
    if (empty($Project)) {
        $error['Project'] = "Project should not be blank...!";
    }
    $BugPiority = dataClean($BugPiority);
    if (empty($BugPiority)) {
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
        $sql = "INSERT INTO bugs(BugDescription,Project,BugPiority,BugStatus,BugSummary) VALUES('$BugDescription','$Project','$BugPiority','$BugStatus','$BugSummary')";
        $conn->query($sql);
    }
}
?>

<div class="card mt-2">
    <div class="card-header">
        New Bug
    </div>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

        <div class="card-body">
            <div class="mb-3">
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
                <label for="BugPiority" class="form-label">Bug Piority</label>
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
            <div   class="form-group">
                <label>Upload Document</label>
                <input class="form-control" type="file" name="DocImage" id="DocImage">
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
<?php include '../footer.php'; ?>