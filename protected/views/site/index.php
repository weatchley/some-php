<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to the <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<?php /* ?>
<p>Congratulations! You have successfully created your Yii application.</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
<?php */ ?>
<p>Here is where you will see a list of appointments for today, out standing invoices, etc.</p>
<?php if (Yii::app()->user->isGuest) { ?>
    <p>Please <a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/login">Login</a> to use the system.</p>
<?php } ?>
<p>Links:</p>
<?php if (!Yii::app()->user->isGuest) { ?>

<ul>
    <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/client">Clients</a></li>
    <?php if (!Yii::app()->user->isGuest and Yii::app()->user->hasAdminPriv) { ?>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/calendar">Calendar</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/company">Companies</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/associate">Associates</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/invoice">Invoices</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user">Users</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/location">Locations</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/user">Users</a></li>
        <li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/userPriv">User Priv</a></li>
        <!--li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/testlabels" target="_new">Test Labels</a></li-->
    <?php } ?>
</ul>
<?php /* ?>
    <?php echo "Date: " . date("Y-m-d"); ?>
    <?php echo "Date: " . date("m-d-Y", mktime(0, 0, 0, 1, 1, 1997)); ?><br>
    <?php //echo InvoiceId::model()->getNextInvoiceId(Yii::app()->user->company); ?><br>
<?php $test = Company::model()->getList(); ?>
<p>User Info: Name:<?php echo Yii::app()->user->name; ?>, Company: <?php echo Yii::app()->user->company; ?>, Email: <?php echo Yii::app()->user->email; ?>, <?php echo Yii::app()->user->id; ?>, <?php echo $test[1]; ?>
</p>
<?php $test = Client::model()->getStateList(); ?>
<p>State: <?php echo $test[1]; ?></p>
<?php */ ?>
<?php } ?>

<?php /* ?>
<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>
<?php */ ?>
