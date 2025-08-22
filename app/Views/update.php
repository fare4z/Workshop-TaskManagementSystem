<div class="container mt-5">
  <div class="row mt-5">
    <div class="col-md-12">
      <h2 class="mb-4">Add New Tasks</h2>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update your progess</h5>

          <form action="<?= base_url('process_update/' . $task['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
              <label>Title:</label>
              <input type="text" name="title" value="<?= esc($task['title']) ?>" class="form-control">
            </div>
            <div class="form-group">
              <label>Description:</label>
              <textarea name="description" class="form-control"><?= esc($task['description']) ?></textarea>
            </div>
            <div class="form-group">
              <label>Due Date:</label>
              <input type="date" name="duedate" class="form-control" value="<?= esc($task['due_date']) ?>">
            </div>
            <div class="form-group">
              <label>Status:</label>
              <?= form_dropdown('status', $status, $task['status'], ['class' => 'form-control']) ?>
            </div>

            <div class="d-flex gap-2 mt-3">
              <button type="submit" name="action" value="update" class="btn btn-primary">Update Task</button>
              <button type="submit" name="action" value="update_email" class="btn btn-outline-primary">Update & Email</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>