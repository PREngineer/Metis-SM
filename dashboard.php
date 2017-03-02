<?php
// Initialize Session
include 'Session/init.php';
?>

<!DOCTYPE html>
<html lang="en">

<?php
// Include the header
include 'Design/head.php';
?>

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
          <h1 class="page-header">System Overview</h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Graph-1</h4>
              <span class="text-muted">This graph is about something in the server.</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Graph-2</h4>
              <span class="text-muted">This graph is about something in the server.</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Graph-3</h4>
              <span class="text-muted">This graph is about something in the server.</span>
            </div>
            <div class="col-xs-6 col-sm-3 placeholder">
              <img src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" width="200" height="200" class="img-responsive" alt="Generic placeholder thumbnail">
              <h4>Graph-4</h4>
              <span class="text-muted">This graph is about something in the server.</span>
            </div>
          </div>

          <h2 class="sub-header">Servers Status</h2>
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
