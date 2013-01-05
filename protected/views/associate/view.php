<?php
/* @var $this AssociateController */
/* @var $model Associate */

$this->breadcrumbs=array(
	'Associates'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Associate', 'url'=>array('index')),
	array('label'=>'Create Associate', 'url'=>array('create')),
	array('label'=>'Update Associate', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Associate', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Associate', 'url'=>array('admin')),
);
?>

<h1>View Associate #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'company_id',
		'user_id',
	),
)); ?>
