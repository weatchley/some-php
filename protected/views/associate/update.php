<?php
/* @var $this AssociateController */
/* @var $model Associate */

$this->breadcrumbs=array(
	'Associates'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Associate', 'url'=>array('index')),
	array('label'=>'Create Associate', 'url'=>array('create')),
	array('label'=>'View Associate', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Associate', 'url'=>array('admin')),
);
?>

<h1>Update Associate <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>