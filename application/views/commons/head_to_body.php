</head><body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Invertir Navegación</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Blog-Rss</a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav ">
        <li class="active"><a href="<?php echo base_url(); ?>">Inicio</a></li>
        <li><a href="<?php echo site_url("info"); ?>">Información</a></li>
      </ul>
      <div class="navbar-form navbar-right">
        <a href="<?php echo site_url("login"); ?>" class="btn btn-primary " role="button"> Entrar </a>
      </div>
	<form class="navbar-form" method="get">
        <div class="form-group" style="display:inline;">
          <div class="input-group">
            <input type="text" name="text" class="form-control">
            <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
          </div>
        </div>
      </form>
	</div><!--/.nav-collapse -->
  </div>
</nav>



