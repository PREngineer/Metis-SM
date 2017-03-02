<!-- Start Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <!-- Start Collapsed NavBar -->
    <div class="navbar-header pull-left">
      <!-- Start Hamburger -->
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- End Hamburger -->
      <a class="navbar-brand" href="dashboard.php"><img src="Branding/logo-30.png" alt="Metis Server Manager - Logo"></a>
    </div>
    <!-- End Collapsed NavBar -->
    <!-- Start Expanded NavBar -->
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        
        <li class="active"><a href="dashboard.php" title="System Dashboard" style="color:#777; margin-top: 5px;">Dashboard</a></li>
        
        <!-- Active Servers drop-down from an icon -->
        <li class="dropdown">
          <a href=""  title="Active Servers" style="color:#777; margin-top: 5px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-tasks"></span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="" title="">Action</a></li>
            <li><a href="" title="">Another action</a></li>
            <li><a href="" title="">Something else here</a></li>
            
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            
            <li><a href="" title="">Separated link</a></li>
            <li><a href="" title="">One more separated link</a></li>
          </ul>
        </li>

        <!-- Settings drop-down from an icon -->
        <li class="dropdown">
          <a href=""  title="Settings" style="color:#777; margin-top: 5px;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-cog"></span>
            <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="" title="">Action</a></li>
            <li><a href="" title="">Another action</a></li>
            <li><a href="" title="">Something else here</a></li>
            
            <li role="separator" class="divider"></li>
            <li class="dropdown-header">Nav header</li>
            
            <li><a href="" title="">Separated link</a></li>
            <li><a href="" title="">One more separated link</a></li>
          </ul>
        </li>
        
        <!-- Account drop-down from an icon -->
        <li class="dropdown">
          <a href="" title="Account Options" data-toggle="dropdown" style="color:#777; margin-top: 5px;" class="dropdown-toggle">
            <span class="glyphicon glyphicon-user"></span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="" title="Account Settings"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
            <li><a href="Session/logout.php" title="Logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </li>

        <!-- Help drop-down from an icon -->
        <li class="dropdown">
          <a href="" title="Help" data-toggle="dropdown" style="color:#777; margin-top: 5px;" class="dropdown-toggle">
            <span class="glyphicon glyphicon-question-sign"></span>
            <b class="caret"></b>
          </a>
          <ul class="dropdown-menu">
            <li><a href="" title="Contact Us"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
            <li><a href="" title="About Metis Server Manager"><span class="glyphicon glyphicon-question-sign"></span> About</a></li>
          </ul>
        </li>

        <!-- Refresh page icon -->
        <li>
          <a href="<?php echo $_SERVER["REQUEST_URI"]; ?>"  title="Refresh Page" style="color:#777; margin-top: 5px;" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
            <span class="glyphicon glyphicon-refresh"></span>
          </a>
        </li>
      </ul>
    </div>
    <!-- End Expanded NavBar -->
  </div>
</nav>
<!-- End Fixed navbar -->
