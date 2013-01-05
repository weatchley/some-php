<?php
/* @var $this UserPrivController */
/* @var $model UserPriv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-priv-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php //echo $form->textField($model,'company_id'); ?>
        <?php echo $form->dropDownList($model, 'company_id', Company::model()->getList("Select One")); ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php //echo $form->textField($model,'user_id'); ?>
        <?php echo $form->dropDownList($model, 'user_id', User::model()->getList("Select One", true)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'priv_id'); ?>
		<?php //echo $form->textField($model,'priv_id'); ?>
        <?php echo $form->dropDownList($model, 'priv_id', Priv::model()->getList("Select One")); ?>
		<?php echo $form->error($model,'priv_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->