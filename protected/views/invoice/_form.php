<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'company_id'); ?>
		<?php echo $form->hiddenField($model,'company_id'); ?>
        <?php echo Company::model()->findByAttributes(array('id'=>Yii::app()->user->company))->company_name; ?>
		<?php echo $form->error($model,'company_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_id'); ?>
		<?php echo $form->textField($model,'invoice_id'); ?>
		<?php echo $form->error($model,'invoice_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php //echo $form->textField($model,'client_id'); ?>
        <?php echo $form->dropDownList($model, 'client_id', Client::model()->getList("Select One",Yii::app()->user->company)); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invoice_date'); ?>
		<?php //echo $form->textField($model,'invoice_date'); ?>
        <?php 
            $form->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'invoice_date',
                'options'=>array(
                    'showAnim'=>'fold',
                    'dateFormat'=>'yy-mm-dd',
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;'
                ),
            )); 
        ?>
		<?php echo $form->error($model,'invoice_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->textField($model,'status',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->dropDownList($model, 'status', array('open'=>'Open','closed'=>'Closed')); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'data'); ?>
		<?php echo $form->textArea($model,'data',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'data'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->