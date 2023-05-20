  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="users-list">
                <div class="box-header with-border">
                  <h3 class="box-title pull-right"> <?php echo $lang["user_management"]; ?>  </h3>
                  <button class="btn btn-danger pull-left open-popup" type="button" data-modal-target="#add-user-form" data-target="<?php echo url('/user/users/add'); ?>"><?php echo $lang["add_new_user"]; ?></button>
                </div>
                <!-- /.box-header -->
                <div class="card">
                  <div id="results"></div>
                  <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th><?php echo $lang["name"]; ?> </th>
                        <th> <?php echo $lang["users_group"]; ?> </th>
                        <th><?php echo $lang["email"]; ?> </th>
                        <th><?php echo $lang["status"]; ?> </th>
                        <th><?php echo $lang["login_time"]; ?> </th>
                        <th><?php echo $lang["operation"]; ?> </th>
                    </tr>
                    <?php foreach ($users AS $user) { ?>
                        <tr>
                          <td style="vertical-align: middle;"><?php echo $user->id;?></td>
                          <td>
                            <img src="<?php echo assets('images/' . $user->image); ?>" style="width:50px; height: 50px; border-radius: 50%;" alt="" />
                            <?php echo $user->first_name . ' ' . $user->last_name;?>
                          </td>
                          <td style="vertical-align: middle;"><?php echo $user->group;?></td>
                          <td style="vertical-align: middle;"><?php echo $user->email;?></td>
                          <td style="vertical-align: middle;"><?php if ($user->status == 'enabled') { echo $lang["enable"]; } else { echo $lang["disable"]; } ?></td>
                          <td style="vertical-align: middle;"><?php echo jdate('d-m-Y', $user->created);?></td>
                          <td style="vertical-align: middle;">
                            <button type="button" data-target="<?php echo url('user/users/edit/' . $user->id) ?>" data-modal-target="#edit-user-<?php echo $user->id; ?>" class="btn btn-primary open-popup">
                                <?php echo $lang["edit"]; ?>
                                <span class="fa fa-pen"></span>
                            </button>
                            <?php if ($user->id != 1) { ?>
                            <button data-target="<?php echo url('user/users/delete/' . $user->id) ?>" class="btn btn-danger delete">
                                <?php echo $lang["delete"]; ?>
                                <span class="fa fa-trash"></span>
                            </button>
                             <?php } ?>
                          </td>
                        </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.card -->
              </div>
          </div>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
