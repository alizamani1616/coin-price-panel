<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger" id="languages-list">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $lang["language_managment"]; ?> </h3>
                <button class="btn btn-danger pull-left open-popup" type="button" data-modal-target="#add-language-form" data-target="<?php echo url('/user/languages/add'); ?>"><?php echo $lang["add_language"]; ?></button>
              </div>
              <!-- /.box-header -->
              <div class="card">
                <div id="results"></div>
                <table class="table table-bordered">
                  <tr>
                      <th>#</th>
                      <th><?php echo $lang["name"]; ?></th>
                      <th> <?php echo $lang["short_name"]; ?> </th>
                      <th><?php echo $lang["status"]; ?></th>
                      <th><?php echo $lang["sort"]; ?></th>
                      <th><?php echo $lang["operation"]; ?></th>
                  </tr>
                  <?php foreach ($languages AS $language) { ?>
                      <tr>
                        <td><?php echo $language->id;?></td>
                        <td><span style="<?php if($language->import_excel==1) {echo "color:green;"; } ?>">
                          <?php echo $language->name;?>
                        </span>
                        </td>
                        <td><?php echo $language->short_name;?></td>
                        <td><?php if ($language->status == 'enabled') { echo $lang["enable"]; } else { echo $lang["disable"]; } ?></td>
                        <td><?php echo $language->is_sort;?></td>


                        <td>
                          <button  data-target="<?php echo url('user/languages/edit/' . $language->id) ?>" data-modal-target="#edit-language-<?php echo $language->id; ?>" class="btn btn-primary open-popup">
                              <?php echo $lang["edit"]; ?>
                              <span class="fa fa-edit"></span>
                          </button>
                          <a  href="<?php echo url('user/languages/list-content/' . $language->id) ?>" class="btn btn-info">
                            <?php echo $lang["edit_content"]; ?>
                              <span class="fa fa-edit"></span>
                          </a>


                                  <button data-target="<?php echo url('user/languages/default/' . $language->id) ?>" style=" <?php
                                  if($language->is_default==1)
                                  {
                                    echo "color:yellow;";
                                  }
                                  ?> " class="btn btn-warning default">
                                    <?php echo $lang["default"]; ?>
                                      <span class="fa fa-star"></span>
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
