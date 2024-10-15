<x-app-layout>
    @php
        $pageTitle = 'Category';
        $breadcrumbItems = [
            [
                'name' => 'Dashboard',
                'url' => route('dashboard.index'),
                'active' => false,
            ],
            [
                'name' => 'Category',
                'url' => route('category.index'),
                'active' => true,
            ],
        ];
        $tableData = [
            [
                'id' => 1,
                'order' => 1,
                'customer' => [
                    'image' => '01.jpg',
                    'name' => 'John Doe',
                ],
                'date' => '2021-10-01',
                'quantity' => 5,
                'amount' => '$100',
                'status' => 'paid',
            ],
            [
                'id' => 2,
                'order' => 2,
                'customer' => [
                    'image' => '02.jpg',
                    'name' => 'Jane Doe',
                ],
                'date' => '2021-10-02',
                'quantity' => 10,
                'amount' => '$200',
                'status' => 'due',
            ],
            [
                'id' => 3,
                'order' => 3,
                'customer' => [
                    'image' => '03.jpg',
                    'name' => 'John Smith',
                ],
                'date' => '2021-10-03',
                'quantity' => 15,
                'amount' => '$300',
                'status' => 'cancled',
            ],
        ];
    @endphp
    <div class="space-y-8">
        <div>
          <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class=" space-y-5">
            <div class="card">
              <header class=" card-header noborder">
                <h4 class="card-title">Advanced Table
                </h4>
                <!-- tambah buttton -->
                <a href="{{ route('category.create') }}" class="btn btn-dark">Tambah</a>
              </header>
              <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6 dashcode-data-table">
                  <span class=" col-span-8  hidden"></span>
                  <span class="  col-span-4 hidden"></span>
                  <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                      <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700" id="data-table">
                        <thead class=" border-t border-slate-100 dark:border-slate-800">
                          <tr>
                              <th scope="col" class=" table-th ">
                                #
                              </th>
                              <th scope="col" class=" table-th ">
                                Name
                              </th>
                              <th scope="col" class=" table-th ">
                                Image
                              </th>
                              <th scope="col" class=" table-th ">
                                Slug
                              </th>
                              <th scope="col" class=" table-th ">
                                Description
                              </th>
                              <th scope="col" class=" table-th ">
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach ($category as $c )
                            <tr>
                                <td class=" table-td ">
                                  {{ $c->id }}
                                </td>
                                <td class=" table-td ">
                                  {{ $c->name }}
                                </td>
                                <td class="table-td">
                                      <img src="{{ isset($c->image) ? asset('upload/category/' . $c->image) : asset('upload/category/defaultcategory.webp') }}" alt="" class="w-10 h-10 rounded-full">
                                  </td>

                                <td class=" table-td ">
                                  {{ $c->slug }}
                                </td>
                                <td class=" table-td ">
                                  {{ $c->description }}
                                </td>
                                <td class="table-td ">
                                <div>
                                  <div class="relative">
                                    <div class="dropdown relative">
                                      <button
                                        class="text-xl text-center block w-full "
                                        type="button"
                                        id="tableDropdownMenuButton{{$c['id']}}"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <iconify-icon icon="heroicons-outline:dots-vertical"></iconify-icon>
                                      </button>
                                      <ul class=" dropdown-menu min-w-[120px] absolute text-sm text-slate-700 dark:text-white hidden bg-white dark:bg-slate-700
                                          shadow z-[2] float-left overflow-hidden list-none text-left rounded-lg mt-1 m-0 bg-clip-padding border-none">
                                    
                                        <li>
                                          <a
                                            href="{{ route('category.edit', $c->id) }}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                            Edit</a>
                                        </li>
                                        <li>
                                      
                                          <a
                                          id="delete"
                                            href="{{route('category.destroy', $c->id)}}"
                                            class="text-slate-600 dark:text-white block font-Inter font-normal px-4 py-2 hover:bg-slate-100 dark:hover:bg-slate-600
                                              dark:hover:text-white">
                                            Delete</a>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </td>
                              
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>


           
        </div>
    </div>


    @push('scripts')
        <script type="module">
            // data table validation
            $("#data-table, .data-table").DataTable({
                dom: "<'grid grid-cols-12 gap-5 px-6 mt-6'<'col-span-4'l><'col-span-8 flex justify-end'f><'#pagination.flex items-center'>><'min-w-full't><'flex justify-end items-center'p>",
                paging: true,
                ordering: true,
                info: false,
                searching: true,
                lengthChange: true,
                lengthMenu: [10, 25, 50, 100],
                language: {
                    lengthMenu: "Show _MENU_ entries",
                    paginate: {
                        previous: `<iconify-icon icon="ic:round-keyboard-arrow-left"></iconify-icon>`,
                        next: `<iconify-icon icon="ic:round-keyboard-arrow-right"></iconify-icon>`,
                    },
                    search: "Search:",
                },
            });

        </script>
        <!-- alert confirm using swal cdn  for id dlete-->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>
            $('a#delete').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                      // ajax delete
                      $.ajax({
                        url: url,
                        type: 'DELETE',
                        data: {
                          _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                          Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                          )
                          location.reload();
                        }
                      });
                    }
                })
            });
        </script>
    @endpush
</x-app-layout>
