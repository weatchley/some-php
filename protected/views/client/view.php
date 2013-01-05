<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Update Client', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Delete Client', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
	array('label'=>'Full List', 'url'=>array('alphaList')),
);
?>

<h1>View Client #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'company_id',
		'last_name',
		'first_name',
		'middle_name',
		//'active',
        array(
            'label'=>'Active',
            'type'=>'raw',
            'value'=>CHtml::encode((($model->active) ? "Yes" : "No")),
        ),
		'occupation',
		'email',
		'address',
		'city',
		'state',
		'zip',
		'phone',
		'cell',
		'fax',
		'last_seen',
		//'location_id',
		'notes',
	),
)); ?>

<!--br><h2>Invoice List</h2-->


<?php /*
    $dataProvider=new CActiveDataProvider('Invoice',
        'criteria'=>array(
            'condition'=>'client_id=$model->id',
            'order'=>'invoice_id DESC',
        ),
        'pagination'=>array(
            'pageSize'=>20,
        ),
    ); */
?>

<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'invoice-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
		'invoice_id',
		'invoice_date',
		'status',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{update}',
		),
	),
)); */?>

