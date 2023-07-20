<?php
namespace App\Services;

class JsonService {
    public function convertFromXml($xml) {
        $xmlObject = simplexml_load_string($xml);
        return json_encode($xmlObject);
    }
}
