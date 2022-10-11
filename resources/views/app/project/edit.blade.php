@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Services</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('projects.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Services</a> >>
                <a class="d-flex text-uppercase ms-2">show</a>
            </div>
        </div>
    </d>

    {{-- @dd($image); --}}
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
        <div class="col-6">
            <div class="mb-3  fileUploadBlock">
                <p style="font-weight: 600" class="mb-2">Images</p>

                <div class="d-flex flex-wrap previewFiles" id="images">
                    @csrf
                    @foreach ($project->projectImage as $project_image)
                        @if (!($project_image->img == null))
                            {{-- <form action="{{ route('delete-image') }}" method="POST"> --}}
                            {{-- @csrf --}}
                            <div id="full_image" class="d-flex align-items-center justify-content-center me-2"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
                                <input type="hidden" name="id" value="{{ $project_image->id }}">
                                @if ($project_image)
                                    <img src="{{ asset($project_image->img) }}" alt=""
                                        style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
                                @endif
                                <input type="hidden" name="img[]">
                                <button class="delete  btn btn-danger btn-delete rmFile" data-id="{{ $project_image->id }}"
                                    data-service-id="{{ $project->id }}" data-token="{{ csrf_token() }}"
                                    style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i
                                        class="fas fa-times"></i></button>
                            </div>
                            {{-- </form> --}}
                        @endif
                    @endforeach
                    @if ($project->img == null)
                        <div id="empty_image">
                            {{-- <form action="{{ route('upload-service-image') }}" method="POST" enctype="multipart/form-data">
                        @csrf --}}
                            <input type="hidden" name="id" value="{{ $project->id }}">
                            <input name="img" id="add_img" type="file"
                                class="form-control btn-update fileUploadInput" {{-- onchange="this.form.submit()" --}}
                                data-id="{{ $project->id }}" data-token="{{ csrf_token() }}"
                                style="position: fixed;
                                      opacity: 0;
                                      z-index: -1;">
                            <label for="add_img" class="d-flex align-items-center justify-content-center openFileDialog"
                                style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer">
                                <i class="fas fa-plus fa-2x" style="color: #29313d;"></i>
                            </label>
                            {{-- </form> --}}
                        </div>
                    @endif

                </div>

                <input class="form-control fileUploadInput" type="file" style="display: none" name="img[] ">
            </div>
            <form action="{{ route('projects.update', ['project' => $project]) }}" method="post"
                enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Project</h4>
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
                            @foreach ($languages as $key => $language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel"
                                    aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row mb-2">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-2">
                                                <label for="email">Title</label>
                                                @if (isset($project->title[$language->small]))
                                                    <input type="text" class="form-control"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small, $project->title[$language->small]) }}">
                                                @else
                                                    <input type="text" class="form-control" id="title"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small) }}">
                                                @endif
                                            </div>
                                            <div class="mb-2">
                                                <label for="subtitle">Subtitle</label>
                                                @if (isset($project->subtitle[$language->small]))
                                                    <input type="text" id="subtitle" class="form-control"
                                                        name="subtitle[{{ $language->small }}]" placeholder="subtitle"
                                                        value="@isset($project->subtitle[$language->small]) {{ old('subtitle.' . $language->small, $project->subtitle[$language->small]) }} @endisset">
                                                @else
                                                    <input type="text" class="form-control" id="subtitle"
                                                        name="subtitle[{{ $language->small }}]" placeholder="subtitle"
                                                        value="{{ old('subtitle.' . $language->small) }}">
                                                @endif
                                            </div>

                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="btn btn-success text-white px-5" type="submit"
                        style="padding:12px; width:25%; margin-left: 20px;">Save</button>
                </div>
            </form>
        </div>


    </div>
    </div>
    <script>
        function selectValue(val, key) {
            if (key == 0) {
                document.getElementById('exampleFormControlSelect1').value = val.value;
            } else document.getElementById('exampleFormControlSelect0').value = val.value;
        }
    </script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.btn-delete', function() {
                // console.log('delete click')
                const id = $(this).data('id');
                const serId = $(this).data('service-id');
                var token = $(this).data("token");
                if (id) {
                    $.ajax({
                        url: "/admin/delete-image",
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            "id": id,
                            "_method": 'POST',
                            "_token": token,
                        },
                        complete: function() {
                            // $("#images").empty();
                            $("#images").load('http://localhost:8000/admin/projects/' + serId +
                                '/edit #images');

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
                        url: "/admin/upload-service-image",
                        type: 'POST',
                        dataType: "JSON",
                        data: formData,
                        contentType: false,
                        processData: false,
                        complete: function() {

                            $("#images").load('http://localhost:8000/admin/projects/' + id +
                                '/edit #images');

                        }
                    });
                }
            });
        })
    </script>


@endsection
