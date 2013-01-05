<?php
/* @var $this AssociateController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Associates',
);

$this->menu=array(
	array('label'=>'Create Associate', 'url'=>array('create')),
	array('label'=>'Manage Associate', 'url'=>array('admin')),
);
?>

<h1>Associates</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
