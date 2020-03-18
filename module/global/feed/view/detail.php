<h2><?php echo $this->title?></h2>
<p><?php echo $this->description?></p>

<?php foreach($this->itemList as $item):?>

    <div class=" col-md-12">
        <div class="thumbnail">
         <div class="caption">
            <h3><?php echo $item->title?></h3>
            <p><?php echo $item->description?></p>
            <p><a href="<?php echo $item->link?>" class="btn btn-primary" role="button">Voir plus..</a></p>
        </div>
        </div>
    </div>

<?php endforeach;?>
 