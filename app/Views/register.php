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
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error'); ?>
                    </div>
                <?php endif; ?>
                <form method="post" action="<?php echo base_url(); ?>register">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-medium">Full Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Please enter your full name" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label fw-medium">Username</label>
                                <input type="text" class="form-control" id="username" placeholder="Please enter your username" name="username">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-medium">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Please enter your email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label fw-medium">Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Please enter your password" name="password">
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