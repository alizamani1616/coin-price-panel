  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
          <div class="col-sm-12">
              <div class="box box-danger" id="ads-list">
                <div class="box-header with-border">
                  <h3 class="box-title">
                    <span class="fa fa-cogs"></span>
                    <?php echo $lang["setting"]; ?>
                  </h3>
                </div>
                <!-- /.box-header -->
                <div class="card">
                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <?php if ($errors) { ?>
                            <div id="form-results" class="alert alert-danger">
                                <?php echo $errors;?>
                            </div>
                        <?php } ?>
                        <?php if ($success) { ?>
                            <div id="form-results" class="alert alert-success">
                                <?php echo $success;?>
                            </div>
                        <?php } ?>
                        <div class="form-group col-sm-12">
                          <label for="site_name">نام سایت</label>
                          <input type="text" class="form-control" name="site_name" id="site_name" value="<?php echo $site_name; ?>" placeholder="نام سایت">
                        </div>
                        <div class="form-group col-sm-12">
                          <label for="site_email">ایمیل سایت</label>
                          <input type="email" class="form-control" name="site_email" id="site_email" value="<?php echo $site_email; ?>" placeholder="ایمیل سایت">
                        </div>

                        <div class="form-group col-sm-6">
                            <label for="logo">لوگوی سایت</label>
                            <input type="file" name="logo" />
                        </div>

                        <?php if ($logo) { ?>
                        <div class="form-group col-sm-6">
                            <img src="<?php echo $logo; ?>" style="width:100px; height: 100px;" alt="" />
                        </div>
                        <?php } ?>


                        <button class="btn btn-info">ذخیره</button>
                    </form>
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

    $('#site_ip_blocking_country').flagStrap({
        placeholder: {
            value: "",
            text: "انتخاب"
        }
    });
  </script>