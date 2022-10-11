@extends('layouts.app')

@section('content')

<h1 class="text-uppercase mt-5">Langugaes</h1>

<div class="headcrumbs d-flex mb-3">
  <a href="{{ route('langs.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Langugaes</a> >> <a class="d-flex text-uppercase ms-2">Add</a>
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

<form action="{{ route('langs.store') }}" method="post">
  @csrf
  <div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">
              <div class="row mb-4">
                  <div class="col-lg-6 col-sm-6">
                      <!-- Form -->
                      <div class="mb-4">
                          <label>Title</label>
                          <input type="text" class="form-control" name="lang" placeholder="lang..." value="{{ old('lang') }}">
                      </div>
                      <div class="my-4">
                        <label>Slug</label>
                        <input type="text" class="form-control" name="small" placeholder="small text..." value="{{ old('small') }}">
                      </div>
                      <!-- End of Form -->
                  </div>
              </div>
              <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
            </div>
        </div>
    </div>
  </div>
</form>

@endsection
