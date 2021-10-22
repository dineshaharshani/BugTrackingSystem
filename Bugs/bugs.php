<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Bugs</h2>
    <a href="<?php echo site_url; ?>Bugs/add_bug.php" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New Bug</a>

</div>

<?php
$sql = "Select * From bugs Left Join piority On piority.PiorityId = bugs.BugPiority Left Join projects On projects.ProjectId = bugs.Project Left Join status On status.StatusId = bugs.BugStatus";
 
$result = $conn->query($sql);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Bug Ref_Id</th>
            <th>Bug Description</th>
            <th>Project</th>
            <th>Priority</th>
            <th>Bug Status</th>
            <th>Bug Summary</th>
            <th>Attachments</th>
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
                    <td><?php echo $row['BugRefId']; ?></td>
                    <td><?php echo $row['BugDescription']; ?></td>
                    <td><?php echo $row['ProjectName']; ?></td>
                    <td><?php echo $row['PiorityName']; ?></td>
                    <td><?php echo $row['StatusName']; ?></td>
                    <td><?php echo $row['BugSummary']; ?></td>
                    <td><?php echo $row['Attachments']; ?></td>
                    <td>
                        <form method="post" action="<?php echo site_url; ?>Bugs/edit.php">
                       <input type="hidden" name="operate" value="edit">
                            <input type="hidden" name="BugId" value="<?php echo $row['BugId']; ?>">
                            <button type="submit" class="btn btn-secondary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form id="delete_form<?php echo $row['BugId']; ?>" method="POST" action="<?php echo site_url; ?>Bugs/delete.php">
                            <input type="hidden" name="operate" value="update">
                            <input type="hidden" name="BugId" value="<?php echo $row['BugId']; ?>">
                            <button type="button" class="btn btn-danger" onclick="deleteBug('delete_form<?php echo $row['BugId']; ?>')">Delete</button>
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
    function deleteBug(form_id) {
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



