<ul>
    <?php foreach($rss as $item): ?>
    		<li><h3><?php echo $item['title']; ?> </h3></li>
    		<li>Desc:  <?php echo $item['description']; ?> </li>
    		<li>Autor:  <?php echo $item['author']; ?> </li>
    		<li>Fecha: <?php echo $item['pubDate']; ?> </li>
    		<li>Liga:  <?php echo $item['link']; ?> </li>
    <?php endforeach; ?>
</ul>
    
 
