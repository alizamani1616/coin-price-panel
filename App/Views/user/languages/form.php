<div class="modal fade" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h4>
      </div>
      <div class="modal-body">
          <form action="<?php echo $action; ?>" class="form-modal form">
          <div id="form-results"></div>


          <div class="form-group col-sm-6">
            <label for="language-name"> <?php echo $lang["name"]; ?></label>
            <input type="text" class="form-control" name="name_l" id="language-name" value="<?php echo $name_l; ?>" placeholder="<?php echo $lang["name"]; ?>">
          </div>

          <div class="form-group col-sm-6">
            <label for="author"> <?php echo $lang["short_name"]; ?></label>
            <input type="text" class="form-control" name="short_name_l" id="short_name" value="<?php echo $short_name_l; ?>" placeholder="<?php echo $lang["short_name"]; ?>">
          </div>
          <div class="form-group col-sm-6">
            <label for="is_sort"> <?php echo $lang["sort"]; ?></label>
            <input type="number" class="form-control" name="is_sort" id="is_sort" value="<?php echo $is_sort; ?>" placeholder="<?php echo $lang["sort"]; ?>">
          </div>


            <div class="form-group col-sm-6">
              <label for="status"><?php echo $lang["status"]; ?></label>
              <select class="form-control" id="status" name="status_l">
                  <option value="enabled"><?php echo $lang["enable"]; ?> </option>
                  <option value="disabled" <?php echo $status_l == 'disabled' ? 'selected': false; ?>> <?php echo $lang["disable"]; ?></option>
              </select>
            </div>

<?php

foreach ($language_content as $content) {
  ?>

  <div class="form-group col-sm-6">
    <label for="<?php echo  $content->name; ?>"><?php echo  $content->name; ?></label>
    <input type="text" class="form-control" name="<?php echo  $content->name; ?>" id="<?php echo  $content->name; ?>" value="<?php echo  $content->name; ?>">
  </div>

  <?php
}
 ?>






            <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?></button>

      </form>
      </div>
      <div class="modal-footer">


        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["close"]; ?></button>
      </div>

    </div>
  </div>
</div>
