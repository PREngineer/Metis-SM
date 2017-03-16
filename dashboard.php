<?php
// Initialize Session
include 'Session/init.php';

$cpuload = getCPULoad();
$ramuse = getRAMUse();
$networkthroughput = getNetworkThroughput();
$diskuse = getDiskUse();
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

          <!-- Start First Row -->
          <!-- Get the CPU Info -->
          <div class="row placeholders">

            <div class="col-xs-6 col-sm-3 placeholder" title="CPU Use">
              <div class="c100 p<?php echo $cpuload;?>">
                    <span><?php echo $cpuload;?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <span class="glyphicon glyphicon-scale"></span>
            </div>

            <!-- Get the RAM Info -->
            <div class="col-xs-6 col-sm-3 placeholder" title="RAM Use">
              <div class="c100 p<?php echo $ramuse;?>">
                    <span><?php echo $ramuse;?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <span class="glyphicon glyphicon-oil"></span>
            </div>

            <!-- Get the Net Download Info -->
            <div class="col-xs-6 col-sm-3 placeholder" title="Network Use">
              <span class="glyphicon glyphicon-signal pull-right"></span>
              <br>
              <div>
              <h3>
                <span class="glyphicon glyphicon-download"></span>
                <?php echo round( ($networkthroughput['rx']) / (1024*1024) );?> MB
              </h3>
              </div>
              <div>
              <h3>
                <span class="glyphicon glyphicon-upload"></span>
                <?php echo round( ($networkthroughput['tx']) / (1024*1024) );?> MB
              </h3>
              </div>
            </div>

          <!-- Get the Hard Disk Space Info -->
            <div class="col-xs-6 col-sm-3 placeholder" title="Hard Disk Use">
              <div class="c100 p<?php echo $diskuse?>">
                    <span><?php echo $diskuse?>%</span>
                    <div class="slice">
                        <div class="bar"></div>
                        <div class="fill"></div>
                    </div>
              </div>
              <span class="glyphicon glyphicon-hdd"></span>
            </div>

          </div>
          <!-- End First Row -->

          <!-- Start Second Row -->
          <!-- End Second Row -->

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
