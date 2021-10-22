<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Institute</h2>
    <a href="<?php echo site_url; ?>Institutes/add_institute.php" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New Institute</a>


</div>
<?php
$sql = "SELECT * FROM institutions";
$result = $conn->query($sql);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Institution Name</th>
            <th>Institution Code</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Title</th>
            <th>Director</th>
            <th>Subject</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
       <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>

                    <td><?php echo $row['Ins_Name']; ?></td>
                    <td><?php echo $row['Ins_Code']; ?></td>
                    <td><?php echo $row['Ins_Email']; ?></td>
                    <td><?php echo $row['Ins_Tel']; ?></td>
                    <td><?php echo $row['Title']; ?></td>
                    <td><?php echo $row['Director']; ?></td>
                    <td><?php echo $row['SubjectName'] ?></td>
                    <td><form method="POST" action="<?php echo site_url; ?>Institutes/edit.php" 
                              <input type="hidden" name="operate" value="edit">
                            <input type="hidden" name="Ins_Id" value="<?php echo $row['Ins_Id']; ?>">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form id="delete_form<?php echo $row['Ins_Id']; ?>" method="POST" action="<?php echo site_url; ?>Institutes/delete.php">
                            <input type="hidden" name="operate" value="update">
                            <input type="hidden" name="Ins_Id" value="<?php echo $row['Ins_Id']; ?>">
                            <button type="button" class="btn btn-danger" onclick="deleteInstitute('delete_form<?php echo $row['Ins_IdId']; ?>')">Delete</button>
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
    function deleteInstitute(form_id) {
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