<div class="container">
    <h1 class="mt-4">Edit User</h1>
    <form action="<?= base_url('admin/update_user/' . $user['id']) ?>" method="post">
        <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" value="<?= $user['fullname'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update User</button>
    </form>
</div>
