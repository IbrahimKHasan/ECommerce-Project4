<?php include("includes/config.php  ");?>
<?php include("includes/header.php"); ?>

<div class="app-main">
<?php include("includes/sidebar.php"); ?>

    <div class="app-main__outer">


        <div class="app-main__inner">
            


            <div class="col-lg-12">

                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">History Table</h5>
                        <table class="mb-0 table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User_ID</th>
                                    <th>Item Id</th>
                                    <th>Order Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $select = "SELECT * FROM history";
                                $res = $conn->query($select);
                                if($res){
                                    while($row = $res->fetch_assoc()):
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $row['history_id'];?></th>
                                            <td><?php echo $row['user_id'];?></td>
                                            <td><?php echo $row['item_id'];?></td>
                                            <td><?php echo $row['history_date'];?></td>
                                        </tr>
                                        <?php endwhile;?>
                                        <?php
                                }else{
                                    echo "No data was found";
                                    die();  
                                }
                                        ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("manage-history").classList.add("mm-active")
</script>
<script type="text/javascript" src="./assets/scripts/main.js"></script>