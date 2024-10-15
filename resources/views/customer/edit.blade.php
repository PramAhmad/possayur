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
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger"> 
                @foreach ($errors->all() as $error)
                <div class="text-white mt-2 text-sm">
                    {{ $error }}
                </div>
                @endforeach
            </div>
            @endif

            <div class="card xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Edit Customer</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                        <form class="space-y-4" method="post" action="{{ route('customer.update', $customer->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="name" class="form-label">Nama </label>
                                    <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $customer->user->name) }}" placeholder="Masukan Nama ">
                                    @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!-- select customer group -->
                                <div class="input-area">
                                    <label for="customer_group_id" class="form-label">Customer Group</label>
                                    <select id="customer_group_id" name="customer_group_id" class="form-control">
                                        <option value="">Pilih Customer Group</option>
                                        @foreach ($customer_group as $c)
                                        <option value="{{ $c->id }}" {{ $customer->customer_group_id == $c->id ? 'selected' : '' }}>
                                            {{ $c->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('customer_group_id')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- company name phone -->
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="company_name" class="form-label">Nama Perusahaan</label>
                                    <input id="company_name" name="company_name" type="text" class="form-control" value="{{ old('company_name', $customer->company_name) }}" placeholder="Masukan Nama Perusahaan">
                                    @error('company_name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input id="phone" name="phone" type="text" class="form-control" value="{{ old('phone', $customer->phone) }}" placeholder="Masukan Nomor Telepon">
                                    @error('phone')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- country, province -->
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="country" class="form-label">Negara</label>
                                    <input id="country" name="country" type="text" class="form-control" value="{{ old('country', $customer->country) }}" placeholder="Masukan Negara">
                                    @error('country')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="province" class="form-label">Provinsi</label>
                                    <input id="province" name="state" type="text" class="form-control" value="{{ old('state', $customer->state) }}" placeholder="Masukan Provinsi">
                                    @error('province')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- city, postal code -->
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="city" class="form-label">Kota</label>
                                    <input id="city" name="city" type="text" class="form-control" value="{{ old('city', $customer->city) }}" placeholder="Masukan Kota">
                                    @error('city')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="postal_code" class="form-label">Kode Pos</label>
                                    <input id="postal_code" name="postal_code" type="text" class="form-control" value="{{ old('postal_code', $customer->postal_code) }}" placeholder="Masukan Kode Pos">
                                    @error('postal_code')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- address -->
                            <div class="grid md:grid-cols-1 gap-7">
                                <div class="input-area">
                                    <label for="address" class="form-label">Alamat</label>
                                    <textarea id="address" name="address" class="form-control" placeholder="Masukan Alamat">{{ old('address', $customer->address) }}</textarea>
                                    @error('address')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- email and password -->
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $customer->user->email) }}" placeholder="Masukan Email">
                                    @error('email')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="password" class="form-label">Password</label>
                                    <input id="password" name="password" type="password" class="form-control" placeholder="Masukan Password">
                                    @error('password')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- tax and status -->
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="tax" class="form-label">Pajak</label>
                                    <input id="tax" name="tax" type="text" class="form-control" value="{{ old('tax', $customer->tax) }}" placeholder="Masukan Pajak">
                                </div>
                                <div class="input-area">
                                    <label for="is_active" class="form-label">Status</label>
                                    <div class="grid">
                                        <div class="primary-radio">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="radio" class="hidden" name="is_active" value="0" {{ $customer->is_active == 0 ? 'checked' : '' }}>
                                                <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                <span class="text-primary-500 text-sm leading-6 capitalize">active</span>
                                            </label>
                                        </div>
                                        <div class="danger-radio">
                                            <label class="flex items-center cursor-pointer">
                                                <input type="radio" class="hidden" name="is_active" value="1" {{ $customer->is_active == 1 ? 'checked' : '' }}>
                                                <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                                                <span class="text-danger-500 text-sm leading-6 capitalize">inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           <div class="flex gap-5 items-center " >
                           <div class="mt-5">
                                <button type="submit" class="btn  btn-dark">Update</button>
                            </div>
                            <!-- kemabli -->
                            <div class="mt-5">
                                <a href="{{ route('customer.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                           </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
