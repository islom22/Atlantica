@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Query</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('querys.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Query</a> >> <a
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
            <form action="{{ route('querys.update', ['query' => $query]) }}" method="post" enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="row">
                    <div class="col-12 mb-4">
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
                                                    @if (isset($query->question[$language->small]))
                                                        <input type="text" class="form-control"
                                                            name="question[{{ $language->small }}]" placeholder="question"
                                                            value="{{ old('question.' . $language->small) ? old('question.' . $language->small) : $query->question[$language->small] }}">
                                                    @else
                                                        <input type="text" class="form-control"
                                                            name="question[{{ $language->small }}]" placeholder="question"
                                                            value="{{ old('question.' . $language->small) }}">
                                                    @endif
                                                </div>
                                                <div class="row mb-2">
                                                    <label for="textarea">Description</label>
                                                    @if (isset($query->answer[$language->small]))
                                                        <textarea class="form-control ckeditor" placeholder="Enter your description..." rows="4"
                                                            name="answer[{{ $language->small }}]">{{ old('answer.' . $language->small, $query->answer[$language->small]) }}</textarea>
                                                    @else
                                                        <textarea type="text" class="form-control ckeditor" id="answer" name="answer[{{ $language->small }}]"
                                                            placeholder="answer" value="{{ old('answer.' . $language->small) }}">{{ old('answer.' . $language->small) }}</textarea>
                                                    @endif
                                                </div>
                                                <!-- End of Form -->
                                                {{-- </div> --}}
                                            </div>
                                        </div>
                                    @endforeach
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

    {{-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


@endsection
