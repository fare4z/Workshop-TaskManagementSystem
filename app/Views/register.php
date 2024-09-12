<header class="bg-primary text-white text-center py-5 bg-gradient">
    <div class="container">
        <h1>Sign Up</h1>
        <p class="lead">It's quick and easy</p>
    </div>
</header>

<section class="py-5 mb-5 bg-white">
    <div class="container ">
        <div class="card">
            <div class="card-header text-white" style="background-color: darkblue;">Register</div>
            <div class="card-body">

            <?php if (session()->getFlashdata('error')) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo session()->getFlashdata('error'); ?>
                            </div>
                            <?php } ?>


                <form method="post" action="<?php echo base_url();?>register">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" name="name"
                                    placeholder="Please enter your full name">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input type="text" class="form-control" name="username"
                                    placeholder="Please enter your username">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Please enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" class="form-control" name="password"
                                    placeholder="Please enter your password">
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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