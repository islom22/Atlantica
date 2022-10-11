@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">Applications</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('applications.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">Applications</a> >> <a
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

    <form action="{{ route('applications.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <div class="tab-content" id="nav-tabContent">
                            <div class="row mb-4">
                                <div class="col-12">
                                    <!-- Form -->
                                    <div class="mb-4">
                                        <label for="email">Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            name="name" placeholder="name">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Text</label>
                                        <input type="text" class="form-control" value="{{ old('text') }}"
                                            name="text" placeholder="text">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Message</label>
                                        <input type="text" class="form-control" name="message"
                                            value="{{ old('message') }}" placeholder="message">
                                    </div>
                                    <div class="mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" value="{{ old('email') }}"
                                            name="email" placeholder="email">
                                    </div>
                                    <!-- End of Form -->
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-success px-5 text-white" type="submit" style="padding:12px">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
