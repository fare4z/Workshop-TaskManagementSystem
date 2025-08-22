<header class="bg-primary text-white text-center py-5 bg-gradient">
    <div class="container">
        <h1>Profile</h1>
        <p class="lead">It's quick and easy</p>
    </div>
</header>

<section class="py-5 mb-5 bg-white">
    <div class="container ">
        <div class="card">
            <div class="card-header text-white" style="background-color: darkblue;">Profile</div>
            <div class="card-body">
               <form action="<?= base_url('auth/update_profile') ?>" method="post" enctype="multipart/form-data">
    <div class="row justify-content-md-center">
        <div class="col-md-10">

            <div class="text-center mb-3">
                <img src="<?= base_url(session()->get('photo') ?? 'uploads/profile/default.png') ?>" 
                     alt="Profile Photo" class="img-thumbnail" width="150">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label fw-medium">Profile Photo</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-medium">Full Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $nama ?>">
            </div>

            <div class="mb-3">
                <label for="username" class="form-label fw-medium">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label fw-medium">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-medium">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                       placeholder="Leave blank if not changing">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </div>
    </div>
</form>

            </div>
        </div>
    </div>
</section>