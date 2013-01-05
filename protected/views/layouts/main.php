<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

    <?php include 'initStates.php'; ?>
    <?php if (!Yii::app()->user->isGuest and !Yii::app()->user->sessionActive) { ?>
        <script type="text/javascript">
          document.location = '<?php echo Yii::app()->request->baseUrl; ?>/index.php/site/logout';
        </script>
    <?php } ?>

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->
    
	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Clients', 'url'=>array('/client'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Invoices', 'url'=>array('/invoice'), 'visible'=>(!Yii::app()->user->isGuest and Yii::app()->user->hasAdminPriv)),
				array('label'=>'Users', 'url'=>array('/user'), 'visible'=>(!Yii::app()->user->isGuest and Yii::app()->user->hasAdminPriv)),
				array('label'=>'User Priv', 'url'=>array('/userPriv'), 'visible'=>(!Yii::app()->user->isGuest and Yii::app()->user->hasAdminPriv)),
				array('label'=>'Logout ('.Yii::app()->user->name.' of '.((!Yii::app()->user->isGuest) ? Yii::app()->user->companyName : "").')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <!--a href="http://www.golden-op.com">Golden Opportunities.</a--><br/>
        <a href="http://www.golden-op.com"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/GO_button.GIF" border=0></a><br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?><br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
