<x-app-layout>
 
    <div class="space-y-8">
        <div>
          <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        @if (session('error'))
            <x-alert :message="session('error')" :type="'info'" />
          
        @endif
        <div class=" space-y-5">
            <div class="card">
              <header class=" card-header noborder">
              <div class="justify-end flex gap-3 items-center flex-wrap">
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('supplier.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Supplier') }}
                        </a>

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('unit.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
</div>
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
                             
                              <!-- outlet -->
                              <th scope="col" class=" table-th ">
                                Outlet
                              </th>
                              <th scope="col" class=" table-th ">
                                Name
                              </th>
                              <th scope="col" class=" table-th ">
                                Company
                              </th>
                              <th scope="col" class=" table-th ">
                                Email
                              </th>
                              <th scope="col" class=" table-th ">
                                Phone
                              </th>
                             
                              <th scope="col" class=" table-th ">
                                Action
                              </th>
                          </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                            @foreach ($supplier as $index => $s )
                            <tr>
                                <td class=" table-td ">
                                  {{ $index + 1 }}
                                </td>
                             
                                <td class=" table-td ">
                                  {{ $s->outlet?->name }}
                                </td>
                                <td class=" table-td ">
                                  {{ $s->name }}
                                </td>
                                <td class=" table-td ">
                                  {{ $s->company }}
                                </td>
                                <td class=" table-td ">
                                  {{ $s->email }}
                                </td>
                                <td class=" table-td ">
                                  {{ $s->phone }}
                                </td>
                              
                                <td class="table-td">
                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                        <a class="action-btn" href="{{ route('supplier.edit', $s->id) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                      
                                        <form id="deleteForm{{ $s->id }}" method="POST" action="{{ route('supplier.destroy', $s) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                          <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $s->id }}')" type="submit">
                                                              <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                          </a>
                                                        </form>

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
            function sweetAlertDelete(event, formId) {
                event.preventDefault();
                let form = document.getElementById(formId);
                Swal.fire({
                    title: '@lang('Are you sure?')',
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: '@lang('Delete')',
                    denyButtonText: '@lang('Cancel')',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>
