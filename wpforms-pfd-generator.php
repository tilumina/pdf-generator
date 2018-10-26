<?php
/*
Plugin Name: WPForms PDF Generator
Description: Plugin that extends functionallity of WPForms and extraxts all entry data to a PDF, so you can attach it at a confirmation mail.
Version: 1.0
Author: Tetyana Yavorska
*/

function wpforms_generate_pdf ($form_data)
{
require('fpdm.php');

$pdf = new FPDM('template.pdf');
$pdf->Load($form_data, false); // second parameter: false if field values are in ISO-8859-1, true if UTF-8
$pdf->Merge();
$pdf->Output();

}

add_action('wpforms_process','wpforms_generate_pdf');
do_action('wpforms_process', $form_data);
