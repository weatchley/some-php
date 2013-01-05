<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
	array('label'=>'Generate Email List', 'url'=>array('emailList')),
	array('label'=>'Full List', 'url'=>array('alphaList')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('client-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Clients</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'last_name',
		'first_name',
		'middle_name',
        array(
            'name'=>'active',
            'header'=>'Active',
            'filter'=>array('1'=>'Yes','0'=>'No'),
            'value'=>'($data->active=="1")?("Yes"):("No")'
        ),
		'city',
		'state',
		/*
		'id',
		'company_id',
		'occupation',
		'email',
		'address',
		'zip',
		'phone',
		'cell',
		'fax',
		'last_seen',
		'location_id',
		'notes',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
		),
	),
)); ?>
