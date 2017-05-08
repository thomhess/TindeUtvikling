<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

      <?php if (strpos($_SERVER['REQUEST_URI'], 'tomteomr') == false ): ?>
        <a class="navbar-brand" href="index.php">HJEM</a>

      <?php else: ?>
        <a class="navbar-brand" href="../index.php">HJEM</a>
        
      <?php endif; ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">

      <?php if (strpos($_SERVER['REQUEST_URI'], 'tomteomr') == false ): ?>
        <li><a href="område.php">OMRÅDER</a></li>
        <li><a href="omoss.php">HVEM ER VI</a></li>

      <?php else: ?>
        <li><a href="../område.php">OMRÅDER</a></li>
        <li><a href="../omoss.php">HVEM ER VI</a></li>

      <?php endif; ?>
      </ul>   
      <ul class="nav navbar-nav navbar-right">

      <?php if (strpos($_SERVER['REQUEST_URI'], 'tomteomr') == false ): ?>
        <li id="kontakt-knapp" class="active"><a href="kontakt.php">KONTAKT OSS<span class="sr-only">(current)</span></a></li>

      <?php else: ?>
        <li id="kontakt-knapp" class="active"><a href="../kontakt.php">KONTAKT OSS<span class="sr-only">(current)</span></a></li>

      <?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>