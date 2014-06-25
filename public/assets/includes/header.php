
  <header>
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="http://mysignoff.co.uk">My Sign Off (BETA)</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-left">
            <li><a href="http://mysignoff.co.uk">Home</a></li>
            <li><a href="http://mysignoff.co.uk">Pricing (TBC)</a></li>
			      <li><a href="http://mysignoff.co.uk/example">Example Form</a></li>
            <li><a href="http://mysignoff.co.uk/example/exampledb.php">Example Database</a></li>
            <?php 
              if(isset($_SESSION['username'])){
                echo "<li><a href='../register/logout.php'>Logout</a></li>";
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
  </header>  