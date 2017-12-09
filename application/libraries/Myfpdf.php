<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('fpdf/fpdf.php');
/**
 * Created by PhpStorm.
 * User: tient
 * Date: 09/12/2017
 * Time: 8:43
 */
class Myfpdf extends FPDF{
    function __construct($orientation = 'P', $unit = 'mm', $size = 'A4')
    {
        parent::__construct($orientation, $unit, $size);
    }
}