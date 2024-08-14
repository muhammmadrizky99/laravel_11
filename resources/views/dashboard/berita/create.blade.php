@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Form Berita</h1>
    </div>

    {{-- //judul --}}
    <div class="row">
        <div class="col-lg-5">
            <form action="/dashboard-berita" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Judul</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                        value="{{ old('judul') }}">
                    @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- //kategori --}}
                <div class="mb-3">
                    <label class="form-label">Kategori</label>
                    <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                        <option value="">--pilih kategori--</option>
                        @foreach ($kategoris as $kategori)
                            <option value="{{ $kategori->id }}" @if (old('id_kategori') == $kategori->id) selected @endif>
                                {{ $kategori->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_kategori')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- penulis --}}
                <div class="mb-3">
                    <label class="form-label">Penulis</label>
                    {{-- <input type="text" name="penulis"  value="{{ auth()->user()->id }}"> --}}
                    <select class="form-select @error('id_user') is-invalid @enderror" name="id_user">
                        <option value="">--pilih Penulis--</option>
                        @foreach ($users as $item)
                            <option value="{{ $item->id }}" @if (old('id_user') == $item->id) selected @endif>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_user')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- //kutipan --}}
                <div class="mb-3">
                    <label class="form-label">Kutipan</label>
                    <input type="text" class="form-control @error('kutipan') is-invalid
                @enderror"
                        name="kutipan" value="{{ old('kutipan') }}">
                    @error('kutipan')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                {{-- //gambar --}}
                <div class="mb-3">
                    <label class="form-label" for="file_image">Gambar
                        <img src="/upload.jpg" alt="" class="img-thumbnail" id="img-preview"
                            style="width: 300px; display:block;">
                    </label>
                    <input type="file" hidden class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                        onchange="previewImage(event)" value="{{ old('gambar') }}" accept="image/*" id="file_image">
                    @error('gambar')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-sm btn-success mb-3" type="submit">Simpan</button>
        </div>



        {{-- content --}}
        <div class="col-lg-7">
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <input type="hidden" class="form-control @error('content') is-invalid @enderror" name="content"
                    id="content">
                <div id="editor">
                    {!! old('content') !!}
                </div>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
                <script>
                    ClassicEditor
                        .create(document.querySelector('#editor'))
                        .then(editor => {
                            const editorContentInput = document.querySelector('#content');
                            editorContentInput.value = editor.getData();
                            editor.model.document.on('change:data', () => {
                                editorContentInput.value = editor.getData();
                            });
                        })
                        .catch(error => {
                            console.error(error);
                        });
                </script>




            </div>
        </div>
    </div>




    </form>
    </div>
@endsection
