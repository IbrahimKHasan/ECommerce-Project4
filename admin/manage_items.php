<?php 
include("includes/config.php");
//CRUD MySQL
//1.Creat Item
$rand=rand(1000,2000);    //For Upload Images
if (isset($_POST['submit'])) {
    $item_name        = $_POST['item_name'];
    $item_title       = $_POST['item_title'];
    $item_cat         = $_POST['item_cat'];
    $item_desc        = $_POST['item_desc'];
    $item_price       = $_POST['item_price'];
    $item_price_offer = $_POST['item_price_offer'];
    $item_image       = "IMG-"."$rand".basename($_FILES["item_img"]["name"]); //For Upload Images
    $temp_name        = $_FILES["item_img"]["tmp_name"];                     //For Upload Images
    $target_dir       = "assets/item_images/$item_image";                            //For Upload Images
    $item_date        = date('Y-m-d');
    move_uploaded_file($temp_name,$target_dir);
    $insert           = "INSERT INTO item (item_name, item_title, cat_id, item_desc, item_price, price_offer, item_image, item_date) 
                         VALUES ('$item_name','$item_title','$item_cat','$item_desc','$item_price','$item_price_offer','$item_image',
                                '$item_date')";
    mysqli_query($conn, $insert);
    echo "<meta http-equiv='refresh' content='0'>";
}
//2.Read
$cat_query = "SELECT * FROM category";
$cat_query_result = mysqli_query($conn, $cat_query);
$query        = "SELECT item_id,item_name,item_title,item_desc,item.cat_id as item_cat_id,item_price,price_offer,
                        item_date,item_image, category.cat_name 
                FROM category,item 
                WHERE category.cat_id=item.cat_id";
$query_result = mysqli_query($conn, $query);
//3.Edit
 if (isset($_GET['method'])) {
    if ($_GET['method'] == 'edit') {
        //Select 
        $id                 = $_GET['id'];
        $select = "SELECT * FROM item WHERE item_id=$id";
        $select_result = mysqli_query($conn, $select);
        $row = mysqli_fetch_assoc($select_result);
        $item_nameE        = $row['item_name'];
        $item_titleE       = $row['item_title'];
        $item_catE         = $row['cat_id'];
        $item_descE        = $row['item_desc'];
        $item_priceE       = $row['item_price'];
        $item_price_offerE = $row['price_offer'];
         if (isset($_POST['edit'])) {
           $item_name        = $_POST['item_name'];
           $item_title       = $_POST['item_title'];
           $item_cat         = $_POST['item_cat'];
           $item_desc        = $_POST['item_desc'];
           $item_price       = $_POST['item_price'];
           $item_price_offer = $_POST['item_price_offer'];
           $item_image       = "IMG-"."$rand".basename($_FILES["item_img"]["name"]); //For Upload Images
           $temp_name        = $_FILES["item_img"]["tmp_name"];                     //For Upload Images
           $target_dir       = "assets/item_images/$item_image";                            //For Upload Images
           $item_date        = date('Y-m-d H:i:s');
           move_uploaded_file($temp_name,$target_dir);
           $edit           = "UPDATE item SET  item_name='$item_name', item_title='$item_title', cat_id='$item_cat', 
                                               item_desc='$item_desc', item_price='$item_price', price_offer='$item_price_offer', 
                                               item_image='$item_image' WHERE item_id=$id ";
                              
           mysqli_query($conn, $edit);
           echo "<meta http-equiv='refresh' content='0'>";
}}}
//4.Delete
if (isset($_GET['method'])) {
    if ($_GET['method'] == 'delete') {
        $id  = $_GET['id'];
        $del = "DELETE FROM item WHERE item_id=$id";
        mysqli_query($conn, $del);
        header("Location: manage_items.php");
    }}
