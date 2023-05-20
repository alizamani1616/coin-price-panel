<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger" id="languages-list">
              <div class="box-header with-border">
                <h3 class="box-title">  <?php echo $lang["language_managment"]; ?></h3>
              </div>



      <form action="<?php echo url("user/languages/list-content/excel/".$languages[0]->language_id); ?>" method="post" style="border:10px;" class="form" >
            <div id="form-results"></div>
          <div class="form-group col-sm-3">
              <label for="excel">excel</label>
              <input type="file" name="excel" />
          </div>
          <div class="form-group col-sm-3">
            <button class="btn btn-info submit-btn"><?php echo $lang["submit"]; ?></button>
          </div>
        </form>




              <!-- /.box-header -->
              <div class="card">
                <div id="results"></div>
                <table class="table table-bordered">
                  <tr>
                      <th>#</th>
                      <th><?php echo $lang["name"]; ?></th>
                      <th> <?php echo $lang["title_language"]; ?></th>
                      <th><?php echo $lang["operation"]; ?></th>
                  </tr>
                  <?php
                  foreach ($languages AS $language) { ?>
                      <tr>
                        <td><?php echo $language->id;?></td>
                        <td><?php echo $language->name;?></td>
                        <td><?php echo $language->language_name;?></td>
                        <td>
                          <button type="button" data-target="<?php echo url('user/languages/list/edit/' . $language->id) ?>" data-modal-target="#edit-language-<?php echo $language->id; ?>" class="btn btn-primary open-popup">
                              <?php echo $lang["edit"]; ?>
                              <span class="fa fa-pen"></span>
                          </button>

                        </td>
                      </tr>
                  <?php } ?>
                </table>
              </div>
              <!-- /.card -->
              <div class="box-footer clearfix">
                <!-- <ul class="pagination pagination-sm no-margin pull-right">
                  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">&raquo;</a></li>
                </ul> -->
              </div>
            </div>
        </div>
    </div>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
