<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show($id) {
        $invoice = Invoice::find($id);
        return response()->json($invoice->json_data);
    }


public function downloadAsPdf($id) {
    $invoice = Invoice::find($id);
    // Utilisez votre bibliothèque préférée pour créer un PDF
    // $pdf = ...

    return response()->download($pdf);
}

public function downloadAsXml($id) {
    $invoice = Invoice::find($id);
    // Convertissez les données JSON en XML comme vous le souhaitez
    // $xml = ...

    return response()->download($xml);
}
}