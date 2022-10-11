@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">translations</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('translations.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">translations</a> >>
        <a class="d-flex text-uppercase ms-2">edit</a>
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

    <form action="{{ route('translations.update', ['translation' => $translation->id]) }}" method="post">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-lg-6 col-sm-6">
                                <!-- Form -->
                                <div class="mb-4">
                                    <label for="email">Key</label>
                                    <input type="text" class="form-control" name="key" placeholder="key"
                                        value="{{ old('key') ? old('key') : $translation->key }}">
                                </div>
                                <!-- End of Form -->
                            </div>
                        </div>
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
                                    <div class="row mb-4">
                                        <div class="col-lg-6 col-sm-6">
                                            <!-- Form -->
                                            <div class="my-4">
                                                <label for="textarea">Value</label>
                                                @if (isset($translation->val[$language->small]))
                                                    <textarea class="form-control" placeholder="Enter sentence..." id="textarea" rows="4"
                                                        name="val[{{ $language->small }}]">{{ old('val.' . $language->small) ? old('val.' . $language->small) : $translation->val[$language->small] }}</textarea>
                                                @else
                                                    <textarea class="form-control" placeholder="Enter your sentence..." id="textarea" rows="4"
                                                        name="val[{{ $language->small }}]">{{ old('val.' . $language->small) }}</textarea>
                                                @endif
                                            </div>
                                            <!-- End of Form -->
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-success px-5" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
