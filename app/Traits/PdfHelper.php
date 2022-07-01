<?php

namespace App\Traits;

use App\Constants\GeneralConstants;
use Barryvdh\DomPDF\Facade as PDF;

/**
 * Trait PdfHelper
 * @package App\Traits
 */
trait PdfHelper
{
    /**
     * @param $payload
     * @param $pdfName
     *
     * @return string
     */
    protected function generatePDF($payload, $pdfName)
    {
        $storagePath = storage_path(GeneralConstants::PDF_PATH);
        if (!(file_exists($storagePath) && is_dir($storagePath))) {
            mkdir($storagePath, 0777);
        }

        $pdf = PDF::loadView('pdf.bill-generation-attachment', $payload);
        $pdf->save($storagePath . $pdfName);
        $pdfPath = storage_path() . '/' . GeneralConstants::PDF_PATH . $pdfName;
        return $pdfPath;
    }
}
