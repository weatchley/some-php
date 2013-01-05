<?php
/* @var $this AssociateController */
/* @var $model Associate */

$this->breadcrumbs=array(
	'Associates'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Associate', 'url'=>array('index')),
	array('label'=>'Manage Associate', 'url'=>array('admin')),
);
?>

<h1>Create Associate</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>