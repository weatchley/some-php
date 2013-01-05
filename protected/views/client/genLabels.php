<?php
Yii::import('application.extensions.fpdf.*');
require("fpdf.php");
require("PDF_Label.php");

/*------------------------------------------------
To create the object, 2 possibilities:
either pass a custom format via an array
or use a built-in AVERY name
------------------------------------------------*/

// Example of custom format
// $pdf = new PDF_Label(array('paper-size'=>'A4', 'metric'=>'mm', 'marginLeft'=>1, 'marginTop'=>1, 'NX'=>2, 'NY'=>7, 'SpaceX'=>0, 'SpaceY'=>0, 'width'=>99, 'height'=>38, 'font-size'=>14));

// Standard format
//$pdf = new PDF_Label('L7163');
$pdf = new PDF_Label('5160');

$pdf->AddPage();

// Print labels
foreach ($model as $client) {
	$text = sprintf("%s\n%s\n%s, %s %s", "$client->first_name $client->last_name", "$client->address", "$client->city", "$client->state", "$client->zip");
	$pdf->Add_Label($text);
}

$pdf->Output();
?>
