<?php
// Initialize Session
include 'Session/init.php';

$p1=75;
$p2=99;
$p3=15;
$p4=51;
?>

<!DOCTYPE html>
<html lang="en">

<?php
// Include the header
include 'Design/head.php';
?>
<!-- Refresh the Dashboard every x second(s) -->
<meta http-equiv="refresh" content="10" > 

  <body>

<?php
// Include the navbar
include 'Design/navbar.php';
?>

    <!-- Begin page content -->
    <div class="container-fluid">
      <div class="row">

        <!-- Start Left Column -->
        <?php
        // Include the navbar
        include 'Design/navbar2.php';
        ?>
        <!-- End Left Column -->

        
        <!-- Start Right Column -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          
          <!-- Start Breadcrumbs -->
          <!--<ol class="breadcrumb">
            <li class="active">Dashboard</li>
            <li></li>
          </ol>-->
          <!-- End Breadcrumbs -->
          <br><br>
          <h1 class="page-header">
            System Overview
            <!-- Refresh page icon -->
            <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>" title="Refresh Page">
              <span class="glyphicon glyphicon-refresh"></span>
            </a>
          </h1>

          <!-- Get the CPU Info -->
          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="c100 p<?php echo getCPULoad();?>">
                    <span><?php echo getCPULoad();?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <h4 class="col-xs-6 col-sm-3 placeholder">-CPU-</h4>
            </div>
            
            <!-- Get the RAM Info -->
            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="c100 p<?php echo getRAMUse();?>">
                    <span><?php echo getRAMUse();?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <h4 class="col-xs-6 col-sm-3 placeholder">-RAM-</h4>
            </div>

            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="c100 p<?php echo $p3;?>">
                    <span><?php echo $p3;?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <h4 class="col-xs-6 col-sm-3 placeholder">-Net-</h4>
            </div>

            <div class="col-xs-6 col-sm-3 placeholder">
              <div class="c100 p<?php echo getDiskUse();?>">
                    <span><?php echo getDiskUse();?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <h4 class="col-xs-6 col-sm-3 placeholder">-HDD-</h4>
            </div>
          </div>

          <h2 class="sub-header">Server Status</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                  <th>Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>Lorem</td>
                  <td>ipsum</td>
                  <td>dolor</td>
                  <td>sit</td>
                </tr>
              </tbody>
            </table>
          </div>
          <br><br>
        </div>
      </div>
    </div>
    <!-- End Right Column -->

<?php
// Include the footer
include 'Design/footer.php';
?>

  </body>
</html>
