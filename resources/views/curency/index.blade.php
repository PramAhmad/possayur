<x-app-layout>
    <div>
        <div class="mb-6">
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        <div class="card mb-4">
    <div class="card-header">{{ __('Select Active curency') }}</div>
    <div class="card-body p-4">
        <form method="POST" action="{{ route('curency.make-active') }}">
            @csrf
            <div class="flex items-center gap-4">
                <select name="id" class="form-control">
                    @foreach($curencies as $curency)
                        <option 
                            value="{{ $curency->id }}" 
                            {{ $curency->is_active ? 'selected' : '' }}
                        >
                            {{ $curency->name }} ({{ $curency->code }})
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ __('Set as Active') }}
                </button>
            </div>
        </form>
    </div>
</div>
        <div class="card">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    @can('curency create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('curency.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New curency') }}
                        </a>
                    @endcan

                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('curency.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                </div>
            </header>

            <div class="card-body px-6 pb-6">
                <div class="overflow-x-auto -mx-6">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden ">
                            <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                                <thead class="bg-slate-200 dark:bg-slate-700">
                                    <tr>
                                        <th scope="col" class="table-th">{{ __('Sl No') }}</th>
                                        <th scope="col" class="table-th">{{ __('Name') }}</th>
                                        <th scope="col" class="table-th">{{ __('Symbol') }}</th>
                                        <th scope="col" class="table-th">{{ __('Code') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($curencies as $curency)
                                        <tr>
                                            <td class="table-td"># {{ $curency->id }}</td>
                                            <td class="table-td">{{ $curency->name }}</td>
                                            <td class="table-td">{{ $curency->symbol }}%</td>
                                            <td class="table-td">{{ $curency->code }}</td>
                                            <td class="table-td">
                                                <span class="inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20  {{ $curency->is_active ? 'bg-success-500 text-success-500' : 'bg-danger-500 text-danger-500' }}">
                                                    {{ $curency->is_active ? __('Active') : __('Inactive') }}
                                                </span>
                                            </td>
                                            <td class="table-td">{{ $curency->outlet?->name ?? __('No Outlet') }}</td>
                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('curency edit')
                                                        <a class="action-btn" href="{{ route('curency.edit', ['curency' => $curency]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('curency delete')
                                                        <form id="deleteForm{{ $curency->id }}" method="POST" action="{{ route('curency.destroy', $curency) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $curency->id }}')" type="submit">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </a>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border border-slate-100 dark:border-slate-900 relative">
                                            <td class="table-cell text-center" colspan="6">
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No curencies found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No curencies found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <x-table-footer :per-page-route-name="'curency.index'" :data="$curencies" />
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
