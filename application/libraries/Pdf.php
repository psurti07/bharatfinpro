<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(dirname(__FILE__).'/dompdf/autoload.inc.php');

use Dompdf\Dompdf;

class Pdf extends Dompdf{
    function createPDF($html, $filename='', $download=TRUE, $paper='A4', $orientation='portrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
    }

    function mailPDF($html, $filename='', $paper='A4', $orientation='portrait'){
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);
        $dompdf->render();
        $file = $dompdf->output();
        return $file;
    }
}
?>