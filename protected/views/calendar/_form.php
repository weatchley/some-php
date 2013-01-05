<?php
/* @var $this CalendarController */
/* @var $model Calendar */
/* @var $form CActiveForm */
?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'calendar-form',
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
		<?php echo $form->labelEx($model,'client_id'); ?>
		<?php echo $form->textField($model,'client_id'); ?>
		<?php echo $form->error($model,'client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'showed_up'); ?>
		<?php //echo $form->textField($model,'showed_up'); ?>
        <?php echo $form->dropDownList($model, 'showed_up', array(0=>'False',1=>'True')); ?>
		<?php echo $form->error($model,'showed_up'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php //echo $form->dateField($model,'event_date'); ?>
        <?php
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'name'=>'event_date',
                // additional javascript options for the date picker plugin
                'options'=>array(
                    'showAnim'=>'fold',
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;'
                ),
            ));       
        ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'begin'); ?>
		<?php //echo $form->textField($model,'begin'); ?>
        <?php
         $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
            'model'=>$model,
             'attribute'=>'begin',
             // additional javascript options for the date picker plugin
             'options'=>array(
                 'showPeriod'=>true,
                 ),
             'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
         ));
        ?>
		<?php echo $form->error($model,'begin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end'); ?>
		<?php //echo $form->textField($model,'end'); ?>
        <?php
         $this->widget('application.extensions.jui_timepicker.JTimePicker', array(
            'model'=>$model,
             'attribute'=>'end',
             // additional javascript options for the date picker plugin
             'options'=>array(
                 'showPeriod'=>true,
                 ),
             'htmlOptions'=>array('size'=>8,'maxlength'=>8 ),
         ));
        ?>
		<?php echo $form->error($model,'end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notes'); ?>
		<?php echo $form->textArea($model,'notes',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'notes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->