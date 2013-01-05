<?php
/* @var $this ClientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clients',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
	array('label'=>'Generate Email List', 'url'=>array('emailList')),
);
?>

<h1>Clients</h1>
<?php //foreach ($dataProvider->data as $data) { ?>
    <?php //echo $data->full ?><br>
<?php //} ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'client-grid',
	'dataProvider'=>$dataProvider,
	//'filter'=>$dataProvider,
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
            'template'=>'{view}',
		),
	),
)); ?>

