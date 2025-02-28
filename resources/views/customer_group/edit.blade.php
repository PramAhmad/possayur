<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            <div class="card xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Edit Customer Group</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                        <form class="space-y-4" method="post" action="{{ route('group_customer.update', $customer_group->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="grid">
                                <div class="input-area">
                                    <label for="name" class="form-label">Nama</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Nama" value="{{ old('name', $customer_group->name) }}">
                                    @error('name')
                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="percentage" class="form-label">Persentase</label>
                                    <input id="percentage" name="percentage" type="text" class="form-control" placeholder="Masukan Persentase" value="{{ old('percentage', $customer_group->percentage) }}">
                                    @error('percentage')
                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="is_active" class="form-label">Status</label>
                                    <div class="primary-radio">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" class="hidden" name="is_active" value="0" {{ $customer_group->is_active == 0 ? 'checked' : '' }}>
                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                            <span class="text-primary-500 text-sm leading-6 capitalize">Active</span>
                                        </label>
                                    </div>
                                    <div class="danger-radio">
                                        <label class="flex items-center cursor-pointer">
                                            <input type="radio" class="hidden" name="is_active" value="1" {{ $customer_group->is_active == 1 ? 'checked' : '' }}>
                                            <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                            <span class="text-danger-500 text-sm leading-6 capitalize">Non Active</span>
                                        </label>
                                    </div>
                                    @error('is_active')
                                        <div class="text-red-500 mt-2 text-sm">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark mt-3">Update</button>
                            <a href="{{ route('group_customer.index') }}" class="btn py-3 btn-outline-dark mt-3">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
