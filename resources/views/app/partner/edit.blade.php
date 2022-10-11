@extends('layouts.app')

@section('content')
    <style>
        .importantRule {
            display: none !important;
        }
    </style>
    <h1 class="text-uppercase mt-5">Partner</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('partners.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Partner</a> >> <a
            class="d-flex text-uppercase ms-2">Edit</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3  fileUploadBlock">
                <p style="font-weight: 600" class="mb-2">Image </p>

                <div class="d-flex flex-wrap previewFiles" id="images">

                    @csrf
                    {{-- @foreach ($product->productImage as $products) --}}

                    {{-- <form action="{{ route('delete-image-news') }}" method="POST">
                                @csrf --}}
                    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                    <div id="full_image" class="d-flex align-items-center justify-content-center me-2"
                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative; @if ($partner->img) @else display:none !important; @endif">
                        <input type="hidden" name="id" value="{{ $partner->id }}">
                        @if ($partner)
                            <img src="{{ asset('uploads/partner/' . $partner->img) }}" alt=""
                                style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                        @endif
                        <input type="hidden" name="img[]">
                        <button class="delete  btn btn-danger btn-delete rmFile" data-id="{{ $partner->id }}"
                            data-token="{{ csrf_token() }}"
                            style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                class="fas fa-times"></i></button>
                    </div>
                    {{-- </form> --}}
                    {{-- @endforeach --}}

                    <div id="empty_image"
                        @if ($partner->img == null) style="display: block" @else style="display: none" @endif>

                        {{-- <form action="{{ route('upload-news-image') }}" method="POST" id="ajax-image-upload" --}}
                        {{-- enctype="multipart/form-data"> --}}
                        {{-- @csrf --}}
                        <input type="hidden" name="id" value="{{ $partner->id }}">
                        <input name="img" id="add_img" type="file" data-id="{{ $partner->id }}"
                            data-token="{{ csrf_token() }}" class="form-control btn-update fileUploadInput"
                            {{-- onchange="this.form.submit()" --}}
                            style="position: fixed;
                                        opacity: 0;
                                        z-index: -1;">
                        <label for="add_img" class="d-flex align-items-center justify-content-center openFileDialog"
                            style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                            <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                        </label>
                    </div>
                    {{-- </form> --}}
                </div>

                {{-- <div class="d-flex flex-wrap previewFiles">
                    @csrf
                    {{-- @foreach ($product->productImage as $products) --}}
                {{-- @if (!($industrie->img == null))
                        <form action="{{ route('delete-image-industrie') }}" method="POST">
                            @csrf
                            <div class="d-flex align-items-center justify-content-center me-2"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                <input type="hidden" name="id" value="{{ $industrie->id }}">
                                @if ($industrie)
                                    <img src="{{ asset('uploads/industrie/' . $industrie->img) }}" alt=""
                                        style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                @endif
                                <input type="hidden" name="img[]">
                                <button class="btn btn-danger rmFile" type="submit"
                                    style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </form>
                    @endif --}}
                {{-- @endforeach --}}
                {{-- @if ($industrie->img == null)
                        <form action="{{ route('upload-industrie-image') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $industrie->id }}">
                            <input name="img" id="add_img" type="file" class="form-control fileUploadInput"
                                onchange="this.form.submit()"
                                style="position: fixed;
                                        opacity: 0;
                                        z-index: -1;">

                            <label for="add_img" class="d-flex align-items-center justify-content-center openFileDialog"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                            </label>
                        </form>
                    @endif --}}
                {{-- </div> --}}


                <input class="form-control fileUploadInput" type="file" style="display: none" name="img[] ">
            </div>
            <form action="{{ route('partners.update', ['partner' => $partner]) }}" method="post"
                enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-4">
                        <div class="card border-0 shadow components-section">
                            <div class="card-body">
                                {{-- <nav>
                                    <div class="nav nav-tabs border-bottom mb-3" id="nav-tab" role="tablist">
                                        @foreach ($languages as $language)
                                            <button class="nav-link border-bottom" id="{{ $language->lang }}-tab"
                                                data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button"
                                                role="tab" aria-controls="{{ $language->lang }}"
                                                aria-selected="true">{{ $language->lang }}</button>
                                        @endforeach
                                    </div>
                                </nav> --}}
                                <div class="tab-content" id="nav-tabContent">
                                    {{-- @foreach ($languages as $language) --}}
                                    {{-- <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                            aria-labelledby="{{ $language->lang }}-tab"> --}}
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-2">
                                                <label for="email">Link</label>
                                                <input type="text" class="form-control" name="link" placeholder="link"
                                                    value="{{ old('link', $partner->link) }}">
                                            </div>
                                            {{-- <div class="row mb-2">
                                                        <label for="textarea">Description</label>
                                                        @if (isset($industrie->desc[$language->small]))
                                                            <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                                name="desc[{{ $language->small }}]">{{ old('desc.' . $language->small, $industrie->desc[$language->small]) }}</textarea>
                                                        @else
                                                            <textarea type="text" class="form-control ckeditor" id="desc" name="desc[{{ $language->small }}]"
                                                                placeholder="desc" value="{{ old('desc.' . $language->small) }}">{{ old('desc.' . $language->small) }}</textarea>
                                                        @endif
                                                    </div> --}}
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                    {{-- </div> --}}
                                    {{-- @endforeach --}}
                                </div>
                                <button class="btn btn-success px-5 text-white" type="submit"
                                    style="padding:12px">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn-delete', function() {
                console.log('delete click')
                const id = $(this).data('id');
                var token = $(this).data("token");
                if (id) {


                    $.ajax({
                        url: "/admin/delete-image-partner",
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'POST',
                            "_token": token,
                        },
                        success: function() {
                            // $("#images").load('http://localhost:8000/admin/partners/' + id +
                            //     '/edit #images');
                            $('#full_image').addClass("importantRule");
                            $('#empty_image').css("display", "block");

                        }
                    });



                }
            });


            $(document).on('change', '.btn-update', function() {
                console.log('ss');
                const id = $(this).data('id');
                var token = $(this).data("token");
                var img = $('#add_img')[0].files;

                const formData = new FormData();

                formData.append("id", id);
                formData.append("_token", token);
                formData.append("_method", "POST");
                formData.append("img", img[0]);
                console.log(img)
                if (id) {

                    $.ajax({
                        url: "/admin/upload-partner-image",
                        type: 'POST',
                        dataType: "JSON",
                        data: formData,
                        contentType: false,
                        processData: false,
                        complete: function() {

                            $("#images").load('http://localhost:8000/admin/partners/' + id +
                                '/edit #images');

                        }
                    });



                }
            });
        })
    </script>


@endsection
