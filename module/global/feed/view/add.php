<?php
$oForm = new plugin_sc_form($this->newFeed);
$oForm->setMessage($this->messageList);
?>
<form class="form-horizontal" action="" method="POST" >

	
	<div class="form-group">
		<label class="col-sm-2 control-label">Titre</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('title',array('class'=>'form-control')) ?></div>
	</div>
		
	<div class="form-group">
		<label class="col-sm-2 control-label">URL</label>
		<div class="col-sm-10"><?php echo $oForm->getInputText('url',array('class'=>'form-control')) ?></div>
	</div>
		
	<?php echo $oForm->getToken('token', $this->token) ?>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" class="btn btn-success" value="Ajouter" /> <a class="btn btn-link" href="<?php echo $this->getLink('global_default::index') ?>">annuler</a>
		</div>
	</div>
</form>
