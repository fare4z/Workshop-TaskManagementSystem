<header class="bg-primary text-white text-center py-5 bg-gradient">
    <div class="container">
        <h1>Login</h1>
        <p class="lead">It's quick and easy</p>
    </div>
</header>

<section class="py-5 mb-5 bg-white">
    <div class="container ">

        <form method="post" action="<?php echo base_url(); ?>login">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">

                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Please enter your username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Please enter your password">
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</section>


<?php if (session()->getFlashdata('error')) { ?>
<script>
Swal.fire({
  icon: "error",
  title: "Oops...",
  text: " <?php echo session()->getFlashdata('error'); ?>",
});</script>
<?php } ?>