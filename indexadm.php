<?php  
	include 'headeradm.php';
?>
<h1>Dash Board</h1>
<div id="chart-container">
	<canvas id="myChart"></canvas>
</div>
</div>
<div class="container">
  <?php  
    require 'database-config.php';
      $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        die("Can't query data. Error occure.".mysqli_error($conn));
      }
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo '<h2>Newest Dished</h2>';
          echo '<div class="newdished">';
          echo '<img class="img-dished" src="'.$row["image"].'">';
          echo '<h4 class="namedis">'.$row["product_name"].'</h4>';
          echo '<p class="namedes">'.$row["description"].'</p>';
          echo '<h4 class="costdished">'.$row["cost"].'<sup>VND</sup></h4>';
          echo '</div>';
        }
      }
  ?>
</div>
<div class="container1">
  <?php  
    require 'database-config.php';
      $sql = "SELECT * FROM news ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($conn, $sql);
      if (!$result) {
        die("Can't query data. Error occure.".mysqli_error($conn));
      }
      if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo '<h2>Newest Recipe</h2>';
          echo '<div class="blog">';
          echo '<div class="news">';
          echo '<form class="new" action="" method="GET">';
          echo '<h3 class="title"><a href="#">'.$row["title"].'</a></h3>';
          echo '<div><img class="image" src="'.$row["image"].'"/></div>';
          echo '</div>';
          echo '</div>';
        }
      }
  ?>
</div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container3">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="loginadm.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
	<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"
    integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- DataTable -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.16/r-2.2.0/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <!-- Bar Chart -->
    <script>
      $(document).ready(function(){
        $.ajax({
        url: 'getChartData.php',
        method: 'POST',
        dataType: 'json',
        // data: 
      }).done(function(data){
        if (data.result) {
          var categories = [];
          var numOfProduct = [];
          $.each(data.products, function(index, row){
            categories.push(row.name);
            numOfProduct.push(row.NumOfProduct);
          })
          var ctx = document.getElementById("myChart").getContext('2d');

          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: categories,
                  datasets: [{
                      label: '# of Products',
                      data: numOfProduct,
                      backgroundColor: getRandomColorArray(categories.length),
                      borderColor: getRandomColorArray(categories.length),
                      borderWidth: 1
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero:true
                          }
                      }]
                  },
                  plugins: {
                datalabels: {
                  backgroundColor: function(context) {
                    return context.dataset.backgroundColor;
                  },
                  borderRadius: 4,
                  color: 'white',
                  font: {
                    weight: 'bold'
                  },
                  formatter: Math.round,
                  anchor: 'end',
                  align: 'start'
                }
              }
              }
          });
        }else{
          console.log(data.message);
        }
        
      }).fail(function(jqXHR, statusText, errorThrown){
        console.log("Fail:"+ jqXHR.responseText);
        console.log(errorThrown);
      }).always(function(){

      })
      })

      function getRandomColor(){
        var characters = "0123456789ABCDEF".split('');
        var color = "#";
        for (var i = 0; i < 6; i++) {
          color += characters[Math.floor(Math.random()*16)];
        }
        return color;
      }

      function getRandomColorArray(num){
        var colors = [];
        for (var i = 0; i < num; i++) {
          colors.push(getRandomColor());
        }
        return colors;
      }
    </script>
    <!-- My Script -->
    <script type="text/javascript" src="script.js"></script>
  </div>
</body>
</html>
