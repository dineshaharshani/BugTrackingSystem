<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Project</h2>
    <a href="<?php echo site_url; ?>Projects/add_Project.php" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New Project</a>


</div>
<?php
$sql = "SELECT * FROM bugs b LEFT JOIN projects p ON p.ProjectId=b.Project";
$result = $conn->query($sql);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Project Name</th>
            <th>Project Manager</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td><?php echo $row['ProjectName']; ?></td>
                    <td><?php echo $row['ProjectManager']; ?></td>
                    <td><?php echo $row['StartDate']; ?></td>
                    <td><?php echo $row['EndDate']; ?></td>
                    <td><form method="POST" action="<?php echo site_url; ?>Projects/edit.php" 
                              <input type="hidden" name="operate" value="Update">
                            <input type="hidden" name="ProjectId" value="<?php echo $row['ProjectId']; ?>">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form id="delete_form<?php echo $row['ProjectId']; ?>" method="POST" action="<?php echo site_url; ?>Projects/delete.php">
                            <input type="hidden" name="operate" value="update">
                            <input type="hidden" name="ProjectId" value="<?php echo $row['ProjectId']; ?>">
                            <button type="button" class="btn btn-danger" onclick="deleteProject('delete_form<?php echo $row['ProjectId']; ?>')">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>
<?php include '../footer.php'; ?>
<script>
    function deleteProject(form_id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        document.getElementById(form_id).submit();
                    }
                });

    }
</script>