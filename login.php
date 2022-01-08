<?php include('include/header.php'); ?>
<section>
        <div class="container">
            <div class="row mt-5 border-1">
                <h3 class="text-center">Login</h3>
                <div class="col-3"></div>
                <div class="col-6">
                    <form action="login_post.php" method="post"">
                       <?php if(isset($_GET["err_mass"])){ ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $_GET["err_mass"] ?>
                                    </div>
                        <?php }?>
                    <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="exampleInputPassword1">
                        </div>
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
<?php include('include/footer.php'); ?>