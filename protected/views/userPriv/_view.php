<?php
/* @var $this UserPrivController */
/* @var $data UserPriv */
?>
<?php
    $userList = User::model()->getList("none");
    $compList = Company::model()->getList("none");
    $privList = Priv::model()->getList("none");
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('company_id')); ?>:</b>
	<?php //echo CHtml::encode($data->company_id); ?>
	<?php echo CHtml::encode($compList[$data->company_id]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php //echo CHtml::encode($data->user_id); ?>
	<?php echo CHtml::encode($userList[$data->user_id]); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('priv_id')); ?>:</b>
	<?php //echo CHtml::encode($data->priv_id); ?>
	<?php echo CHtml::encode($privList[$data->priv_id]); ?>
	<br />


</div>