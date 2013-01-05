<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
	array('label'=>'Generate Email List', 'url'=>array('emailList')),
	array('label'=>'Full List', 'url'=>array('alphaList')),
);
?>

<h1>Create Client</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>