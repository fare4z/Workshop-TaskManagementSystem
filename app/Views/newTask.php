  <div class="container mt-5">

      <div class="row mt-5">
          <div class="col-md-12">
              <h2 class="mb-4">Add New Tasks</h2>

              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Task Details</h5>
                      <p class="card-text">Please enter the details of the task you want to add.</p>

                      <form method="post" action="<?php echo base_url(); ?>process_newtask">
                          <div class="mb-2 row">
                              <label for="title" class="col-sm-2 col-form-label">Title</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title" required>
                              </div>
                          </div>

                          <div class="mb-2 row">
                              <label for="description" class="col-sm-2 col-form-label">Description</label>
                              <div class="col-sm-10">
                                  <textarea class="form-control" name="description" required></textarea>
                              </div>
                          </div>

                          <div class="mb-2 row">
                              <label for="duedate" class="col-sm-2 col-form-label">Due Date</label>
                              <div class="col-sm-10">
                                  <input type="date" class="form-control" name="duedate" required>
                              </div>
                          </div>

                          <div class="mb-2 mt-5 row">
                              <button type="submit" class="btn btn-primary">Add Task</button>
                          </div>
                      </form>

                  </div>


              </div>
          </div>
      </div>
  </div>