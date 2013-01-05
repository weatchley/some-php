<?php
    $stateIsSet = false;
    try {
        $value = Yii::app()->user->hasAdminPriv;
        $stateIsSet = true;
    }
    catch (Exception $e) {
    }
    if (Yii::app()->user->isGuest or !$stateIsSet) {
        Yii::app()->user->setState('email', '');
        Yii::app()->user->setState('hasAdminPriv', false);
        Yii::app()->user->setState('isCompanyOwner', false);
        Yii::app()->user->setState('companyName', '');
    }

?>
