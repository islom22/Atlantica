@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Main</h1>

    <d class="row mb-3">
        <div class="col-6">
            <div class="headcrumbs d-flex">
                <a href="{{ route('mains.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Main</a> >>
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
            <form action="{{ route('mains.update', ['main' => $main]) }}" method="post"
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
                                                @if (isset($main->title[$language->small]))
                                                    <input type="text" class="form-control"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small, $main->title[$language->small]) }}">
                                                @else
                                                    <input type="text" class="form-control" id="title"
                                                        name="title[{{ $language->small }}]" placeholder="title"
                                                        value="{{ old('title.' . $language->small) }}">
                                                @endif
                                            </div>
                                           
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-2">
                            <label for="email">Link</label>
                            <input type="text" class="form-control" name="link" placeholder="link"
                                value="{{ old('link', $main->link) }}">
                        </div>
                    </div>
                    <button class="btn btn-success text-white px-5" type="submit"
                        style="padding:12px; width:23%; margin-left: 20px;">Save</button>
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
    

@endsection
