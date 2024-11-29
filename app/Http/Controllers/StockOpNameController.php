<?php

namespace App\Http\Controllers;

use App\Exports\StockOpnameTemplateExport;
use App\Models\Outlet;
use App\Models\Product;
use App\Models\StockOpName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Spatie\QueryBuilder\QueryBuilder;

class StockOpNameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $breadcrumbItems = [
            [
                'name' => 'Stock Opname',
                'url' => route('stockopname.index'),
                'active' => true
            ],
        ];
        $pageTitle = 'Stock Opname';
        $q = $request->get('q');
        $productId = $request->get('product_id');
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort');

        if (auth()->user()->hasRole('super-admin')) {
            $product = Product::all();
            $query = QueryBuilder::for(StockOpName::class)
                ->allowedSorts(['opname_date', 'difference'])
                ->with(['product', 'outlet'])
                ->where('opname_date', 'like', "%$q%");
        } else {
            $product = Product::where('outlet_id', auth()->user()->outlet_id)->get();
            $query = QueryBuilder::for(StockOpName::class)
                ->allowedSorts(['opname_date', 'difference'])
                ->with(['product', 'outlet'])
                ->where('outlet_id', auth()->user()->outlet_id)
                ->where('opname_date', 'like', "%$q%");
        }

        // Add product filter if selected
        if ($productId) {
            $query->where('product_id', $productId);
        }

        $stockOpNames = $query->latest()
            ->paginate($perPage)
            ->appends(['per_page' => $perPage, 'q' => $q, 'sort' => $sort, 'product_id' => $productId]);

        return view('stockopname.index', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'product' => $product,
            'stockOpNames' => $stockOpNames,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbItems = [
            [
                'name' => 'Stock Opname',
                'url' => route('stockopname.index'),
                'active' => false
            ],
            [
                'name' => 'Create Stock Opname',
                'url' => route('stockopname.create'),
                'active' => true
            ],
        ];

        $pageTitle = 'Create Stock Opname';
        if (auth()->user()->hasRole('super-admin')) {
            $products = Product::all();
            $outlets = Outlet::all();
        } else {
            $products = Product::where('outlet_id', auth()->user()->outlet_id)->get();
            $outlets = Outlet::where('id', auth()->user()->outlet_id)->get();
        }


        return view('stockopname.create', [
            'breadcrumbItems' => $breadcrumbItems,
            'pageTitle' => $pageTitle,
            'products' => $products,
            'outlets' => $outlets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'opname_date' => 'required|date',
            'outlet_id' => 'required|exists:outlets,id',
            'note' => 'nullable|string',
            'products' => 'required|array|min:1',
            'products.*.product_id' => 'required|exists:product,id',
            'products.*.actual_qty' => 'required|numeric|min:0',
            'products.*.note' => 'nullable|string', 
        ]);

        DB::beginTransaction();
        try {
            foreach ($request->products as $product) {
                $currentProduct = Product::find($product['product_id']);

                StockOpName::create([
                    'product_id' => $product['product_id'],
                    'outlet_id' => $request->outlet_id,
                    'opname_date' => $request->opname_date,
                    'initial_qty' => $currentProduct->qty,
                    'actual_qty' => $product['actual_qty'],
                    'difference' => $product['difference'],
                    'note' => $request->note,
                ]);
            }

            DB::commit();
            return redirect()->route('stockopname.index')
                ->with('message', 'Stock opname created successfully.');
        } catch (\Exception $e) {
            return $e->getMessage();
            DB::rollBack();
            return back()->with('error', 'Error creating stock opname: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function showStock(string $id)
    {
        $stockOpName = StockOpName::with('product', 'outlet')->findOrFail($id);
        return response()->json($stockOpName);
    }
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stockOPname = StockOpName::find($id);
        if ($stockOPname) {
            $stockOPname->delete();
          return redirect()->route('stockopname.index')
              ->with('message', 'Stock opname deleted successfully.');
        }
    }
    // adjust

    public function adjust($id)
    {
        // dd($id);
        try {
            DB::beginTransaction();
            
            $stockOpname = StockOpname::with('product')
            ->find($id);
            
            
            $product = Product::find($stockOpname->product_id);
            $product->qty = $stockOpname->actual_qty;
            $product->save();

            $stockOpname->update([
                'status' =>1
            ]);

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Stock opname adjusted successfully',
                'data' => $stockOpname
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Failed to adjust stock opname',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    public function downloadTemplate(Request $request)
    {   
        $fileName = now().'stock_opname_template.xlsx';
        return Excel::download(new StockOpnameTemplateExport, $fileName);
    }


    public function importExcel(Request $request)
    {
        $request->validate([
            'excel_import' => 'required|file|mimes:xlsx,xls',
        ]);
    
        try {
            $file = $request->file('excel_import');
            $data = Excel::toArray([], $file);
    
            $sheet = $data[0];
    
            // lower header exsel
            $header = array_map('strtolower', $sheet[0]);
    
            $actualQtyIndex = array_search('actual_qty', $header);
    
            if ($actualQtyIndex === false) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kolom actual_qty tidak ditemukan.',
                ], 400);
            }
    
            $filteredData = collect($sheet)
                ->slice(1) // Skip header 
                ->filter(function ($row) use ($actualQtyIndex) {
                    return !is_null($row[$actualQtyIndex]) && $row[$actualQtyIndex] !== ''; //validate gkboleh kosong
                })
                ->map(function ($row) use ($header) {
                    return array_combine($header, $row);
                })
                ->values();
                
            return response()->json([
                'success' => true,
                'products' => $filteredData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
    
    

}
