<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="'Create Supplier'" :breadcrumb-items="$breadcrumbItems"/>
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
                            <div class="card-title text-slate-900 dark:text-white">Create Supplier</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                    <form class="space-y-4" method="post" action="{{ route('supplier.store') }}">
    @csrf
    <!-- add outlet id -->
    <div class="input-area">
        <label for="outlet_id" class="form-label">Outlet</label>
        <select name="outlet_id" id="outlet_id" class="form-control">
            <option value="">Pilih Outlet</option>
            @foreach ($outlets as $outlet)
            <option value="{{ $outlet->id }}">{{ $outlet->name }}</option>
            @endforeach
        </select>
        @error('outlet_id')
        <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
        </div>
        @enderror
    </div>

    <!-- Name, Email -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="name" class="form-label">Nama</label>
            <input id="name" name="name" type="text" class="form-control" placeholder="Masukkan Nama" value="{{ old('name') }}">
            @error('name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" placeholder="Masukkan Email" value="{{ old('email') }}">
            @error('email')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <!-- Phone, Address -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="phone" class="form-label">Nomor Telepon</label>
            <input id="phone" name="phone" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" value="{{ old('phone') }}">
            @error('phone')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="address" class="form-label">Alamat</label>
            <input id="address" name="address" type="text" class="form-control" placeholder="Masukkan Alamat" value="{{ old('address') }}">
            @error('address')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <!-- Company, Shop Name -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="company" class="form-label">Nama Perusahaan</label>
            <input id="company" name="company" type="text" class="form-control" placeholder="Masukkan Nama Perusahaan" value="{{ old('company') }}">
            @error('company')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="supplier_type" class="form-label">Jenis Barang Supplier</label>
            <input id="supplier_type" name="supplier_type" type="text" class="form-control" placeholder="Masukkan Nama Toko" value="{{ old('supplier_type') }}">
            @error('supplier_type')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <!-- Bank Details -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="bank_name" class="form-label">Nama Bank</label>
            <input id="bank_name" name="bank_name" type="text" class="form-control" placeholder="Masukkan Nama Bank" value="{{ old('bank_name') }}">
            @error('bank_name')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="bank_branch" class="form-label">Cabang Bank</label>
            <input id="bank_branch" name="bank_branch" type="text" class="form-control" placeholder="Masukkan Cabang Bank" value="{{ old('bank_branch') }}">
            @error('bank_branch')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <!-- Account Holder, Account Number -->
    <div class="grid md:grid-cols-2 gap-7">
        <div class="input-area">
            <label for="account_holder" class="form-label">Nama Pemegang Rekening</label>
            <input id="account_holder" name="account_holder" type="text" class="form-control" placeholder="Masukkan Nama Pemegang Rekening" value="{{ old('account_holder') }}">
            @error('account_holder')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="input-area">
            <label for="account_number" class="form-label">Nomor Rekening</label>
            <input id="account_number" name="account_number" type="text" class="form-control" placeholder="Masukkan Nomor Rekening" value="{{ old('account_number') }}">
            @error('account_number')
            <div class="text-red-500 mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-dark mt-3">Submit</button>
    <a href="{{ route('supplier.index') }}" class="btn py-3 btn-outline-dark mt-3">Kembali</a>
</form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
