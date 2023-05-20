<div class="modal fade" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
         <h5 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>

      <div class="modal-body">
          <form action="<?php echo $action; ?>" class="form-modal form">
          <div id="form-results"></div>
          <div class="form-group col-sm-6">
            <label for="first_name"><?php echo $lang["name"]; ?> </label>
            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $first_name; ?>" placeholder="<?php echo $lang["name"]; ?> ">
          </div>
          <div class="form-group col-sm-6">
            <label for="last_name"> <?php echo $lang["family"]; ?> </label>
            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $last_name; ?>" placeholder="<?php echo $lang["family"]; ?>">
          </div>

          <div class="form-group col-sm-6">
            <label for="users_group_id"><?php echo $lang["users_group"]; ?> </label>
            <select name="users_group_id" class="form-control" id="users_group_id">
              <?php foreach ($users_groups AS $users_group) { ?>
                  <option value="<?php echo $users_group->id; ?>" <?php echo $users_group->id == $users_group_id ? 'selected' : false; ?>><?php echo $users_group->name; ?></option>
              <?php } ?>
            </select>
          </div>

          <div class="form-group col-sm-6">
            <label for="email"><?php echo $lang["email"]; ?> </label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email; ?>" placeholder="<?php echo $lang["email"]; ?> ">
          </div>

          <div class="form-group col-sm-6">
            <label for="password"><?php echo $lang["password"]; ?> </label>
            <input type="password" class="form-control" name="password" id="password" placeholder="<?php echo $lang["password"]; ?>">
          </div>

          <div class="form-group col-sm-6">
            <label for="confirm_password"><?php echo $lang["confirm_password"]; ?> </label>
            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="<?php echo $lang["confirm_password"]; ?> ">
          </div>

          <div class="form-group col-sm-6">
              <label for="status"><?php echo $lang["status"]; ?> </label>
              <select class="form-control" id="status" name="status">
                  <option value="enabled"><?php echo $lang["enable"]; ?>  </option>
                  <option value="disabled" <?php echo $status == 'disabled' ? 'selected': false; ?>><?php echo $lang["disable"]; ?> </option>
              </select>
          </div>

          <div class="form-group col-sm-6">
              <label for="status"><?php echo $lang["birthday"]; ?> </label>
              <input type="text" name="birthday" placeholder="<?php echo $lang["birthday"]; ?>" class="form-control" value="<?php echo $birthday; ?>" />
          </div>

          <div class="form-group col-sm-6">
              <label for="gender"><?php echo $lang["gender"]; ?> </label>
              <select class="form-control" id="gender" name="gender">
                  <option value="male"><?php echo $lang["male"]; ?>  </option>
                  <option value="female" <?php echo $gender == 'female' ? 'selected': false; ?>><?php echo $lang["female"]; ?> </option>
              </select>
          </div>

          <div class="clearfix"></div>

          <div class="form-group col-sm-6">
              <label for="image"> <?php echo $lang["image"]; ?> </label>
              <input type="file" name="image" />
          </div>

          <?php if ($image) { ?>
          <div class="form-group col-sm-6">
              <img src="<?php echo $image; ?>" style="width:50px; height: 50px;" alt="" />
          </div>
          <?php } ?>

          <div class="clearfix"></div>

          <br>
            <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?> </button>
          </form>
      </div>
      <div class="modal-footer">
      <div class="btn-group">
        <?php if ($id != 1) { ?>
        <button data-target="<?php echo url('user/users/delete/' . $id) ?>" class="btn btn-danger delete">
          <?php echo $lang["delete"]; ?>
            <span class="fa fa-trash"></span>
        </button>
         <?php } ?>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["close"]; ?> </button>
      </div>
      </div>
    </div>
  </div>
</div>


<script>

    /* Deleting */
    $('.delete').on('click', function (e) {
        e.preventDefault();

        button = $(this);

        var c = confirm('<?php echo $lang["are_you_sure"]; ?>');

        if (c === true) {
            $.ajax({
                url: button.data('target'),
                type: 'POST',
                dataType: 'JSON',
                beforeSend: function () {
                    $('#form-results').removeClass().addClass('alert alert-info').html('<?php echo $lang["sending_request"]; ?>');
                },
                success: function(results) {
                    if (results.success) {
                        $('#form-results').removeClass().addClass('alert alert-success').html(results.success);
                        tr = button.parents('tr');

                        tr.fadeOut(function () {
                           tr.remove();
                        });
                        location.reload();

                    }
                }
            });
        } else {
            return false;
        }
    });

</script>
