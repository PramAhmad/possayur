<x-app-layout>
  <div>

    <div class="transition-all duration-150 container-fluid" id="page_layout">
      <div id="content_layout">

        <div>
          <div class="flex justify-between flex-wrap items-center mb-6">
            <h4 class="font-medium lg:text-2xl text-xl capitalize text-slate-900 inline-block ltr:pr-4 rtl:pl-4 mb-1 sm:mb-0">{{ auth()->user()->outlet?->name ?? "Ecommerce" }}</h4>
            <div class="flex sm:space-x-4 space-x-2 sm:justify-end items-center rtl:space-x-reverse">
              <button class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                <span class="flex items-center">
                  <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light" icon="heroicons-outline:calendar"></iconify-icon>
                  <span>Weekly</span>
                </span>
              </button>
              <button class="btn inline-flex justify-center bg-white text-slate-700 dark:bg-slate-700 !font-normal dark:text-white ">
                <span class="flex items-center">
                  <iconify-icon class="text-xl ltr:mr-2 rtl:ml-2 font-light" icon="heroicons-outline:filter"></iconify-icon>
                  <span>Select Date</span>
                </span>
              </button>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5 mb-5">
            <div class="2xl:col-span-3 lg:col-span-4 col-span-12">
              <div class="bg-no-repeat bg-cover bg-center p-5 rounded-[6px] relative" style="background-image:url('{{ asset('/images/ecommerce-wid-bg.png') }}')">
                <div class="max-w-[180px]">
                  <h4 class="text-xl font-medium text-white mb-2">
                    <span class="block">{{ auth()->user()->name }}</span>
                  </h4>
                  <p class="text-sm text-white font-normal">
                    Welcome to {{ auth()->user()->outlet?->name ?? "Ecommerce" }}
                  </p>
                </div>
              </div>
            </div>
            <div class="2xl:col-span-9 lg:col-span-8 col-span-12">
              <div class="grid md:grid-cols-3 grid-cols-1 gap-4">

                <!-- BEGIN: Group Chart -->


                <div class="card">
                  <div class="card-body pt-4 pb-3 px-4">
                    <div class="flex space-x-3 rtl:space-x-reverse">
                      <div class="flex-none">
                        <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#E5F9FF] dark:bg-slate-900	 text-info-500">
                          <iconify-icon icon=heroicons:shopping-cart></iconify-icon>
                        </div>
                      </div>
                      <div class="flex-1">
                        <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                          Total revenue
                        </div>
                        <div class="text-slate-900 dark:text-white text-lg font-medium">
                          {{ currency($revenue) }}
                        </div>
                      </div>
                    </div>
                    <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                      <div id="spae-line1"></div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body pt-4 pb-3 px-4">
                    <div class="flex space-x-3 rtl:space-x-reverse">
                      <div class="flex-none">
                        <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#FFEDE6] dark:bg-slate-900	 text-warning-500">
                          <iconify-icon icon=heroicons:cube></iconify-icon>
                        </div>
                      </div>
                      <div class="flex-1">
                        <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                          Products sold
                        </div>
                        <div class="text-slate-900 dark:text-white text-lg font-medium">
                          {{ $productSold }}
                        </div>
                      </div>
                    </div>
                    <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                      <div id="spae-line2"></div>
                    </div>
                  </div>
                </div>

                <div class="card">
                  <div class="card-body pt-4 pb-3 px-4">
                    <div class="flex space-x-3 rtl:space-x-reverse">
                      <div class="flex-none">
                        <div class="h-12 w-12 rounded-full flex flex-col items-center justify-center text-2xl bg-[#EAE6FF] dark:bg-slate-900	 text-[#5743BE]">
                          <iconify-icon icon=heroicons:arrow-trending-up-solid></iconify-icon>
                        </div>
                      </div>
                      <div class="flex-1">
                        <div class="text-slate-600 dark:text-slate-300 text-sm mb-1 font-medium">
                          Complete transaction
                        </div>
                        <div class="text-slate-900 dark:text-white text-lg font-medium">
                          {{ $completeTransaction }}
                        </div>
                      </div>
                    </div>
                    <div class="ltr:ml-auto rtl:mr-auto max-w-[124px]">
                      <div id="spae-line3"></div>
                    </div>
                  </div>
                </div>

                <!-- END: Group Chart -->
              </div>
            </div>
          </div>
          <div class="grid grid-cols-12 gap-5">
            <div class="2xl:col-span-8 lg:col-span-7 col-span-12">
              <div class="card">
                <div class="card-body p-6">
                  <div class="legend-ring">
                    <div id="dailySalesChart"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="2xl:col-span-4 lg:col-span-5 col-span-12">
              <div class="card">
                <header class="card-header">
                  <h4 class="card-title">Statistic</h4>
                  <div>
                    <!-- BEGIN: Card Dropdown -->
                    <div class="relative">
                      <div class="dropdown relative">
                        <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                            <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                          </span>
                        </button>
                        <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last 28 Days</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Month</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Year</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END: Card Droopdown -->
                  </div>
                </header>
                <div class="card-body p-6">
                  <div class="grid md:grid-cols-2 grid-cols-1 gap-5">
                    <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                      <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                        Sales Order
                      </div>
                      <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                        {{ currency($solastWeekRevenue) }}
                      </div>
                      <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                        <span class="text-success-500">{{ $sogrowth }} %
                        </span>
                        From last Week
                      </div>
                      <div class="mt-4">
                        <div class="bar-chart" colors="#FA916B" height="44"></div>
                      </div>
                    </div>
                    <!-- end single -->
                    <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                      <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                        Purchase Order
                      </div>
                      <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                        {{ currency($polastWeekRevenue) }}
                      </div>
                      <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                        <span class="text-primary-500">{{ $pogrowth }} %
                        </span>
                        From last Week
                      </div>
                      <div class="mt-4">
                        <div class="line-chart" colors="#4669fa" height="44"></div>
                      </div>
                    </div>
                    <!-- end single -->
                    <div class="md:col-span-2">
                      <div class="bg-slate-50 dark:bg-slate-900 rounded pt-3 px-4">
                        <div class="flex items-center">
                          <div class="flex-none">
                            <div class="text-sm text-slate-600 dark:text-slate-300 mb-[6px]">
                              Earnings
                            </div>
                            <div class="text-lg text-slate-900 dark:text-white font-medium mb-[6px]">
                              {{ currency($earning) }}
                            </div>
                            <div class="font-normal text-xs text-slate-600 dark:text-slate-300">
                              <span class="text-primary-500">+08%</span>
                              From last Week
                            </div>
                          </div>
                          <div class="flex-1">
                            <div class="legend-ring2">
                              <div class="growthComparisonChart" id="growthComparisonChart" height="180" colors="#F1595C,#0CE7FA" hidelabel="hideLabel" size="65%"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           <!-- prod sec -->
           <div class="xl:col-span-6 col-span-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Best Selling Products</h4>
                  <div>
                    <!-- BEGIN: Card Dropdown -->
                    <div class="relative">
                      <div class="dropdown relative">
                        <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                            <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                          </span>
                        </button>
                        <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last 28 Days</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Month</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Year</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END: Card Droopdown -->
                  </div>
                </div>
                <div class="card-body p-6">

                  <!-- BEGIN: Products -->


                  <div class="grid md:grid-cols-3 grid-cols-1 gap-5">
                    @foreach ($bestSellingProducts as $b )
                      
                    <div class="bg-slate-50 dark:bg-slate-900 p-4 rounded text-center">
                      <div class="h-12 w-12 rounded-full mb-4 mx-auto">
                      <img src="{{ asset($b->product->image ? 'upload/product/' . $b->product->image : 'images/default.png') }}" alt="" class="w-full h-full rounded-full">

                      </div>
                      <span class="text-slate-500 dark:text-slate-300 text-sm mb-1 block font-normal">
                        {{ $b->total_qty }}
                      </span>
                      <span class="text-slate-600 dark:text-slate-300 text-xs mb-4 block">
                        {{ $b->product->name }}
                      </span>
                      <a href="{{ route('product.edit',['product'=>$b->product->id]) }}" class="btn btn-secondary dark:bg-slate-800 dark:hover:bg-slate-600 block w-full text-center btn-sm">
                        View Product
                      </a>
                    </div>
                    @endforeach


                 





                  </div>
                  <!-- END: Product -->

                </div>
              </div>
            </div>
            <div class="xl:col-span-6 col-span-12">
              <div class="card">
                <div class="card-header noborder">
                  <h4 class="card-title">Recent Invoice Sales
                  </h4>
                  <div>
                    <!-- BEGIN: Card Dropdown -->
                    <div class="relative">
                      <div class="dropdown relative">
                        <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                            <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                          </span>
                        </button>
                        <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last 28 Days</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Month</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Year</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END: Card Droopdown -->
                  </div>
                </div>
                <div class="card-body p-6">

                  <!-- BEGIN: Order table -->


                  <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                      <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                          <thead class=" bg-slate-200 dark:bg-slate-700">
                            <tr>

                              <th scope="col" class=" table-th ">
                                User
                              </th>

                              <th scope="col" class=" table-th ">
                                Invoice
                              </th>

                              <th scope="col" class=" table-th ">
                                Grand total
                              </th>

                              <th scope="col" class=" table-th ">
                                Status
                              </th>

                            </tr>
                          </thead>
                          <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach ($recentSalesOrder as $r )

                            <tr>
                              <td class="table-td">
                                <div class="flex items-center">
                                  <div class="flex-none">
                                    <div class="w-8 h-8 rounded-[100%] ltr:mr-3 rtl:ml-3">
                                      <img src="{{
               'https://www.shutterstock.com/image-vector/vector-flat-illustration-grayscale-avatar-600nw-2281862025.jpg' }} " alt="" class="w-full h-full rounded-[100%] object-cover">
                                    </div> 
                                  </div>
                                  <div class="flex-1 text-start">
                                    <h4 class="text-sm font-medium text-slate-600 whitespace-nowrap">
                                      {{ $r->suratJalan->salesorder->user->name }}
                                    </h4>
                                  </div>
                                </div>
                              </td>
                              <td class="table-td">{{ $r->reference_number }}</td>
                              <td class="table-td">{{ $r->grandtotal }}</td>
                              <td class="table-td ">

                              @php
                                            switch ($r->suratJalan->salesorder->status) {
                                            case 'pending':
                                            $status = [
                                            'class' => 'bg-warning-500 text-warning-500',
                                            'text' => 'Pending',
                                            ];
                                            break;
                                            case 'process':
                                            $status = [
                                            'class' => 'bg-info-500 text-info-500',
                                            'text' => 'Process',
                                            ];
                                            break;
                                            case 'completed':
                                            $status = [
                                            'class' => 'bg-success-500 text-success-500',
                                            'text' => 'Completed',
                                            ];
                                            break;
                                            case 'canceled':
                                            $status = [
                                            'class' => 'bg-danger-500 text-danger-500',
                                            'text' => 'Canceled',
                                            ];
                                            break;
                                            }
                                            @endphp
                                            <span class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 {{ $status['class'] }}">
                                                {{ __($status['text']) }}
                                            </span>

                              </td>
                            </tr>
                            @endforeach



                           

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <!-- END: Order Table -->
                </div>
              </div>
            </div>
          
            <div class="xl:col-span-4 lg:col-span-5 col-span-12">
              <div class="card">
                <header class=" card-header">
                  <h4 class="card-title">Visitors By Gender
                  </h4>
                </header>
                <div class="card-body px-6 pb-6">
                  <div id="visitor-chart"></div>
                </div>
              </div>
            </div>
            <div class="xl:col-span-6 col-span-12">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Most Sales</h4>
                  <div>
                    <!-- BEGIN: Card Dropdown -->
                    <div class="relative">
                      <div class="dropdown relative">
                        <button class="text-xl text-center block w-full " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          <span class="text-lg inline-flex h-6 w-6 flex-col items-center justify-center border border-slate-200 dark:border-slate-700
                    rounded dark:text-slate-400">
                            <iconify-icon icon="heroicons-outline:dots-horizontal"></iconify-icon>
                          </span>
                        </button>
                        <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                shadow z-[2] overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last 28 Days</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Month</a>
                          </li>
                          <li>
                            <a href="#" class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                        dark:hover:text-white">
                              Last Year</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <!-- END: Card Droopdown -->
                  </div>
                </div>
                <div class="card-body p-6">

                  <!-- BEGIN: Most Sale2 -->




                  <div>
                    <div class="h-[290px] w-full bg-white dark:bg-slate-800 ltr:pl-10 rtl:pr-10">
                      <div id="world-map" class="h-full w-full"></div>
                    </div>
                    <ul class="bg-slate-50 dark:bg-slate-900 rounded p-4 min-w-[184px] mt-8 flex justify-between flex-wrap items-center text-center">


                      <li class="text-sm text-slate-600 dark:text-slate-300">
                        <span class="block space-x-2 rtl:space-x-reverse">
                          <span
                            class="bg-primary-500 ring-primary-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"></span>
                          <span>Nevada</span>
                        </span>
                        <span class="block mt-1">(80%)</span>
                      </li>


                      <li class="text-sm text-slate-600 dark:text-slate-300">
                        <span class="block space-x-2 rtl:space-x-reverse">
                          <span
                            class="bg-success-500 ring-success-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"></span>
                          <span>Ohio</span>
                        </span>
                        <span class="block mt-1">(75%)</span>
                      </li>


                      <li class="text-sm text-slate-600 dark:text-slate-300">
                        <span class="block space-x-2 rtl:space-x-reverse">
                          <span
                            class="bg-info-500 ring-info-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"></span>
                          <span>Montana</span>
                        </span>
                        <span class="block mt-1">(65%)</span>
                      </li>


                      <li class="text-sm text-slate-600 dark:text-slate-300">
                        <span class="block space-x-2 rtl:space-x-reverse">
                          <span
                            class="bg-warning-500 ring-warning-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"></span>
                          <span>Iowa</span>
                        </span>
                        <span class="block mt-1">(85%)</span>
                      </li>


                      <li class="text-sm text-slate-600 dark:text-slate-300">
                        <span class="block space-x-2 rtl:space-x-reverse">
                          <span
                            class="bg-success-500 ring-success-500 inline-flex h-[6px] w-[6px] bg-primary-500 ring-opacity-25 rounded-full ring-4"></span>
                          <span>Arkansas</span>
                        </span>
                        <span class="block mt-1">(90%)</span>
                      </li>

                    </ul>
                  </div>
                  <!-- END: Most Sale2 -->
                </div>
              </div>
            </div>
        
          </div>
        </div>

      </div>
    </div>


  </div>
  @push('scripts')
  <script src="{{asset('js/rt-plugins.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const salesData = @json($sogrowth);
      const purchaseData = @json($pogrowth);
      // convert to int
      let csalesData = parseInt(salesData);
      let cpurchaseData = parseInt(purchaseData);
      var height = 200;
      var width = 200;
      var colors = "#cbd5e1";
      var hasLabel = true;
      var size = "40%";


      // Konfigurasi Donut 
      var chartOptions = {
        chart: {
          type: "donut",
          height,
          toolbar: {
            show: false,
          },
        },
        series: [csalesData, cpurchaseData],
        labels: ["Sales Order", "Purchase Order"],
        dataLabels: {
          enabled: false,
        },
        plotOptions: {
          pie: {
            donut: {
              size,
              labels: {
                show: hasLabel ? false : true,
                name: {
                  show: false,
                  fontSize: "14px",
                  fontWeight: "bold",
                  fontFamily: "Inter",
                },
                value: {
                  show: true,
                  fontSize: "16px",
                  fontFamily: "Inter",
                  color: "#cbd5e1",
                  formatter(val) {
                    return `${parseInt(val)}%`;
                  },
                },
                total: {
                  show: true,
                  fontSize: "10px",
                  label: "",
                  formatter() {
                    return "70";
                  },
                },
              },
            },
          },
        },
        colors: ["#FA916B", "#4669fa"],
        legend: {
          show: false,
        },
      };


      // Render Chart
      const chart = new ApexCharts(document.querySelector("#growthComparisonChart"), chartOptions);
      chart.render();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var options = {
        chart: {
          type: "bar",
          height: 400,
          width: "100%",
          toolbar: {
            show: false
          },
        },
        series: [{
            name: "Penjualan (SO)",
            data: @json($dailyReport->pluck('sales'))
          },
          {
            name: "Pembelian (PO)",
            data: @json($dailyReport->pluck('purchases'))
          }
        ],
        xaxis: {
          categories: @json($dailyReport->pluck('day')), // Hari dalam bahasa Indonesia
          labels: {
            style: {
              fontFamily: "Inter",
              colors: "#475569"
            }
          },
        },
        colors: ["#4669FA", "#FA916B"],
        grid: {
          show: true,
          borderColor: "#E2E8F0",
          strokeDashArray: 10
        }
      };

      var chart = new ApexCharts(document.querySelector("#dailySalesChart"), options);
      chart.render();
    });
  </script>


  @endpush
</x-app-layout>