<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        @if (session('message'))
            <x-alert :message="session('message')" :type="'success'" />
        @endif
        
                    <div class="card-text h-full">
                        <form class="" method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                <div class="bg-white dark:bg-slate-800 rounded-md p-5 pb-6">

                            <!-- outlet id select-->
                            <div class="grid  gap-7 mb-5">
                                <div class="input-area ">
                                    <label for="outlet_id" class="form-label">Outlet</label>
                                    <select name="outlet_id" id="outlet_id" class="form-control">
                                        <option value="">Pilih Outlet</option>
                                        @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}" {{ old('outlet_id', $category->outlet_id) == $outlet->id ? 'selected' : '' }}>{{ $outlet->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('outlet_id')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2  gap-7">
                                <div class="input-area">
                                    <label for="name" class="form-label">Nama Category</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Nama Category" value="{{ old('name', $category->name) }}">
                                    @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="input-area">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" placeholder="Masukan Nama Slug" value="{{ old('slug', $category->slug) }}">
                                    @error('slug')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="input-area">
                                    <label for="image" class="form-label">Image</label>
                                    <input id="image" name="image" type="file" class="form-control">
                                    <div class="preview w-20 h-20 mt-2">
                                        <img src="{{ asset('upload/category/' . $category->image) }}" alt="" class="w-full h-full object-cover">
                                    </div>
                                    @error('image')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-2 w-full">
                                    <label for="textMsg" class="form-label">Description</label>
                                    <textarea name="description" id="textMsg" rows="5" class="form-control" placeholder="Masukan Deskripsi">{{ old('description', $category->description) }}</textarea>
                                    @error('description')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            
                <button type="submit" class="btn  btn-dark mt-3">Submit</button>
                            <a href="{{ route('category.index') }}" class="btn py-3 btn-outline-dark mt-3">Back</a>
                            </div>
                        </form>
                    </div>
           
    </div>

    <script>
        const image = document.querySelector('.preview');
        const inputImage = document.querySelector('#image');
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
        <script>
        document.getElementById('name').addEventListener('input', function() {
            let slug = this.value.toLowerCase()
                .replace(/[^a-z0-9-]/g, '-')
                .replace(/-+/g, '-')
                .replace(/^-|-$/g, '');
            document.getElementById('slug').value = slug;
        });
    </script>
</x-app-layout>
