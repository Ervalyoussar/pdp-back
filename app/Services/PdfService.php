<?php
namespace App\Services;

class PdfService {
    public function fileExists($path) {
        return file_exists($path);
    }
}

public function extractXml($path) {
    // Suppose que vous utilisez Smalot\PdfParser
    $parser = new \Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($path);

    // Extraire le XML comme vous le souhaitez
    // $xml = ...
    
    return $xml;
}
