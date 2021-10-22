<?php include '../header.php'; ?>
<?php include '../connection.php'; ?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h2 class="h2">Manage Release Notes</h2>
    
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    extract($_POST);
    $error = array();

    if (empty($error)) {
        $target_dir = "../Uploads/";
        $target_file = $target_dir . rand() . "." . pathinfo($_FILES["DocImage"]["name"], PATHINFO_EXTENSION);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($_FILES["DocImage"]["name"], PATHINFO_EXTENSION));
        if ($check !== false) {

            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if ($_FILES["DocImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        if ($imageFileType != "jpg" && $imageFileType != "pdf" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        if ($uploadOk == 1) {
            
        }
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["DocImage"]["tmp_name"], $target_file)) {
                echo $DocImage = htmlspecialchars($target_file);
                $sql = "INSERT INTO release_notes(DocName,DocDate,DocImage) VALUES('$DocName','$DocDate','$DocImage')";
                $conn->query($sql);
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
<table>
    <div class="row">
        <div class="card" style="width: 18rem;" align="left">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <section class="content">
                    <div class="container">
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="DocName">Document Name</label>
                                <input type="text" class="form-control" id="DocName" name="DocName" placeholder="Enter Document Name" >
                            </div>
                            <div class="form-group">
                                <label for="DocDate">Document Date</label>
                                <input type="date" class="form-control" id="DocDate" name="DocDate" placeholder="Enter Document Date" >
                            </div>
                            <div   class="form-group">
                                <label>Upload Document</label>
                                <input class="form-control" type="file" name="DocImage" id="DocImage">
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                        </form>
                    </div>
                </section>
            </div>
        </div>
        <br>
    </div>
</table>
<?php include '../footer.php'; ?>



