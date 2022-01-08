<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header('location:login.php');
    }
    require('include/config.php');
    require('include/header.php');
    $query  = "SELECT * FROM user";
    $user_data = mysqli_query($db_connect,$query);
?>



<section>
        <div class="container">
            <?php
                if(isset($_SESSION["login_succ"])){ ?>
                    <div class="alert alert-success" role="alert">
                               <?= $_SESSION["login_succ"];?>
                            </div>
             <?php } unset($_SESSION["login_succ"]);?>
            <div class="row">
                <h3 class="text-center">User list</h3>
                <div class="col-2"></div>
                <div class="col-8">
                <table class="table table-info">
                    <?php
                        if(isset($_GET["delete_success"])){?>
                            <div class="alert alert-danger" role="alert">
                               <?php echo $_GET["delete_success"];?>
                            </div>
                       <?php }?>
                       <?php
                        if(isset($_GET["update_success"])){?>
                            <div class="alert alert-success" role="alert">
                               <?php echo $_GET["update_success"];?>
                            </div>
                       <?php }?>
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">NAME</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">PHOTO</th>
                            <th scope="col">ACTION</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($user_data as $user){
                            ?>
                            <tr>
                            <td><?php echo $user['id'] ?></td>
                            <td><?php echo ucwords ($user['name'])?></td>
                            <td><?php echo ucwords ($user['pass'])?></td>
                            <td><img style="hight: 170px; width: 170px;" src="upload/profile/<?php echo ucwords ($user['img'])?>" alt=""></td>
                            <td>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $user['id']?>">Delete</a>
                            <a class="btn btn-success" href="update.php?id=<?php echo $user['id']?>">Update</a>
                        
                            </td>
                            </tr>
                            <?php }?>
                        </tbody>
                        </table>
                        <a class="btn btn-danger" href="logout.php">Logout</a>
                </div>
                <div class="col-2"></div>
            </div>
        </div>
    </section>








<?php require('include/footer.php'); ?>