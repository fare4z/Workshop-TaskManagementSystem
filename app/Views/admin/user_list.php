<div class="container">
    <h1 class="mt-4">User List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Profile Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user):
                $user['photo'] = $user['photo'] ?? 'uploads/profile/default.png'; // Default photo if not set
                ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td>
                        <img src="<?= base_url($user['photo']) ?>" alt="Profile Photo" class="img-thumbnail" width="100">
                    </td>
                    <td>
                        <a href="<?= base_url('admin/edit_user/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= base_url('admin/delete_user/' . $user['id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<style>
    .img-thumbnail {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 4px;
        max-width: 100%;
        height: auto;
    }
</style>

<!-- Display message using sweetalert2 -->

<script>
    const successMessage = "<?= session()->getFlashdata('success') ?>";
    const errorMessage = "<?= session()->getFlashdata('error') ?>";

    if (successMessage) {
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: successMessage
        });
    }

    if (errorMessage) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: errorMessage
        });
    }
</script>