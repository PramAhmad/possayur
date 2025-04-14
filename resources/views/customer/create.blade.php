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
                            <div class="card-title text-slate-900 dark:text-white">Tambah Customer</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                    <form class="space-y-4" method="post" action="{{ route('customer.store') }}">
    @csrf
    @method('POST')
    <div class="grid md:grid-cols-2 gap-7">
        <!-- outlet -->
        <div class="input-area">
            <label for="outlet_id" class="form-label">Outlet</label>
            <select id="outlet_id" name="outlet_id" class="form-control">
                <option value="">Pilih Outlet</option>
                @foreach ($outlet as $o)
                    <option value="{{ $o->id }}" {{ old('outlet_id') == $o->id ? 'selected' : '' }}>{{ $o->name }}</option>
                @endforeach
            </select>
            @error('outlet_id')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="name" class="form-label">Nama</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Nama" value="{{ old('name') }}">
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
                    <option value="{{ $c->id }}" {{ old('customer_group_id') == $c->id ? 'selected' : '' }}>{{ $c->name }}</option>
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
            <input id="company_name" name="company_name" type="text" class="form-control" placeholder="Masukan Nama Perusahaan" value="{{ old('company_name') }}">
            @error('company_name')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input id="phone" name="phone" type="text" class="form-control" placeholder="Masukan Nomor Telepon" value="{{ old('phone') }}">
            @error('phone')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <!-- negara provinsi -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="country" class="form-label">Negara</label>
            <input id="country" name="country" type="text" class="form-control" placeholder="Masukan Negara" value="{{ old('country') }}">
            @error('country')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="province" class="form-label">Provinsi</label>
            <input id="province" name="state" type="text" class="form-control" placeholder="Masukan Provinsi" value="{{ old('state') }}">
            @error('province')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <!-- kota kode pos -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="city" class="form-label">Kota</label>
            <input id="city" name="city" type="text" class="form-control" placeholder="Masukan Kota" value="{{ old('city') }}">
            @error('city')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="postal_code" class="form-label">Kode Pos</label>
            <input id="postal_code" name="postal_code" type="text" class="form-control" placeholder="Masukan Kode Pos" value="{{ old('postal_code') }}">
            @error('postal_code')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <!-- alamat grid 1 -->
    <div class="grid md:grid-cols-1 gap-7">
        <div class="input-area">
            <label for="address" class="form-label">Alamat</label>
            <textarea id="address" name="address" class="form-control" placeholder="Masukan Alamat">{{ old('address') }}</textarea>
            @error('address')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <!-- email password -->
<!-- email password -->
<div class="grid md:grid-cols-2 gap-7">
    <div class="input-area">
        <label for="email" class="form-label">Email (Opsional untuk membuat akun)</label>
        <input id="email" name="email" type="email" class="form-control" placeholder="Masukan Email" value="{{ old('email') }}">
        <small class="text-gray-500">Biarkan kosong jika tidak ingin membuat akun</small>
        @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="input-area">
        <label for="password" class="form-label">Password (Opsional untuk membuat akun)</label>
        <input id="password" name="password" type="password" class="form-control" placeholder="Masukan Password">
        <small class="text-gray-500">Biarkan kosong jika tidak ingin membuat akun</small>
        @error('password')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
    <!-- tax -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="tax" class="form-label">Pajak</label>
            <input id="tax" name="tax" type="text" class="form-control" placeholder="Masukan Pajak" value="{{ old('tax') }}">
        </div>
        <div class="input-area">
            <label for="is_active" class="form-label">Status</label>
            <div class="grid">
                <div class="primary-radio">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" class="hidden" name="is_active" value="0" {{ old('is_active', '0') == '0' ? 'checked' : '' }}>
                        <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                        <span class="text-primary-500 text-sm leading-6 capitalize">active</span>
                    </label>
                </div>
                <div class="danger-radio">
                    <label class="flex items-center cursor-pointer">
                        <input type="radio" class="hidden" name="is_active" value="1" {{ old('is_active') == '1' ? 'checked' : '' }}>
                        <span class="flex-none bg-white dark:bg-slate-500 rounded-full border inline-flex ltr:mr-2 rtl:ml-2 relative transition-all duration-150 h-[16px] w-[16px] border-slate-400 dark:border-slate-600 dark:ring-slate-700"></span>
                        <span class="text-danger-500 text-sm leading-6 capitalize">inactive</span>
                    </label>
                </div>
            </div>
            @error('is_active')
                <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-dark mt-3">Submit</button>
    <a href="{{ route('customer.index') }}" class="btn py-3 btn-outline-dark mt-3">Kembali</a>
</form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const image = document.querySelector('.preview');
        const inputImage = document.querySelector('#image');
        //  hide preview image
        image.style.display = 'none';
        inputImage.addEventListener('change', function() {
            image.style.display = 'block';
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    image.querySelector('img').setAttribute('src', result);
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>