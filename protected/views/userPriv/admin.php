<?php
/* @var $this UserPrivController */
/* @var $model UserPriv */

$this->breadcrumbs=array(
	'User Privs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List UserPriv', 'url'=>array('index')),
	array('label'=>'Create UserPriv', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-priv-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage User Privs</h1>

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
<?php
    $userList = User::model()->getList("none");
    $compList = Company::model()->getList("none");
    $privList = Priv::model()->getList("none");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-priv-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'company_id',
        /*array(
            'name'=>'company_id',
            'header'=>'Company',
            'value'=>'$compList[$data->company_id]'
        ),*/
		'user_id',
        /*array(
            'name'=>'user_id',
            'header'=>'User',
            'value'=>'$userList[$data->user_id]'
        ),*/
		'priv_id',
        /*array(
            'name'=>'priv_id',
            'header'=>'Priv',
            'value'=>'$privList[$data->user_id]'
        ),*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
