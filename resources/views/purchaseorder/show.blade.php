<x-app-layout>
    <div class="card">

        <main class="card-body p-0">
                            <div class="flex justify-between flex-wrap space-y-4 px-6 pt-6 bg-slate-50 dark:bg-slate-800 pb-6 rounded-t-md">
                              <div>
                              <span class="block text-slate-900 dark:text-slate-300 font-medium leading-5 text-xl">From:</span>
                               
                                <div class="text-slate-500 dark:text-slate-300 font-normal leading-5 mt-4 text-sm">{{$purchase->outlet->name}} <br> {{$purchase->outlet->address}}
                              <div class="flex space-x-2 mt-2 leading-[1] rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--heroicons-outline" width="1em" height="1em" viewbox="0 0 24 24">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516
                                                5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5Z"></path>
                                    </svg>
                                    <span>{{$purchase->outlet->phone}}</span>
                                  </div>
                                  <div class="mt-[6px] flex space-x-2 leading-[1] rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--heroicons-outline" width="1em" height="1em" viewbox="0 0 24 24">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                    </svg>
                                    <span>{{$purchase->outlet->email ?? 'tidak ada email'}}</span>
                                  </div>
                                </div>
                              </div>
                              <div>
                                <span class="block text-slate-900 dark:text-slate-300 font-medium leading-5 text-xl">Bill to:</span>
                                <div class="text-slate-500 dark:text-slate-300 font-normal leading-5 mt-4 text-sm">{{$purchase->supplier->name}}<br>{{$purchase->supplier->address}}<div class="flex space-x-2 mt-2 leading-[1] rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--heroicons-outline" width="1em" height="1em" viewbox="0 0 24 24">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 0 1 2-2h3.28a1 1 0 0 1 .948.684l1.498 4.493a1 1 0 0 1-.502 1.21l-2.257 1.13a11.042 11.042 0 0 0 5.516
                                                5.516l1.13-2.257a1 1 0 0 1 1.21-.502l4.493 1.498a1 1 0 0 1 .684.949V19a2 2 0 0 1-2 2h-1C9.716 21 3 14.284 3 6V5Z"></path>
                                    </svg>
                                    <span>{{$purchase->supplier->phone}}</span>
                                  </div>
                                  <div class="mt-[6px] flex space-x-2 leading-[1] rtl:space-x-reverse">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--heroicons-outline" width="1em" height="1em" viewbox="0 0 24 24">
                                      <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m3 8l7.89 5.26a2 2 0 0 0 2.22 0L21 8M5 19h14a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                    </svg>
                                    <span>{{$purchase->supplier->email}}</span>
                                  </div>
                                </div>
                              </div>
                              <div class="space-y-[2px]">
                                <span class="block text-slate-900 dark:text-slate-300 font-medium leading-5 text-xl mb-4">Invoice:</span>
                                <h4 class="text-slate-600 font-medium dark:text-slate-300 text-xs uppercase">Invoice number:</h4>
                                <div class="text-slate-500 dark:text-slate-300 font-normal leading-5 text-sm">{{$purchase->reference_no}}</div>
                                <h4 class="text-slate-600 font-medium dark:text-slate-300 text-xs uppercase">date</h4>
                                <div class="text-slate-500 dark:text-slate-300 font-normal leading-5 text-sm">{{Carbon\Carbon::parse($purchase->created_at)->translatedFormat('d F Y')}}</div>
                              </div>
                            </div>
                            <div class="max-w-[980px] mx-auto shadow-base dark:shadow-none my-8 rounded-md overflow-x-auto">
                              <div>
                                <table class="w-full border-collapse table-fixed dark:border-slate-700 dark:border">
                                  <tr>
                                  <th colspan="3" class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                            ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                      <span class="block px-6 py-5 font-semibold">FOTO</span>
                                    </th>
                                    <th colspan="3" class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                            ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                      <span class="block px-6 py-5 font-semibold">ITEM</span>
                                    </th>
                                    <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                            ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                      <span class="block px-6 py-5 font-semibold">QTY</span>
                                    </th>
                                    <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                            ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                      <span class="block px-6 py-5 font-semibold">PRICE</span>
                                    </th>
                                    <th class="bg-slate-50 dark:bg-slate-700 dark:text-slate-300 text-xs font-medium leading-4 uppercase text-slate-600
                                            ltr:text-left ltr:last:text-right rtl:text-right rtl:last:text-left">
                                      <span class="block px-6 py-5 font-semibold">TOTAL</span>
                                    </th>
                                  </tr>
                                  @forelse ($purchase->productPurchase as $item)
<tr class="border-b border-slate-100 dark:border-slate-700">
    <!-- Product Image -->
    <td colspan="3" class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left px-6 py-4">
        <img src="{{ asset('upload/product/' . $item->product->image) }}" alt="" class="w-16 h-16 object-cover rounded-md">
    </td>
    
    <!-- Product Name and Variant/Batch -->
    <td colspan="3" class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left px-6 py-4">
        {{ $item->product->name }}
        <!-- Variant -->
        @if ($item->variant)
        <span class="text-xs text-slate-500 dark:text-slate-300">({{ $item->variant->name }})</span>
        @endif
        
        <!-- Batch -->
        @if ($item->batch)
        <span class="text-xs text-slate-500 dark:text-slate-300">({{ $item->batch->batch_no }})</span>
        @endif
    </td>
    
    <!-- Quantity -->
    <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left px-6 py-4">
        {{ $item->quantity }}
    </td>
    
    <!-- Net Cost -->
    <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left px-6 py-4">
        {{ number_format($item->net_cost) }}
    </td>
    
    <!-- Total Cost -->
    <td class="text-slate-900 dark:text-slate-300 text-sm font-normal ltr:text-left px-6 py-4">
        {{ number_format($item->total_cost) }}
    </td>
</tr>
@empty
<tr>
    <td colspan="8" class="text-center text-slate-500 dark:text-slate-300">Tidak Ada Item</td>
</tr>
@endforelse
              
                                 
                                </table>
                                <div class="md:flex px-6 py-6 items-center">
                                  <div class="flex-1 text-slate-500 dark:text-slate-300 text-sm">Invoice ini bersifat hihi haha</div>
                                  <div class="flex-none min-w-[270px] space-y-3">
                                    <div class="flex justify-between">
                                      <span class="font-medium text-slate-600 text-xs dark:text-slate-300 uppercase">subtotal:</span>
                                      <span class="text-slate-900 dark:text-slate-300">{{number_format($purchase->total_cost)}}</span>
                                    </div>
                                    <div class="flex justify-between">
                                      <span class="font-medium text-slate-600 text-xs dark:text-slate-300 uppercase">order tax {{$purchase->order_tax_rate}}:</span>
                                      <span class="text-slate-900 dark:text-slate-300">{{$purchase->order_tax}}</span>
                                    </div>
                                    <div class="flex justify-between">
                                      <span class="font-medium text-slate-600 text-xs dark:text-slate-300 uppercase">Invoice total:</span>
                                      <span class="text-slate-900 dark:text-slate-300 font-bold">{{$purchase->grand_total}}</span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="py-10 text-center md:text-2xl text-xl font-normal text-slate-600 dark:text-slate-300">Thank you for your
                              purchase!</div>
                          </main>
    </div>
</x-app-layout>