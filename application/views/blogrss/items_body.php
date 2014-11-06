
<?php if($count > 0): ?>
    <div class="container">
    <?php foreach ($news as $key=>$new): ?>
    
        <?php if($key%2 == 0): ?> <div class="row"> <?php endif; ?>
    
        <div class="col-lg-6">
          <hr/>
          <h2><?php echo $new->titulo; ?></h2>
          <p><?php echo $new->descripcion; ?></p>
          <p><a class="btn btn-default" href="<?php echo $new->link; ?>" target="_blank" role="button">Abrir Noticia &raquo;</a></p>
        </div><!-- /.col-lg-6 -->
        
        <?php if($key%2 == 1): ?> </div> <!-- /.row --> <?php endif; ?>
        
    <?php endforeach; ?>
    </div><!-- /.container -->
    
    <ul class="pager">
      <li><a href="<?php echo base_url() . "?page=" . ($page - 1) ; ?>">Nuevos</a></li>
      <li><a href="<?php echo base_url() . "?page=" . ($page + 1) ; ?>">Anteriores</a></li>
    </ul>
<?php else: ?>
    <h1> No se encontraron resultados </h1>
<?php endif; ?>