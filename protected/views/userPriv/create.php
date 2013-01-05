<?php
/* @var $this UserPrivController */
/* @var $model UserPriv */

$this->breadcrumbs=array(
	'User Privs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserPriv', 'url'=>array('index')),
	array('label'=>'Manage UserPriv', 'url'=>array('admin')),
);
?>

<h1>Create UserPriv</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>