
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <br>
        <div class="row"  id="sortable">
          <div class="col-lg-12 col-12">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3> <?php echo $site_name; ?>
 </h3>

<?php echo $lang["welcome_msg"]; ?>
              </div>

            </div>
          </div>



          <!-- ./col -->
        </div>
        <!-- /.row -->









<script>



Sortable.create(sortable, {
  group: "localStorage-example",
  store: {
    /**
     * Get the order of elements. Called once during initialization.
     * @param   {Sortable}  sortable
     * @returns {Array}
     */
    get: function (sortable) {
      var order = localStorage.getItem(sortable.options.group.name);
      return order ? order.split('|') : [];
    },

    /**
     * Save the order of elements. Called onEnd (when the item is dropped).
     * @param {Sortable}  sortable
     */
    set: function (sortable) {
      var order = sortable.toArray();
      localStorage.setItem(sortable.options.group.name, order.join('|'));
    }
  }
})

</script>






    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
