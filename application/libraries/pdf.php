<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');

class Pdf
{
    public function createPDF($html, $filename = '', $paper = 'A4', $orientation = 'portrait')
    {
        $dompdf = new Dompdf\DOMPDF();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        return $dompdf->output();
    }
}
