<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
	array('label'=>'Generate Email List', 'url'=>array('emailList')),
	array('label'=>'Full List', 'url'=>array('alphaList')),
);
?>

<h1>Clients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
