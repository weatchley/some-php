<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Email List',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
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

<h1>Generate Client Email List</h1>

<div class="form">
    <?php echo CHtml::beginForm('genEmailList', 'post', array('name'=>'labelform', 'id'=>'labelform')); ?>
        <div class="row">
            <?php echo CHtml::label('City', 'cityselect', array()); ?>
            <?php echo CHtml::dropDownList('cityselect', '', Client::model()->getCityHash(), array('id'=>'cityselect')); ?>
        </div>
        <div class="row">
            <?php echo CHtml::label('State', 'stateselect', array()); ?>
            <?php echo CHtml::dropDownList('stateselect', '', Client::model()->getStateHash(), array('id'=>'stateselect')); ?>
        </div>
        <div class="row">
            <?php echo CHtml::label('Active', 'activeselect', array()); ?>
            <?php echo CHtml::dropDownList('activeselect', '1', array(0=>'False',1=>'True')); ?>
        </div>
        <?php echo CHtml::submitButton('Submit'); ?>

    <?php echo CHtml::endForm(); ?>
</div><!-- form -->

