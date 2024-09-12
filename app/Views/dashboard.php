<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Welcome to Task Management System</h1>
            <p class="text-center">Manage your tasks effectively and efficiently</p>
            <div class="text-center mt-4">
                <a href="<?php echo base_url(); ?>newtask" class="btn btn-primary btn-lg">Add New Task</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <h2 class="mb-4">Your Tasks</h2>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                     $id = 1;
                    foreach ($tasks as $task): 
                       
                        ?>
                        <tr>
                            <td><?=$id?></td>
                            <td><?= $task['title'] ?></td>
                            <td><?= $task['description'] ?></td>

                            <td><?=$task['due_date']?></td>
                            <td><?php echo $status[$task['status']]; ?></td>
                            <td>
                                <a href="<?php echo base_url(); ?>update/<?= $task['id'] ?>" class="btn btn-warning btn-sm">Update</a>
                                <a href="<?php echo base_url();?>delete/<?= $task['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php $id++;
                 endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php if (session()->getFlashdata('success')): ?>
                   
    <script>
        Swal.fire({
  title: "Success!!",
  text: "<?php echo session()->getFlashdata('success'); ?>",
  icon: "success"
});
</script>
                <?php endif; ?>