<ul class="list-group">
<?php if($this->feedList):?>
    <?php foreach($this->feedList as $feed):?>
        <li class="list-group-item">
            <?php echo $feed->title?>
            <a href="<?php echo _root::getLink(
                                'global_feed::read',
                                array('id'=>$feed->id)
                                )?>">Lire</a>
        </li>
    <?php endforeach;?>
<?php endif;?>
</ul>
