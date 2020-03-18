<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Lecteur RSS</a>
        </div>

        <ul class="nav navbar-nav">
            <?php foreach($this->linkList as $label => $link):?>
            <li <?php if(_root::getParamNav()==$link):?>class="active"<?php endif;?>><a href="<?php echo _root::getLink($link)?>"><?php echo $label?></a></li>

            <?php endforeach;?>
         </ul>
    </div>
</nav>