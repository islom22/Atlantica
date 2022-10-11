@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Projects</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('projects.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Projects</a> >> <a
            class="d-flex text-uppercase ms-2">Add</a>
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

    <form action="{{ route('projects.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-4" id="nav-tab" role="tablist">
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
                                                <label for="title">Title</label>
                                                {{-- <input type="text" name="title" class="form-control" value="{{ old('title') }}"> --}}
                                                <input type="text" class="form-control" id="title"
                                                    name="title[{{ $language->small }}]" placeholder="title"
                                                    value="{{ old('title.' . $language->small) }}">
                                            </div>
                                            <div class="form-group mb-2">
                                                <label for="">Subtitle</label>
                                                {{-- <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}"> --}}
                                                <input type="text" class="form-control" id="subtitle"
                                                    name="subtitle[{{ $language->small }}]" placeholder="subtitle"
                                                    value="{{ old('subtitle.' . $language->small) }}">
                                            </div>

                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="row mb-2">
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label for="">Image</label>
                                        <input type="file" name="img[]" id="img" class="form-control"
                                            accept="image/*" multiple>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script>
        function selectValue(val, key) {
            if (key == 0) {
                document.getElementById('exampleFormControlSelect1').value = val.value;
            } else document.getElementById('exampleFormControlSelect0').value = val.value;
        }
    </script>

@endsection


@section('scripts')
    <script type="text/javascript">
        $('#projects').bsMultiSelect();
    </script>

    <script>
        $(document).on('click', '.openFileDialog', function(e) {
            $(this).parents(".fileUploadBlock").find('input[type=file]').trigger('click');
        });
        $(document).on('click', '.rmFile', function(e) {
            $(this).parent(".d-flex").remove();
        });
        $('.fileUploadInput').on('change', function() {
                    var formData = new FormData();
                    var hi = $(this).attr("name") + '_hidden[]';
                    var pv = $(this).parents(".fileUploadBlock").find('.previewFiles');
                    formData.append('file', $(this)[0].files[0]);
                    $.ajax({
                                method: 'post',
                                cache: false,
                                contentType: false,
                                processData: false,
                                url: '/admin/file/upload',
                                data: formData,
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success: function(data) {
                                        if (data.file_type == 'img') {
                                            var fileBlok = `
					<div class="d-flex align-items-center justify-content-center me-2 mb-2" style="width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative">
						<img src="/images/${data.file_name}" alt="" style="height: 100%; width:100%; border-radius: 12px;object-fit: cover;">
						<input type="hidden" name="${hi}" value="${data.file_name}">
						<button class="btn btn-danger rmFile" style="position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;"><i class="fas fa-times"></i></button>
					</div>
					
                    }else{
                        var fileBlok = ` <
                                                div class = "d-flex align-items-center justify-content-center me-2 mb-2"
                                            style =
                                                "width: 100px; height: 100px; background-color: #eeeeee82; border-radius: 12px; border: 1px dashed #ccc; cursor: pointer; position: relative" >
                                                <
                                                i class = "fas fa-file fa-2x"
                                            style = "color: #29313d;" > < /i> <
                                            input type = "hidden"
                                            name = "${hi}"
                                            value = "${data.file_name}" >
                                                <
                                                button class = "btn btn-danger rmFile"
                                            style = "position: absolute;top: -7px;padding: 0.15rem 0.55rem;right: -7px;" > <
                                                i class = "fas fa-times" > < /i></button >
                                                <
                                                /div>
                                            `
                                                                    }
                                                                    pv.prepend(fileBlok);
                                                                },
                                                                error : function (error) {
                                                                    console.log(error)
                                                                },
                                                            });
                                                        });
    </script>
@endsection
