<div class="container-fluid">
  <div class="row">
    <footer class="footer">
      <div class="container">
        <p class="text-muted pull-right">
          Metis Server Manager -
          <?php

          print $metisVersion['short'];

          ?>
          <br>
          © 2015
          <?php
          if(date('Y') > 2015)
                {
                  echo ' - ' . date('Y');
                }
          ?>
          Jorge Pabón [PREngineer]
        </p>
      </div>
    </footer>
  </div>
</div>