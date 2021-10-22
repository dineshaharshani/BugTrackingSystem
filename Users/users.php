<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage User</h2>
    <a href="<?php echo site_url; ?>Users/add_user.php" class="btn btn-success"><span data-feather="plus-circle"></span>
        Add New User</a>


</div>
<?php
$sql = "SELECT * FROM users u LEFT JOIN district d ON d.DistrictId=u.UserDistrict";
$result = $conn->query($sql);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Full Name</th>
            <th>Address</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Mobile</th>
            <th>District</th>
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

                    <td><?php echo $row['FullName'] ?></td>
                    <td><?php echo $row['UserAddress'] ?></td>
                    <td><?php echo $row['UserEmail'] ?></td>
                    <td><?php echo $row['UserTel'] ?></td>
                    <td><?php echo $row['UserMobile'] ?></td>
                    <td><?php echo $row['DistrictName'] ?></td>
                    <td><form method="POST" action="<?php echo site_url; ?>Users/edit.php" 
                              <input type="hidden" name="operate" value="edit">
                            <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>">
                            <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form id="delete_form<?php echo $row['UserId']; ?>" method="POST" action="<?php echo site_url; ?>Users/delete.php">
                            <input type="hidden" name="operate" value="update">
                            <input type="hidden" name="UserId" value="<?php echo $row['UserId']; ?>">
                            <button type="button" class="btn btn-danger" onclick="deleteUser('delete_form<?php echo $row['UserId']; ?>')">Delete</button>
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
    function deleteUser(form_id) {
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