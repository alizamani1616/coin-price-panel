  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="users-list">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $lang["users_group_management"]; ?></h3>
                  <button class="btn btn-danger pull-left open-popup" type="button" data-modal-target="#add-users-group-form" data-target="<?php echo url('/user/users-groups/add'); ?>"><?php echo $lang["add_users_groups"]; ?></button>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="card">
                  <div id="results"></div>
                  <table class="table table-bordered">
                    <tr>
                        <th>#</th>
                        <th><?php echo $lang["name"]; ?></th>
                        <th><?php echo $lang["operation"]; ?></th>
                    </tr>
                    <?php foreach ($users_groups AS $users_group) { ?>
                        <tr>
                          <td><?php echo $users_group->id;?></td>
                          <td><?php echo $users_group->name;?></td>
                          <td>
                            <button type="button" data-target="<?php echo url('user/users-groups/edit/' . $users_group->id) ?>" data-modal-target="#edit-users-group-<?php echo $users_group->id; ?>" class="btn btn-primary open-popup">
                                <?php echo $lang["edit"]; ?>
                                <span class="fa fa-pen"></span>
                            </button>
                            <?php if ($users_group->id != 1) { ?>
                            <button data-target="<?php echo url('user/users-groups/delete/' . $users_group->id) ?>" class="btn btn-danger delete">
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
