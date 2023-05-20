<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger" id="users-list">
              <div class="box-header with-border">
                <h3 class="box-title pull-right"><?php echo $lang["user_management"]; ?>
                    <small><?php echo $lang["online_users"]; ?> : <?php echo $allOnline->total; ?></small>
                </h3>
                <button class="btn btn-danger pull-left open-popup" type="button" data-modal-target="#add-user-form" data-target="<?php echo url('/user/users/add'); ?>"><?php echo $lang["add_new_user"]; ?> </button>
              </div>
              <br>
              <!-- /.box-header -->
              <div class="card">
                <div id="results"></div>
                <div class="table-responsive">
                <table class="table table-bordered" id="table" >
                  <thead>
                  <tr>
                      <th>#</th>
                      <th><?php echo $lang["name"]; ?></th>
                      <th><?php echo $lang["group_name"]; ?></th>
                      <th><?php echo $lang["email"]; ?></th>
                      <th><?php echo $lang["status"]; ?></th>
                      <th><?php echo $lang["last_status"]; ?></th>
                      <th><?php echo $lang["rating"]; ?></th>
                      <th><?php echo $lang["operation"]; ?></th>
                  </tr>
                </thead>
                <tbody>

                  <?php foreach ($users AS $user) { ?>
                      <tr>
                        <td style="vertical-align: middle;"><?php echo $user->id;?></td>
                        <td>
                          <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px; height: 50px; border-radius: 50%;" alt="" />
                          <?php echo $user->first_name . ' ' . $user->last_name;?>
                        </td>
                        <td style="vertical-align: middle;"><?php echo $user->group;?></td>
                        <td style="vertical-align: middle;"><?php echo $user->email;?></td>
                        <td style="vertical-align: middle;"><?php if ($user->online_time >= time()) { echo "<img src='".assets("img/online.png")."'style='width:30px;height: 30px;'>"; } else { echo "<img src='".assets("img/offline.png")."'style='width:30px;height: 30px;'>"; } ?> </td>


                        <td style="vertical-align: middle;"><?php echo date('Y-m-d H:i:s A', $user->online_time);?></td>
                        <td style="vertical-align: middle;"><?php echo number_format(0);?> </td>
                        <td style="vertical-align: middle;">
                          <button type="button" data-target="<?php echo url('user/users/edit/' . $user->id) ?>" data-modal-target="#edit-user-<?php echo $user->id; ?>" class="btn btn-primary open-popup">
                              <?php echo $lang["edit"]; ?>
                              <span class="fa fa-pen"></span>
                          </button>


                        </td>
                      </tr>
                  <?php } ?>

                </tbody>

                </table>
              </div>
              </div>
              <!-- /.card -->
            </div>
        </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>

$(document).ready(function() {
    $('#table').DataTable();
} );
</script>
