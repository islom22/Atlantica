@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">about</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('abouts.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">about</a> >> <a
            class="d-flex text-uppercase ms-2">edit</a>
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

    {{-- @csrf --}}
    {{-- @method('put') --}}
    <div class="row">
        <div class="col-6 mb-4">
            <div class="row">
                <div class="col-md-3">
                    <div class="mb-3  fileUploadBlock">
                        <p style="font-weight: 600" class="mb-2"> Image </p>
            
                            @if (!($about->img == null))
                                {{-- <form action="{{ route('delete-image-news') }}" method="POST">
                                        @csrf --}}
                                {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
                                <div id="full_image" class="d-flex align-items-center justify-content-center me-2"
                                    style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    @if ($about)
                                        <img src="{{ asset('uploads/about/' . $about->img) }}" alt=""
                                            style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                    @endif
                                    <input type="hidden" name="img[]">
                                    <button class="delete  btn btn-danger btn-delete rmFile" data-id="{{ $about->id }}"
                                        data-token="{{ csrf_token() }}"
                                        style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                            class="fas fa-times"></i></button>
                                </div>
                                {{-- </form> --}}
                            @endif
                            {{-- @endforeach --}}
                            @if ($about->img == null)
                                <div id="empty_image">

                                    {{-- <form action="{{ route('upload-news-image') }}" method="POST" id="ajax-image-upload" --}}
                                    {{-- enctype="multipart/form-data"> --}}
                                    {{-- @csrf --}}
                                    <input type="hidden" name="id" value="{{ $about->id }}">
                                    <input name="img" id="add_img" type="file" data-id="{{ $about->id }}"
                                        data-token="{{ csrf_token() }}" class="form-control btn-update fileUploadInput"
                                        {{-- onchange="this.form.submit()" --}}
                                        style="position: fixed;
                                                opacity: 0;
                                                z-index: -1;">
                                    <label for="add_img"
                                        class="d-flex align-items-center justify-content-center openFileDialog"
                                        style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                        <i class="fas fa-plus fa-2x" style="color: #2a313b;"></i>
                                    </label>
                                </div>
                                {{-- </form> --}}
                            @endif
                        </div>

                        <input class="form-control fileUploadInput" type="file" style="display: none" name="img[] ">
                    </div>
                </div>
                <form action="{{ route('abouts.update', ['about' => $about->id]) }}" method="post"
                    enctype='multipart/form-data'>
                    @csrf
                    @method('put')
                    <div class="card border-0 shadow components-section">
                        <div class="card-body">
                            <nav>
                                <div class="nav nav-tabs border-bottom mb-3" id="nav-tab" role="tablist">
                                    @foreach ($languages as $language)
                                        <button class="nav-link border-bottom" id="{{ $language->lang }}-tab"
                                            data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button"
                                            role="tab" aria-controls="{{ $language->lang }}"
                                            aria-selected="true">{{ $language->lang }}</button>
                                    @endforeach
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                @foreach ($languages as $language)
                                    <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                        aria-labelledby="{{ $language->lang }}-tab">
                                        <div class="row mb-2">
                                            {{-- <div class="col-12"> --}}
                                            <!-- Form -->
                                            <div class="row mb-2">
                                                <label for="email">Title</label>
                                                @if (isset($about->title[$language->small]))
                                                    <input type="text" class="form-control"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small) ? old('title.' . $language->small) : $about->title[$language->small] }}">
                                                @else
                                                    <input type="text" class="form-control"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small) }}">
                                                @endif
                                            </div>
                                            <div class="row mb-2">
                                                <label for="textarea">Description</label>
                                                @if (isset($about->desc[$language->small]))
                                                    <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                        name="desc[{{ $language->small }}]">{{ old('desc.' . $language->small, $about->desc[$language->small]) }}</textarea>
                                                @else
                                                    <textarea type="text" class="form-control ckeditor" id="desc" name="desc[{{ $language->small }}]"
                                                        placeholder="desc" value="{{ old('desc.' . $language->small) }}">{{ old('desc.' . $language->small) }}</textarea>
                                                @endif
                                            </div>
                                            <!-- End of Form -->
                                            {{-- </div> --}}
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <label for="email">Phone</label>
                                <input type="string" class="form-control" value="{{ old('phone', $about->phone) }}"
                                    name="phone" placeholder="phone">
                            </div>
                            <div class="mb-4">
                                <label for="email">Twitter Link</label>
                                <input type="text" class="form-control" value="{{ old('twitter', $about->twitter) }}"
                                    name="twitter" placeholder="twitter">
                            </div>
                            <div class="mb-4">
                                <label for="email">Linkedin Link</label>
                                <input type="text" class="form-control"
                                    value="{{ old('linkedin', $about->linkedin) }}" name="linkedin"
                                    placeholder="linkedin">
                            </div>
                            <div class="mb-4">
                                <label for="email">Instagram Link</label>
                                <input type="text" class="form-control"
                                    value="{{ old('instagram', $about->instagram) }}" name="instagram"
                                    placeholder="instagram">
                            </div>
                            <div class="mb-4">
                                <label for="email">Facebook Link</label>
                                <input type="text" class="form-control"
                                    value="{{ old('facebook', $about->facebook) }}" name="facebook"
                                    placeholder="facebook">
                            </div>
                            <div class="mb-4">
                                <label for="email">Skype Link</label>
                                <input type="text" class="form-control"
                                    value="{{ old('skype', $about->skype) }}" name="skype"
                                    placeholder="skype">
                            </div>
                            <div class="mb-4">
                                <label for="email"> First Address</label>
                                <input type="text" class="form-control"
                                    value="{{ old('address1', $about->address1) }}" name="address1"
                                    placeholder="address1">
                            </div>
                            <div class="mb-4">
                                <label for="email"> Second Address</label>
                                <input type="text" class="form-control"
                                    value="{{ old('address2', $about->address2) }}" name="address2"
                                    placeholder="address2">
                            </div>
                            {{-- <div class="mb-4">
                                <label for="email"> Description</label>
                                <input type="text" class="form-control" value="{{ old('desc', $about->desc) }}"
                                    name="desc" placeholder="description">
                            </div> --}}
                            <div class="mb-4">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control" value="{{ old('email', $about->email) }}"
                                    name="email" placeholder="email">
                            </div>
                            <button class="btn btn-success px-5 text-white" type="submit"
                                style="padding:12px">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

                $(document).on('click', '.btn-delete', function() {

                    const id = $(this).data('id');
                    var token = $(this).data("token");
                    if (id) {


                        $.ajax({
                            url: "/admin/delete-image-about",
                            type: 'POST',
                            dataType: "JSON",
                            data: {
                                "id": id,
                                "_method": 'POST',
                                "_token": token,
                            },
                            complete: function() {
                                // console.log('workk');
                                $("#images").load('http://localhost:8000/admin/abouts/' + id +
                                    '/edit #images');

                            }
                        });



                    }
                });


                $(document).on('change', '.btn-update', function() {

                    const id = $(this).data('id');
                    var token = $(this).data("token");
                    var img = $('#add_img')[0].files;

                    const formData = about FormData();

                    formData.append("id", id);
                    formData.append("_token", token);
                    formData.append("_method", "POST");
                    formData.append("img", img[0]);
                    console.log(img)
                    if (id) {

                        $.ajax({
                            url: "/admin/upload-about-image",
                            type: 'POST',
                            dataType: "JSON",
                            data: formData,
                            contentType: false,
                            processData: false,
                            complete: function(data) {

                                $("#images").load('http://localhost:8000/admin/abouts/' + id +
                                    '/edit #images');

                            }
                        });



                    }
                });
            })
        </script>


    @endsection
