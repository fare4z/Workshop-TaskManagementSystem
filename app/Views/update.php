  <div class="container mt-5">

      <div class="row mt-5">
          <div class="col-md-12">
              <h2 class="mb-4">Add New Tasks</h2>

              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Update your progess</h5>

                      <form action="<?php echo base_url(); ?>process_update/<?= $task['id'] ?>" method="post">
                          <div class="form-group">
                              <label>Title:</label>
                              <input type="text" name="title" value="<?= $task['title'] ?>" class="form-control">
                          </div>
                          <div class="form-group">
                              <label>Description:</label>
                              <textarea name="description" class="form-control"><?= $task['description'] ?></textarea>
                          </div>
                          <div class="form-group">
                              <label>Status:</label>
                              <?php echo form_dropdown('status', $status, $task['status'], ['class' => 'form-control']); ?>
                          </div>
                          <button type="submit" class="btn btn-primary">Update Task</button>
                      </form>


                  </div>


              </div>
          </div>
      </div>
  </div>