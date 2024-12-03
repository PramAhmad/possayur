<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif

        <div class="card">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    @can('unit create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('unit.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Unit') }}
                        </a>
                    @endcan

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('unit.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                </div>
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Sl No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Code') }}</th>
                                        <th scope="col" class="table-th">{{ __('Name') }}</th>
                                        <th scope="col" class="table-th">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th">{{ __('Base Unit') }}</th>
                                        <th scope="col" class="table-th">{{ __('Operator') }}</th>
                                        <th scope="col" class="table-th">{{ __('Operation Value') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($units as $unit)
                                        <tr>
                                            <td class="table-td"># {{ $unit->id }}</td>
                                            <td class="table-td">{{ $unit->code }}</td>
                                            <td class="table-td">{{ $unit->name }}</td>
                                            <td class="table-td">{{ $unit->outlet?->name ?? __('No Outlet') }}</td>
                                            <td class="table-td">{{ $unit->base_unit }}</td>
                                            <td class="table-td">{{ $unit->operator }}</td>
                                            <td class="table-td">{{ $unit->operation_value }}</td>
                                            <td class="table-td">
                                                <span class="badge {{ $unit->is_active ? 'bg-success-500' : 'bg-danger-500' }}">
                                                    {{ $unit->is_active ? __('Active') : __('Inactive') }}
                                                </span>
                                            </td>
                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('unit edit')
                                                        <a class="action-btn" href="{{ route('unit.edit', ['unit' => $unit]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('unit delete')
                                                        <form id="deleteForm{{ $unit->id }}" method="POST" action="{{ route('unit.destroy', $unit) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $unit->id }}')" type="submit">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </a>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border border-slate-100 dark:border-slate-900 relative">
                                            <td class="table-cell text-center" colspan="9">
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No units found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No units found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <x-table-footer :per-page-route-name="'unit.index'" :data="$units" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function sweetAlertDelete(event, formId) {
                event.preventDefault();
                let form = document.getElementById(formId);
                Swal.fire({
                    title: `@lang('Are you sure?')`,
                    icon: 'question',
                    showDenyButton: true,
                    confirmButtonText: `@lang('Delete')`,
                    denyButtonText: `@lang('Cancel')`,
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                })
            }
        </script>
    @endpush
</x-app-layout>