<x-app-layout>
    <div>
        <div class="mb-6">
            {{-- Breadcrumb start --}}
            <x-breadcrumb :breadcrumb-items="$breadcrumbItems" :page-title="$pageTitle" />
        </div>

        {{-- Alert start --}}
        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        {{-- Alert end --}}

        <div class="card">
            <header class="card-header noborder">
                <div class="justify-end flex gap-3 items-center flex-wrap">
                    {{-- Create Button start --}}
                    @can('coupon create')
                        <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2 !px-3" href="{{ route('coupon.create') }}">
                            <iconify-icon icon="ic:round-plus" class="text-lg mr-1"></iconify-icon>
                            {{ __('New Coupon') }}
                        </a>
                    @endcan

                    {{-- Refresh Button start --}}
                    <a class="btn inline-flex justify-center btn-dark rounded-[25px] items-center !p-2.5" href="{{ route('coupon.index') }}">
                        <iconify-icon icon="mdi:refresh" class="text-xl"></iconify-icon>
                    </a>
                </div>
                <div class="justify-center flex flex-wrap sm:flex items-center lg:justify-end gap-3">
                    <div class="relative w-full sm:w-auto flex items-center">
                        <form id="searchForm" method="get" action="{{ route('coupon.index') }}">
                            <input name="q" type="text" class="inputField pl-8 p-2 border border-slate-200 dark:border-slate-700 rounded-md dark:bg-slate-900" placeholder="Search coupon" value="{{ request()->q }}">
                        </form>
                        <iconify-icon class="absolute text-textColor left-2 dark:text-white" icon="quill:search-alt"></iconify-icon>
                    </div>
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
                                        <th scope="col" class="table-th">{{ __('Code') }}</th>
                                        <th scope="col" class="table-th">{{ __('Outlet') }}</th>
                                        <th scope="col" class="table-th">{{ __('Type') }}</th>
                                        <th scope="col" class="table-th">{{ __('Amount') }}</th>
                                        <th scope="col" class="table-th">{{ __('Min Amount') }}</th>
                                        <th scope="col" class="table-th">{{ __('Quantity') }}</th>
                                        <th scope="col" class="table-th">{{ __('Used') }}</th>
                                        <th scope="col" class="table-th">{{ __('Expiration Date') }}</th>
                                        <th scope="col" class="table-th">{{ __('Status') }}</th>
                                        <th scope="col" class="table-th w-20">{{ __('Action') }}</th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                    @forelse ($coupons as $index => $coupon)
                                        <tr>
                                            <td class="table-td"># {{ $index + 1 }}</td>
                                            <td class="table-td">{{ $coupon->code }}</td>
                                            <td class="table-td">{{ $coupon->outlet?->name }}</td>
                                            <td class="table-td">{{ ucfirst($coupon->type) }}</td>
                                            <td class="table-td">{{ number_format($coupon->amount) }}</td>
                                            <td class="table-td">{{ number_format($coupon->min_amount) }}</td>
                                            <td class="table-td">{{ $coupon->qty }}</td>
                                            <td class="table-td">{{ $coupon->used }}</td>
                                            <td class="table-td">{{ $coupon->exp_date }}</td>
                                            <td class="table-td">
                                                <span class="{{ $coupon->is_active ? 'inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 text-info-500
                              bg-info-500' : ' inline-block px-3 min-w-[90px] text-center mx-auto py-1 rounded-full bg-opacity-20 text-danger-500
                                bg-danger-500' }}">
                                                    {{ $coupon->is_active ? __('Active') : __('Inactive') }}
                                                </span>
                                            </td>
                                            <td class="table-td">
                                                <div class="flex space-x-3 rtl:space-x-reverse">
                                                    @can('coupon update')
                                                        <a class="action-btn" href="{{ route('coupon.edit', ['coupon' => $coupon]) }}">
                                                            <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                        </a>
                                                    @endcan

                                                    @can('coupon delete')
                                                        <form id="deleteForm{{ $coupon->id }}" method="POST" action="{{ route('coupon.destroy', $coupon) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="action-btn cursor-pointer" onclick="sweetAlertDelete(event, 'deleteForm{{ $coupon->id }}')" type="submit">
                                                                <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                            </a>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr class="border border-slate-100 dark:border-slate-900 relative">
                                            <td class="table-cell text-center" colspan="10">
                                                <img src="{{ asset('images/result-not-found.svg') }}" alt="No coupons found" class="w-64 m-auto" />
                                                <h2 class="text-xl text-slate-700 mb-8 -mt-4">{{ __('No coupons found.') }}</h2>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            {{-- Table footer for pagination --}}
                            <x-table-footer :per-page-route-name="'coupon.index'" :data="$coupons" />
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
