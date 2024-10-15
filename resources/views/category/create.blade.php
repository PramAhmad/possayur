<x-app-layout>
    <div class="space-y-8">
        <div>
            <x-breadcrumb :page-title="$pageTitle" :breadcrumb-items="$breadcrumbItems" />
        </div>

        <div class="grid xl:grid-cols-2 grid-cols-1 gap-6">

    <!-- success section -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
            <div class="card xl:col-span-2">
                <div class="card-body flex flex-col p-6">
                    <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                        <div class="flex-1">
                            <div class="card-title text-slate-900 dark:text-white">Tambah Category</div>
                        </div>
                    </header>
                    <div class="card-text h-full">
                        <form class="space-y-4" method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="grid md:grid-cols-2 gap-7">
                                <div class="input-area">
                                    <label for="name" class="form-label">Nama Cateogry</label>
                                    <input id="name" name="name" type="text" class="form-control" placeholder="Masukan Nama Category">
                                    <!-- err display -->
                                     @error('name')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                     @enderror
                                </div>
                                <div class="input-area">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input id="slug" name="slug" type="text" class="form-control" placeholder="Masukan Nama Slug">
                                    <!-- err display -->
                                     @error('slug')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <!-- image -->
                                <div class="input-area">
                                    <label for="image" class="form-label">Image</label>
                                    <input id="image" name="image" type="file" class="form-control" placeholder="Masukan Gambar">
                                    <div class="preview w-20 h-20 mt-2">
                                        <img src="" alt="" class="w-full h-full object-cover">
                                    </div>
                                </div>
                                

                                <!-- preview image -->

                                <div class="mb-2 w-full">
                                    <label for="textMsg" class="form-label">Description</label>
                                    <textarea name="description" id="textMsg" rows="5" class="form-control" placeholder="Masukan Deskripsi"></textarea>
                                    <!-- err display -->
                                     @error('description')
                                    <div class="text-red-500 mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            </div>
                            <button type="submit" class="btn  btn-dark mt-3">Submit</button>
                            <!-- kembali -->
                            <a href="{{ route('category.index') }}" class="btn py-3 btn-outline-dark mt-3">Kembali</a>
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