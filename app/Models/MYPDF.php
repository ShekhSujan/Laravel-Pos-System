<?php

namespace App\Models;

use TCPDF;

class MYPDF extends TCPDF {
    //Page header
    public function Header() {
        $invoiceSetting=InvoiceSetting::firstOrfail();
        // get the current page break margin
        $bMargin = $this->getBreakMargin();
        // get current auto-page-break mode
        $auto_page_break = $this->AutoPageBreak;
        // disable auto-page-break
        $this->setAutoPageBreak(false, 0);
      //  $img_file = K_PATH_IMAGES . base_path()."/assets/images/invoice.png";
        $img_file = $invoiceSetting->pad;

        $this->Image($img_file, null, 0, 210, 297, '', '', '', false, 300, 'C', false, false, 0);
        // restore auto-page-break status
        $this->setAutoPageBreak($auto_page_break, $bMargin);
        // set the starting point for the page content
        $this->setPageMark();
    }
}
