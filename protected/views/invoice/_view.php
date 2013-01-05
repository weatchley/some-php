<?php
/* @var $this InvoiceController */
/* @var $data Invoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php echo CHtml::encode(Company::model()->findByPk($data->company_id)->company_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_id')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('client_id')); ?>:</b>
	<?php echo CHtml::encode(Client::model()->getFullName(Client::model()->findByPk($data->client_id))); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoice_date')); ?>:</b>
	<?php echo CHtml::encode($data->invoice_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('data')); ?>:</b>
	<?php echo CHtml::encode($data->data); ?>
	<br />


</div>