<?php
/* @var $this ClientController */
/* @var $model Client */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Email List',
);

$this->menu=array(
	array('label'=>'List Client', 'url'=>array('index')),
	array('label'=>'Create Client', 'url'=>array('create')),
	array('label'=>'Manage Client', 'url'=>array('admin')),
	array('label'=>'Generate Labels', 'url'=>array('labels')),
	array('label'=>'Generate Email List', 'url'=>array('emailList')),
);

?>

<h1>Email List</h1>
<p>Copy the list below into the "BCC:" field of your email program.  <br>
It is nevery a good idea to put your mailing list in the "To:" or "CC:" fields of your email program since everyone on the list now has a copy of your mailing list and if any of their computers has a virus, you may put your list up for SPAM.</p>

<div class="form">
    <?php
        $emailList = "";
        $isFirst = true;
        foreach ($model as $client) {
            if ($client->email != null and $client->email > " " and strtolower($client->email) != "n/a" and strtolower($client->email) != "na") {
                $emailList = $emailList . (($isFirst) ? "" : "; ") . $client->email;
                $isFirst = false;
            }
        }
    ?>
    <!--table border=1 cellspacing=0 cellpadding=4><tr><td><?php //echo $emailList; ?></td></tr></table-->
    <?php echo CHtml::beginForm('listform'); ?>
        <?php echo CHtml::textArea('emaillist', $emailList, array('name'=>'listbox', 'onfocus'=>'this.select()', 'onclick'=>'this.select()', 'cols'=>'80', 'rows'=>'10', 'selected'=>true)); ?>
    <?php echo CHtml::endForm(); ?>

</div><!-- form -->

