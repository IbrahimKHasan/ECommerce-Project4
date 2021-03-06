<?php
session_start();
 include("includes/config.php"); ?>

<?php

  if (isset($_GET["method"])) {

    if ($_GET["method"] == "delete") {

      $delete_query = "DELETE FROM comments WHERE comment_id=" . $_GET["id"];

     if( mysqli_query($conn, $delete_query)){
      $_SESSION["status"] = "YOUR DATA IS DELETE" ; 
      $_SESSION["status_code"] ="success"; 
      header("location:manage_comments.php"); 
     }
     else{
    	$_SESSION["status"] = "YOUR DATA IS NOT ADD" ; 
      $_SESSION["status_code"] ="error";
      header("location:manage_comments.php");}  
   

    }

  }


?>

<?php include("includes/header.php"); ?>

<div class="app-main">
  <?php include("includes/sidebar.php"); ?>
  <div class="app-main__outer">
    <div class="app-main__inner">
      <div class="col-lg-12">
        <div class="main-card mb-3 card">
          <div class="card-body">
            <h5 class="card-title">Users Comments</h5>
            <table class="mb-0 table table-striped">
              <thead>
                <tr>
                  <th># Comment Id</th>
                  <th>User Id</th>
                  <th>User Name</th>
                  <th>Comment Statement</th>
                  <th>Item Name</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $fetch_query = "SELECT comments.comment_id, comments.user_id,comments.comment_statment,comments.item_id,item.item_id,item_name FROM comments,item where comments.item_id = item.item_id";
                  $result = $conn->query($fetch_query);
                ?>
                <?php if ($result->num_rows > 0) : ?>
                  <?php while ($row = $result->fetch_assoc()) : 
                      $id_user=$row['user_id'];
                      $user="SELECT user_fullname from user WHERE user_id=$id_user";
                      $user_result = mysqli_query($conn, $user);
                      $row_user=mysqli_fetch_assoc($user_result);
                    
                    ?>
                    <tr>
                      <th scope="row"><?php echo $row["comment_id"]; ?></th>
                      <td><?php echo $row["user_id"]; ?></td>
                      <td><?php echo $row_user["user_fullname"]; ?></td> 
                      <td><?php echo $row["comment_statment"]; ?></td>
                      <td><?php echo $row["item_name"]; ?></td>
                      <td>
                        <a href="manage_comments.php?method=delete&&id=<?php echo $row["comment_id"] ?>">
                        <button type="submit"  class="btn btn-danger btn-sm">DELETE</button>
                        </a>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="./assets/scripts/main.js"></script>
<script>
    document.getElementById("manage-comments").classList.add("mm-active")
</script>
<?php include("includes/javascript.php"); 
   ?>