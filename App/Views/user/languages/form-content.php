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
            <label for="language-name">نام اصلی</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $name; ?>" >
          </div>

          <div class="form-group col-sm-6">
            <label for="language_name">نام در زبان مورد نظر</label>
            <textarea class="form-control" name="language_name" id="language_name"><?php echo $language_name; ?></textarea>
          </div>



            <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?></button>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><?php echo $lang["close"]; ?></button>
      </div>
    </div>
  </div>
</div>

