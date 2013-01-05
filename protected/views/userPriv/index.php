<?php
/* @var $this UserPrivController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Privs',
);

$this->menu=array(
	array('label'=>'Create UserPriv', 'url'=>array('create')),
	array('label'=>'Manage UserPriv', 'url'=>array('admin')),
);
?>

<h1>User Privs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