//Header of the Page
include("includes/header.php");
?>
<!-- Main Content -->
<div class="app-main">
    <?php include("includes/sidebar.php");?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="col">
            <div class="row-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Items</h5>
                        <form class="needs-validation" novalidate method="post" enctype='multipart/form-data' >
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Item Name</label>
                                    <input value = "<?php echo @$item_nameE?>" name="item_name" type="text" class="form-control" id="validationCustom01" placeholder="Item Name" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom02">Item Title</label>
                                    <input value = "<?php echo @$item_titleE?>" name="item_title" type="text" class="form-control" id="validationCustom02" placeholder="Item Title" value="" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom03">Item Category</label>
                                    <select  class="form-control" name="item_cat" id="validationCustom03"  required>
                                    <option value="">Select Category</option>
                                        <?php while ($row = mysqli_fetch_assoc($cat_query_result)) {?>
                                            <option value="<?php echo $row['cat_id'];?>"><?php echo $row['cat_name'];} ?></option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom04">Item Description</label>
                                    <textarea name="item_desc" type="text" class="form-control" id="validationCustom03" placeholder="Item Description" required><?php echo @$item_descE?></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                            <div class="col-md-4 mb-3">
                                    <label for="validationCustom05">Price</label>
                                    <input value = "<?php echo @$item_priceE?>" name="item_price" type="number" class="form-control" id="validationCustom04" placeholder="Price" required>

                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom06">Price Offer</label>
                                    <input value = "<?php echo @$item_price_offerE?>" name="item_price_offer" type="number" class="form-control" id="validationCustom05" placeholder="Price Offer" required>
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom07">Image</label>
                                    <input name="item_img" type="file" class="form-control " id="validationCustom05" required>
                                </div>
                            </div>
                            <button  style="display:<?php echo (@$_GET["method"]=="edit")?'none':''; ?>"name="submit" class="btn btn-primary" type="submit">Add </button>
                            <button style="display:<?php echo (@$_GET["method"]=="edit")?'':'none'; ?>;" name="edit" class="btn btn-danger" type="submit">Edit </button>
                        </form>
                        <script>
                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                            (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                    var forms = document.getElementsByClassName('needs-validation');
                                    // Loop over them and prevent submission
                                    var validation = Array.prototype.filter.call(forms, function(form) {
                                        form.addEventListener('submit', function(event) {
                                            if (form.checkValidity() === false) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }
                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                }, false);
                            })();
                        </script>
                    </div>
                </div>
            <div class="row-lg-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Items Data</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Item Nmae</th>
                                    <th>Item Title</th>
                                    <th>Item Description</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Price Offer</th>
                                    <th>Item Date</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php while ($row = mysqli_fetch_assoc($query_result)) { ?> 
                                <tr>
                                    <th scope="row"><?php echo $row['item_id'];?></th>
                                    <td><?php echo $row['item_name'];?></td>
                                    <td><?php echo $row['item_title'];?></td>
                                    <td ><?php echo $row['item_desc'];?></td>
                                    <td><?php echo $row['cat_name'];?></td>
                                    <td><?php echo $row['item_price'];?></td>
                                    <td><?php echo $row['price_offer'];?></td>
                                    <td><?php echo $row['item_date'];?></td>
                                    <td><img width="90px" height="90px" src="assets/item_images/<?php echo $row['item_image'];?>" alt=""></td>
                                    <td>
                                        <div class="table-data-feature" >
                                            <a href="http://localhost/pharmacy/admin/manage_items.php?method=edit&id=<?php echo $row['item_id'];?>" class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <button  type="submit" name="delete_admin" class="btn btn-success btn-sm">EDIT</button>
                                            </a>
                                        </div>
                                    </td>
                                    <td>    
                                        <div>
                                            <a href="http://localhost/pharmacy/admin/manage_items.php?method=delete&id=<?php echo $row['item_id'];?>" class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <button type="submit" name="delete_admin" class="btn btn-danger btn-sm">DELETE</button>
                                            </a>
                                        </div>
                                    </td>
                                </tr><?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
<script>
    document.getElementById("manage-item").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>