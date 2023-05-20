<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-sm-12">
            <div class="box box-danger" id="coins-list">
              <div class="box-header with-border">
                <h3 class="box-title"><?php echo $lang["coin_list"]; ?></h3>
              </div>
              <!-- /.box-header -->
              <div class="card">
                <div id="results"></div>
                <table class="table table-bordered">
                  <tr>
                      <th><?php echo $lang["name"]; ?></th>
                      <th><?php echo $lang["full_name"]; ?></th>
                      <th><?php echo $lang["price"]; ?></th>
                      <th><?php echo $lang["marketcap"]; ?></th>

                  </tr>
                  <tbody id="tbody">

                </tbody>
                </table>

            </div>
        </div>
    </div>


  </section>
  <!-- /.content -->
</div>


<script>
$('#tbody').html('');



  function updateTable() {
  $.ajax({
      url: "<?php echo url("user/coins/get-all"); ?>",
      type: "GET",
      async: true,
      dataType: "json",
      success: function(response){
             var len = response.length;
             if(len<1) {
              toastr.error('There is no free time for our consultants on this date');
             }


                     $.each(response.Data, function(i, item) {
                       $("#tbody").append('<tr>');
                       console.log(response.Data[i].DISPLAY);
                         $("#tbody").append('<td><img src="https://cryptocompare.com/'+response.Data[i].CoinInfo.ImageUrl+'" style="width:50px;"> '+response.Data[i].CoinInfo.Name+'</td>');
                         $("#tbody").append('<td>'+response.Data[i].CoinInfo.FullName+'</td>');
                         $("#tbody").append('<td>'+response.Data[i].DISPLAY.USD.PRICE+'</td>');
                         $("#tbody").append('<td>'+response.Data[i].DISPLAY.USD.MKTCAP+'</td>');
                         $("#tbody").append('</tr>');

                          });



      },
      error: function(error){
        toastr.error('Please check your internet connection');
      }
  });
}



var intervalId = window.setInterval(function(){
  updateTable();
}, 5000);
updateTable();


</script>