<?php
/* @var $this CalendarController */
/* @var $data Calendar */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode($data->company_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode($data->client_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('showed_up')); ?>:</b>
	<?php echo CHtml::encode($data->showed_up); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_date')); ?>:</b>
	<?php echo CHtml::encode($data->event_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('begin')); ?>:</b>
	<?php echo CHtml::encode($data->begin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end')); ?>:</b>
	<?php echo CHtml::encode($data->end); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('notes')); ?>:</b>
	<?php echo CHtml::encode($data->notes); ?>
	<br />

	*/ ?>

</div>