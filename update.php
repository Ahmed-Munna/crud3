<?php
    session_start();
    if(!isset($_SESSION["login"])){
        header('location:login.php');
    }
    require('include/header.php'); 
    require('include/config.php');
    $id = $_GET["id"];
    $query  = "SELECT * FROM user WHERE id=$id";
    $insart = mysqli_query($db_connect,$query);
    $assoc  = mysqli_fetch_assoc($insart);
?>
<section>
        <div class="container">
            <div class="row mt-5 border-1">
                <h3 class="text-center">Update Data</h3>
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="update_post.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                            <input type="hidden" name="id" value="<?php echo $_GET["id"]?>">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" value="<?php echo $assoc['name']?>" class="form-control" name="name">
                            <strong class="text-danger"><?php
                                if(isset($_GET["nam_err"])){
                                    echo $_GET["nam_err"];
                                }
                            ?></strong>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control" value="<?php echo $assoc['pass']?>" name="password" id="exampleInputPassword1">
                            <strong class="text-danger"><?php
                                if(isset($_GET["pass_err"])){
                                    echo $_GET["pass_err"];
                                }
                            ?></strong>
                        </div>
                        <div class="mb-3">
                            <img style="hight: 170px; width: 170px;" src="upload/profile/<?php echo $assoc['img']?>">
                            <label for="formFile" class="form-label">update photo</label>
                            <input class="form-control" name="photo" type="file" oninput="pic.src=window.URL.createObjectURL(this.files[0])">
                            <img style="hight: 170px; width: 170px;" id="pic">
                            <strong class="text-danger"><?php
                                if(isset($_GET["img_err"])){
                                    echo $_GET["img_err"];
                                }
                            ?></strong>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </section>
<?php require('include/footer.php'); ?>