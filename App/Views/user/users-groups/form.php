  <div class="modal fade" id="<?php echo $target; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title" id="myModalLabel"><?php echo $heading; ?></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
             <span aria-hidden="true">&times;</span>
           </button>
         </div>
         <form action="<?php echo $action; ?>" class="form-modal form">

        <div class="modal-body">
            <div id="form-results"></div>
            <div class="form-group col-sm-12">
              <label for="users-group-name"> <?php echo $lang["name"]; ?> </label>
              <input type="text" class="form-control" name="name" id="users-group-name" value="<?php echo $name; ?>" placeholder="<?php echo $lang["name"]; ?> ">
            </div>

            <div class="form-group col-sm-12">
                <label for="pages"><?php echo $lang["access"]; ?> </label>
                <select name="pages[]" id="pages" class="form-control" multiple="multiple">
                    <?php foreach ($pages AS $page) {?>
                    <option value="<?php echo $page; ?>" <?php echo in_array($page, $users_group_pages) ? 'selected' : false; ?>><?php echo $page; ?></option>
                    <?php } ?>
                </select>
            </div>
            <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["close"]; ?></button>
          <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?></button>
        </div>
              </form>
      </div>
    </div>
  </div>
