<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $ProductAmount = $ProductQty * $ProductPrice;
    $DiscountAmount = $ProductAmount * ($ProductDiscount / 100);
    $NetAmount = $ProductAmount - $DiscountAmount;

    $sql = "INSERT INTO orders(ProductName,ProductPrice,ProductQty,ProductDiscount,ProductAmount,DiscountAmount,NetAmount) VALUES('$ProductName','$ProductPrice','$ProductQty','$ProductDiscount','$ProductAmount','$DiscountAmount','$NetAmount')";
    $conn->query($sql);
}
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Bug Calulator</h2>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card mt-2">
            <div class="card-header">
                Bug Calc
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                <div class="card-body">
                    <div class="mb-4">
                        <label for="Assignee" class="form-label">Assignee</label>
<!--                        <input type="text" class="form-control" id="Assignee" name="Assignee" value="<?php echo @$Assignee; ?>">
                        <span class="text-danger"><?php echo @$error['Assignee']; ?></span>-->
                        <form class="form-inline mr-auto">
                            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success btn-rounded btn-sm my-0 ml-sm-2" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="mb-3">
                        <label for="Institution" class="form-label">Institution</label>
                        <input type="text" class="form-control" id="Institution" name="Institution" value="<?php echo @$Institution; ?>">
                        <span class="text-danger"><?php echo @$error['Institution']; ?></span>
                    </div>
                    <!--                    <div class="mb-3">
                                            <label for="Status" class="form-label">Status</label>
                                            <input type="text" class="form-control" id="Status" name="Status" value="<?php echo @$Status; ?>">
                                            <span class="text-danger"><?php echo @$error['Status']; ?></span>
                                        </div>-->
                    <div class="mb-3">
                        <label for="Status" class="form-label">Status</label>
<!--                        <input type="text" class="form-control" id="Status" name="Status" value="<?php echo @$Status; ?>">-->
                        <select class="form-select"  name="BugStatus" id="BugStatus">
                            <option value="">--Select Status--</option>
                            <option value="Open" <?php if (@$Status == 'Open') { ?>selected<?php } ?>>Open</option>
                            <option value="Inprogress" <?php if (@$Status == 'Inprogress') { ?>selected<?php } ?>>In-progress</option>
                            <option value="Resolved" <?php if (@$Status == 'Resolved') { ?>selected<?php } ?>>Resolved</option>
                            <option value="Closed" <?php if (@$Status == 'Closed') { ?>selected<?php } ?>>Closed</option>
                        </select>
                        <span class="text-danger"><?php echo @$error['UserTitle']; ?></span>

                    </div>
                    <div class="mb-3">
                        <label for="FromDate" class="form-label">From Date</label>
                        <input type="date" class="form-control" id="FromDate" name="FromDate" value="<?php echo @$FromDate; ?>">
                        <span class="text-danger"><?php echo @$error['FromDate']; ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="ToDate" class="form-label">To Date</label>
                        <input type="date" class="form-control" id="ToDate" name="ToDate" value="<?php echo @$ToDate; ?>">
                        <span class="text-danger"><?php echo @$error['ToDate']; ?></span>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <?php
        $sql = "SELECT * FROM calculator";
        $result = $conn->query($sql);
        ?>
        <table>
            <thead>
            <div>
                <th>Assignee</th>
                <th>Institution</th>
                <th>Institution</th>
                <th>From Date</th>
                <th>To Date</th>
                </thead>
                <tbody>

                    <?php
                    $GrandProductAmount = 0;
                    $GrandDiscountAmount = 0;
                    $GrandNetAmount = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?php echo $row['Assignee']; ?></td>
                                <td><?php echo $row['Institution']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                                <td><?php echo $row['FromDate']; ?></td>
                                <td><?php echo $row['ToDate']; ?></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>

                    <tr>
                        <td colspan="6" style="text-align: right">Grand  Product  Amount</td>
                        <td><?php echo number_format($GrandProductAmount, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: right">Grand  Discount  Amount</td>
                        <td><?php echo number_format($GrandDiscountAmount, 2); ?></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align: right">Grand  Net  Amount</td>
                        <td><?php echo number_format($GrandNetAmount, 2); ?></td>
                    </tr>
                </tbody>
        </table>
    </div>
</div>
<?php include '../footer.php'; ?>
                            



