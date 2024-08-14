@extends('dashboard.layouts.main')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Berita</h1>
    </div>

    <div class="col-6">
        <form action="/dashboard-berita/{{ $item->id }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label class="form-label">Judul</label>
                <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul"
                    value="{{ old('judul', $item->judul) }}">
                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori">
                    <option value="">--pilih kategori--</option>
                    @foreach ($kategoris as $kategori)
                        @if (old('id_kategori', $item->id_kategori) == $kategori->id)
                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama_kategori }}</option>
                        @else
                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_kategori')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- <div class="mb-3">
                <label class="form-label">Penulis</label>
                <select class="form-select @error('penulis') is-invalid @enderror" name="penulis">
                    <option value="">--pilih penulis--</option>
                    @foreach ($users as $item)
                        @if (old('penulis', $item->id_user) == $item->id)
                            <option value="{{ $item->id }}" selected>{{ $item->user->name }}</option>
                        @else
                            <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('penulis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                {{-- <input type="text" name="penulis"  value="{{ auth()->user()->id }}"> --}}
                <select class="form-select @error('id_user') is-invalid @enderror" name="id_user">
                    <option value="">--pilih Penulis--</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @if (old('id_user', $item->id_user) == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
                @error('id_user')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Kutipan</label>
                <input type="text" class="form-control @error('kutipan') is-invalid @enderror" name="kutipan"
                    value="{{ old('kutipan', $item->excerpt) }}">
                @error('kutipan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="file_image">Gambar
                    <img src="{{ asset('storage/berita/'.$item->gambar) }}" alt="" class="img-thumbnail"
                        id="img-preview" style="width: 300px; display:block;">
                </label>
                <input type="file" class="form-control @error('gambar') is-invalid @enderror" name="gambar"
                    accept="image/*" id="file_image">
                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="col-lg-7">
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <input type="hidden" class="form-control @error('content') is-invalid @enderror" name="content"
                        id="content" value="{{ old('content',$item->isi_berita) }}">
                    <div id="editor">
                        {!! old('content', $item->isi_berita) !!}
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

            <input type="submit" class="btn btn-primary" value="Update">
        </form>
    </div>
@endsection
