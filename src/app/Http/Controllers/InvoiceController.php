<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class InvoiceController extends Controller
{
    public function downloadPdf(Order $order)
    {
        $pdf = Pdf::loadView('invoice.invoice', compact('order'));
        return $pdf->download('invoice-'.$order->id.'.pdf');
    }

    public function show($orderCode)
    {
        $order = Order::where('code', $orderCode)->firstOrFail();

        return view('invoice', compact('order'));
    }

}
