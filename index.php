<?php
$con = mysqli_connect("localhost","root","","iskugee");
if(!$con){
die("Connection Failed:".mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Calculate Sum of Column in PHP MYSQL</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="row">
    <div class="col-md-8 offset-md-2">
      <div class="card">
      <div class="card-header bg">
        <h1>Calculate Sum of Column in PHP MYSQL</h1>
      </div>
          <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Product Name</th>
                <th>Sales</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $con->query("SELECT * FROM tblsales");
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){?>
                <tr>
                  <td><?php echo $row['product'];?></td>
                  <td><?php echo $row['totalsales'];?></td>
                </tr>
                <?php
              }
            }
            else{?>
              <tr>
                <td colspan="7">No data Found...</td>
              </tr>
            </tbody>
            <?php } ?>
          </table>
        
          <?php
          $results = mysqli_query($con, "SELECT count(totalsales) FROM tblsales") or die(mysqli_error());
          while($rows = mysqli_fetch_array($results)){?>
          Total Sales: <?php echo $rows['count(totalsales)']; ?>
<?php
          }
          ?>
          </div>
      </div>
    </div>
  </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>