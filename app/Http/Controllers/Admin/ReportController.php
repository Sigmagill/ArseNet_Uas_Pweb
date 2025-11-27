<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;


class ReportController extends Controller
{
    public function customersPdf()
    {
        $customers = User::where('role', 'customer')->get();
        $pdf = Pdf::loadView('admin.reports.customers_pdf', compact('customers'));
        return $pdf->download('laporan-pelanggan.pdf');
    }

    public function ordersPdf()
    {
        $orders = Order::with('user', 'package')->get();
        $pdf = Pdf::loadView('admin.reports.orders_pdf', compact('orders'));
        return $pdf->download('laporan-pesanan.pdf');
    }

    public function paymentsPdf()
    {
        $payments = Payment::with('order.user', 'order.package')->get();
        $pdf = Pdf::loadView('admin.reports.payments_pdf', compact('payments'));
        return $pdf->download('laporan-pembayaran.pdf');
    }


    // ------------------ EXCEL ------------------

    public function customersExcel()
    {
        return Excel::download(new \App\Exports\CustomersExport, 'laporan-pelanggan.xlsx');
    }

    public function ordersExcel()
    {
        return Excel::download(new \App\Exports\OrdersExport, 'laporan-pesanan.xlsx');
    }

    public function paymentsExcel()
    {
        return Excel::download(new \App\Exports\PaymentsExport, 'laporan-pembayaran.xlsx');
    }
}
