<?php
/* @var $this UserPrivController */
/* @var $model UserPriv */

$this->breadcrumbs=array(
	'User Privs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserPriv', 'url'=>array('index')),
	array('label'=>'Create UserPriv', 'url'=>array('create')),
	array('label'=>'Update UserPriv', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserPriv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserPriv', 'url'=>array('admin')),
);
?>

<h1>View UserPriv #<?php echo $model->id; ?></h1>

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
		//'user_id',
        array(
            'label'=>'User',
            'type'=>'raw',
            'value'=>CHtml::encode(User::model()->findByPk($model->user_id)->username),
        ),
		//'priv_id',
        array(
            'label'=>'User',
            'type'=>'raw',
            'value'=>CHtml::encode(Priv::model()->findByPk($model->priv_id)->description),
        ),
	),
)); ?>
