<?php
    $stateIsSet = false;
    try {
        $value = Yii::app()->user->hasAdminPriv;
        $stateIsSet = true;
        Yii::app()->user->setState('sessionActive', true);
    }
    catch (Exception $e) {
        Yii::app()->user->setState('sessionActive', false);
    }
    if (Yii::app()->user->isGuest or !$stateIsSet) {
        Yii::app()->user->setState('email', '');
        Yii::app()->user->setState('hasAdminPriv', false);
        Yii::app()->user->setState('isCompanyOwner', false);
        Yii::app()->user->setState('companyName', '');
        Yii::app()->user->setState('sessionActive', false);
    }

?>
