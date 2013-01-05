<?php
/* @var $this InvoiceController */
/* @var $model Invoice */

$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Invoice', 'url'=>array('index')),
	array('label'=>'Create Invoice', 'url'=>array('create')),
	array('label'=>'Update Invoice', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Invoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Invoice', 'url'=>array('admin')),
);
?>

<h1>View Invoice #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		//'company_id',
        array(
            'label'=>'Company',
            'type'=>'raw',
            'value'=>CHtml::encode(Company::model()->findByPk($model->company_id)->company_name),
        ),
		'invoice_id',
		//'client_id',
        array(
            'label'=>'Client',
            'type'=>'raw',
            'value'=>CHtml::encode(Client::model()->getFullName(Client::model()->findByPk($model->client_id))),
        ),
		'invoice_date',
		'status',
		'data',
	),
)); ?>
