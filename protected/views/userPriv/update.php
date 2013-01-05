<?php
/* @var $this UserPrivController */
/* @var $model UserPriv */

$this->breadcrumbs=array(
	'User Privs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserPriv', 'url'=>array('index')),
	array('label'=>'Create UserPriv', 'url'=>array('create')),
	array('label'=>'View UserPriv', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserPriv', 'url'=>array('admin')),
);
?>

<h1>Update UserPriv <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>