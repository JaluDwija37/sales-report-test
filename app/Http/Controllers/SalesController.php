<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerAlamat;
use App\Models\Sales;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        $customers = Customer::all(); // Retrieve all customers
        return view('sales', ['customers' => $customers]);
    }

    public function getSalesData(Request $request)
    {
        if ($request->ajax()) {
            $customerId = $request->input('id');

            // Get all customer addresses
            $addresses = CustomerAlamat::query()
                ->where('customer_id', $customerId)
                ->pluck('customer_alamat');

            // Get sales data from the last year
            $oneYearAgo = Carbon::now()->subYear();
            $sales = Sales::query()
                ->where('customer_id', $customerId)
                ->where('created_at', '>=', $oneYearAgo)
                ->get();

            // Format the addresses into a list
            $alamatData = $addresses->isEmpty() ? 'No address available.' : "<div class='flex flex-col gap-3'>";
            foreach ($addresses as $address) {
                $alamatData .= "<div class='px-3 w-full py-2 border-green-400 border-2'>$address</div>";
            }
            $alamatData .= $addresses->isNotEmpty() ? '</div>' : '';

            // Format the sales data
            $salesData = '';
            foreach ($sales as $sale) {
                $salesData .= "<div class='px-3 w-full py-2 border-red-400 border-2'>Sale ID: $sale->idstruct  - Total:  $sale->total_sales </div>";
            }
            $salesData = $salesData ?: 'No sales found.';

            return response()->json([
                'alamat' => $alamatData,
                'penjualan' => $salesData,
            ]);
        }
    }
}
