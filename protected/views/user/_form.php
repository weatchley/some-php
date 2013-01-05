<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
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
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php //echo $form->textField($model,'active'); ?>
        <?php echo $form->dropDownList($model, 'active', array(0=>'False',1=>'True')); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'failed_login_count'); ?>
		<?php echo $form->textField($model,'failed_login_count'); ?>
		<?php echo $form->error($model,'failed_login_count'); ?>
	</div>

	<!--div class="row">
		<?php //echo $form->labelEx($model,'last_attempt'); ?>
		<?php //echo $form->textField($model,'last_attempt'); ?>
		<?php //echo $form->error($model,'last_attempt'); ?>
	</div-->

	<div class="row">
		<?php echo $form->labelEx($model,'security_question'); ?>
		<?php echo $form->textField($model,'security_question',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'security_question'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'security_answer'); ?>
		<?php echo $form->textField($model,'security_answer',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'security_answer'); ?>
	</div>

	<!--div class="row">
		<?php //echo $form->labelEx($model,'last_login'); ?>
		<?php //echo $form->textField($model,'last_login'); ?>
		<?php //echo $form->error($model,'last_login'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'date_created'); ?>
		<?php //echo $form->textField($model,'date_created'); ?>
		<?php //echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'date_canceled'); ?>
		<?php //echo $form->textField($model,'date_canceled'); ?>
		<?php //echo $form->error($model,'date_canceled'); ?>
	</div-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->