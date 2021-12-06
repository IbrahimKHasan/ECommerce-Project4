<?php 

session_start();

include("includes/config.php"); 



//add category
if(isset($_POST["add_category"])){

    $rand=rand(1111,9999);
    
    $destination="assets/categories_images/".$rand.$_FILES["category_image"]["name"];
    $category_name     =$_POST["category_name"];
    $category_image    =$rand.$_FILES["category_image"]["name"];
    
    $insert_category  ="INSERT INTO category (cat_name,cat_image) 
                       VALUES ('$category_name','$category_image')";
    mysqli_query($conn,$insert_category);
    
    if(move_uploaded_file($_FILES["category_image"]["tmp_name"],$destination)){
    $_SESSION["status"] = "YOUR DATA IS ADD" ; 
    $_SESSION["status_code"] ="success";
    header("location:manage_categories.php");
    }
    else{
		$_SESSION["status"] = "YOUR DATA IS NOT ADD" ; 
		$_SESSION["status_code"] ="error";        
        header("location:manage_categories.php");
    }

    }
    
    
    
    //delete category
    if(isset($_GET["method"])){
        if($_GET["method"]=="delete"){
            $delete_cat="DELETE FROM category WHERE cat_id=".$_GET["id"] ;
            mysqli_query($conn,$delete_cat);
            header("location:manage_categories.php");
           
        }
    }
    //update user

if(isset($_GET["method"])){

    if($_GET["method"]=="edit"){
         $id_edit=$_GET["id"];
        $select_edit="SELECT * FROM category WHERE cat_id=$id_edit";
        $query_select_edit=mysqli_query($conn,$select_edit);
        
        $row_edit=mysqli_fetch_assoc($query_select_edit);

        $u_category_name  =$row_edit["cat_name"];
        $u_category_image =$row_edit["cat_image"];
       

        
        

    }

    if(isset($_POST["edit_btn"])){
        $rand=rand(1111,9999);
        $destination="assets/categories_images/".$rand.$_FILES["category_image"]["name"];

        $u_category_name  =$_POST["category_name"];
        $u_category_image =$rand.$_FILES["category_image"]["name"];
        $edit="UPDATE category SET cat_name='$u_category_name',cat_image='$u_category_image'
               WHERE cat_id=$id_edit" ;

        $queryedit=mysqli_query($conn,$edit);
        if(move_uploaded_file($_FILES["category_image"]["tmp_name"],$destination)){
            $_SESSION["status"] = "YOUR DATA IS ADD" ; 
            $_SESSION["status_code"] ="success";
            header("location:manage_categories.php");
            }
            else{
                $_SESSION["status"] = "YOUR DATA IS NOT ADD" ; 
                $_SESSION["status_code"] ="error";
                header("location:manage_categories.php");
            }
            
    }}

?>
<?php include("includes/header.php");  ?>



<div class="app-main">
<?php include("includes/sidebar.php"); ?>

    <div class="app-main__outer">


        <div class="app-main__inner">
            <div class="col">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Add New Categories</h5>
                        <form class="needs-validation" novalidate  method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Category Name</label>
                                    <input type="text" name="category_name" value="<?php echo @$u_category_name; ?>" class="form-control" id="validationCustom01" placeholder="Category Name" required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationCustom01">Category Image</label>
                                    <input type="file" name="category_image" value="<?php echo $u_category_image; ?>" class="form-control" id="validationCustom01"   required>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <button class="btn btn-primary" style="display:<?php echo (@$_GET["method"]!="edit")?'':'none'; ?>" name="add_category" type="submit">Add </button>
                            <input type="submit" name="edit_btn" style="display:<?php echo (@$_GET["method"]=="edit")?'':'none'; ?>" class="btn btn-secondary btn-sm" value="Edit Category">

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
            </div>


            <div class="col-lg-12">

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Category Data</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category Name</th>
                                    <th>Category Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                //select cat

                                 $select_cat="SELECT * FROM category ";
                                $query_cat=mysqli_query($conn,$select_cat);
                                             
                                while($row_cat=mysqli_fetch_assoc($query_cat)){ ?>
                                <tr>
                                    <th scope="row"><?php echo $row_cat["cat_id"]; ?></th>
                                    <td><?php echo $row_cat["cat_name"]; ?></td>
                                    <td><img src="assets/categories_images/<?php echo $row_cat["cat_image"]; ?>" width="100px" height="100px" alt="" srcset=""></td>
                                    <td> 
                                        <div class="table-data-feature">
                                                        
                                                      
                                                           <a href="manage_categories.php?method=edit&&id=<?php echo $row_cat["cat_id"];?>">
                                                           <button  type="submit" name="edit_btn" class="btn btn-success btn-sm"> EDIT</button>
                                                        </a> 
                                                        
                                </td>
                                <td>
                                                            <a href="manage_categories.php?method=delete&&id=<?php echo $row_cat["cat_id"];?>">
                                                            <button type="submit" name="delete_admin" class="btn btn-danger btn-sm"> DELETE</button>
                                                        </a>
                                                        
                                                        
                                                    </div>
                                                </td>
                                </tr>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("includes/javascript.php"); 
   ?>
<script>
    document.getElementById("manage-cat").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>