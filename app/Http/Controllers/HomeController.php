<?php

namespace App\Http\Controllers;

use App\Models\PurchaseOrder;
use App\Models\SalesOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Analytic Dashboard
     */
   


     public function index()
     {
         $breadcrumbsItems = [
             ['name' => 'Home', 'url' => '/', 'active' => true],
         ];
     
         $data['revenue'] = SalesOrder::sum('grandtotal');
         $data['productSold'] = SalesOrder::sum('total_qty');
         $data['completeTransaction'] = SalesOrder::where('status', 'completed')->count();
     
         $data['solastWeekRevenue'] = SalesOrder::whereBetween('created_at', [now()->subDays(7), now()])->sum('grandtotal');
         $data['sogrowth'] = $data['solastWeekRevenue'] != 0
             ? ($data['revenue'] - $data['solastWeekRevenue']) / $data['solastWeekRevenue'] * 100
             : 0;
         $data['sogrowth'] = number_format($data['sogrowth'], 0);
     
         $data['polastWeekRevenue'] = PurchaseOrder::whereBetween('created_at', [now()->subDays(7), now()])->sum('grand_total');
         $data['pogrowth'] = $data['polastWeekRevenue'] != 0
             ? ($data['revenue'] - $data['polastWeekRevenue']) / $data['polastWeekRevenue'] * 100
             : 0;
         $data['pogrowth'] = number_format($data['pogrowth'], 0);
     
         $data['earning'] = $data['revenue'] - PurchaseOrder::sum('grand_total');
     
         // Ambil data SO & PO dalam 7 hari terakhir
         $salesData = SalesOrder::select(
                 DB::raw("DATE(created_at) as date"),
                 DB::raw("DAYOFWEEK(created_at) as day_index"),
                 DB::raw("SUM(grandtotal) as total_sales")
             )
             ->whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()])
             ->groupBy('date', 'day_index')
             ->orderBy('date', 'ASC')
             ->get();
     
         $purchaseData = PurchaseOrder::select(
                 DB::raw("DATE(created_at) as date"),
                 DB::raw("DAYOFWEEK(created_at) as day_index"),
                 DB::raw("SUM(grand_total) as total_purchases")
             )
             ->whereBetween('created_at', [now()->subDays(6)->startOfDay(), now()->endOfDay()])
             ->groupBy('date', 'day_index')
             ->orderBy('date', 'ASC')
             ->get();
     
         // Format hari dalam bahasa Indonesia
         $daysIndo = [
             1 => 'Minggu',
             2 => 'Senin',
             3 => 'Selasa',
             4 => 'Rabu',
             5 => 'Kamis',
             6 => 'Jumat',
             7 => 'Sabtu'
         ];
     
         // Buat template default untuk semua hari
         $weeklyReport = collect();
         for ($i = 1; $i <= 7; $i++) { // Senin - Minggu (1-7)
             $weeklyReport->push([
                 'day' => $daysIndo[$i],
                 'sales' => 0,
                 'purchases' => 0
             ]);
         }
         
       // Masukkan data yang ada
$weeklyReport = $weeklyReport->map(function ($item, $index) use ($salesData, $purchaseData) {
    // Find matching sales data for the current day
    $sales = $salesData->firstWhere('day_index', $index + 1);
    if ($sales) {
        $item['sales'] = $sales->total_sales;
    }

    // Find matching purchase data for the current day
    $purchase = $purchaseData->firstWhere('day_index', $index + 1);
    if ($purchase) {
        $item['purchases'] = $purchase->total_purchases;
    }

    return $item;
});
         // Simpan ke variabel untuk dikirim ke view
         $data['dailyReport'] = $weeklyReport;
     
         return view('Index', [
             'pageTitle' => 'Dashboard',
             'breadcrumbItems' => $breadcrumbsItems
         ], $data);
     }
     
     

    /**
     * Ecommerce Dashboard
     */
    public function ecommerceDashboard()
    {
        $chartData = [
            'revenueReport' => [
                'month' => ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
                'revenue' => [
                    'title' => 'Revenue',
                    'data' => [76, 85, 101, 98, 87, 105, 91, 114, 94],
                ],
                'netProfit' => [
                    'title' => 'Net Profit',
                    'data' => [35, 41, 36, 26, 45, 48, 52, 53, 41],
                ],
                'cashFlow' => [
                    'title' => 'Cash Flow',
                    'data' => [44, 55, 57, 56, 61, 58, 63, 60, 66],
                ],
            ],
            'revenue' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'data' => [350, 500, 950, 700, 100],
                'total' => 4000,
                'currencySymbol' => '$',
            ],
            'productSold' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'quantity' => [800, 600, 1000, 50, 100],
                'total' => 100,
            ],
            'growth' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'perYearRate' => [10, 20, 30, 40, 10],
                'total' => 10,
                'preSymbol' => '+',
                'postSymbol' => '%',
            ],
            'lastWeekOrder' => [
                'name' => 'Last Week Order',
                'data' => [44, 55, 57, 56, 61, 10],
                'total' => '10k+',
                'percentage' => 100,
                'preSymbol' => '-',
            ],
            'lastWeekProfit' => [
                'name' => 'Last Week Profit',
                'data' => [44, 55, 57, 56, 61, 10],
                'total' => '10k+',
                'percentage' => 100,
                'preSymbol' => '+',
            ],
            'lastWeekOverview' => [
                'labels' => ["Success", "Return"],
                'data' => [60, 40],
                'title' => 'Profit',
                'amount' => '650k+',
                'percentage' => 0.02,
            ],
        ];
        $topCustomers = [
            [
                'serialNo' => 1,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'green',
                'backgroundColor' => 'sky',
                'isMvpUser' => true,
                'photo' => '/images/customer.png',
            ],
            [
                'serialNo' => 2,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'sky',
                'backgroundColor' => 'orange',
                'isMvpUser' => false,
                'photo' => '/images/customer.png',
            ],
            [
                'serialNo' => 3,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'orange',
                'backgroundColor' => 'green',
                'isMvpUser' => false,
                'photo' => '/images/customer.png',
            ],
            [
                'serialNo' => 4,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'green',
                'backgroundColor' => 'sky',
                'isMvpUser' => true,
                'photo' => '/images/customer.png',
            ],
            [
                'serialNo' => 5,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'sky',
                'backgroundColor' => 'orange',
                'isMvpUser' => false,
                'photo' => '/images/customer.png',
            ],
            [
                'serialNo' => 6,
                'name' => 'Danniel Smith',
                'totalPoint' => 50.5,
                'progressBarPoint' => 50,
                'progressBarColor' => 'orange',
                'backgroundColor' => 'green',
                'isMvpUser' => false,
                'photo' => '/images/customer.png',
            ],
        ];
        $recentOrders = [
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'paid',
            ],
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'paid',
            ],
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'paid',
            ],
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'due',
            ],
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'paid',
            ],
            [
                'companyName' => 'Biffco Enterprises Ltd.',
                'email' => 'Biffco@biffco.com',
                'productType' => 'Technology',
                'invoiceNo' => 'INV-0001',
                'amount' => 1000,
                'currencySymbol' => '$',
                'paymentStatus' => 'due',
            ],
        ];

        return view('dashboards.ecommerce', [
            'pageTitle' => 'Ecommerce Dashboard',
            'data' => $chartData,
            'topCustomers' => $topCustomers,
            'recentOrders' => $recentOrders,
        ]);
    }
}
