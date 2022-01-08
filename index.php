<?php require('include/header.php'); ?>
<section>
        <div class="container">
            <div class="row mt-5 border-1">
                <h3 class="text-center">Regestation form</h3>
                <div class="col-3"></div>
                <div class="col-6">
                    <?php
                        if(isset($_GET["success"])){ ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $_GET["success"] ?>
                                </div>
                       <?php }?>
                    <form action="post.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name">
                            <strong class="text-danger"><?php
                                if(isset($_GET["nam_err"])){
                                    echo $_GET["nam_err"];
                                }
                            ?></strong>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="exampleInputPassword1">
                            <strong class="text-danger"><?php
                                if(isset($_GET["pass_err"])){
                                    echo $_GET["pass_err"];
                                }
                            ?></strong>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Profile photo</label>
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