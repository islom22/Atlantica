@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mt-5">about</h1>

    <div class="headcrumbs d-flex mb-3">
        <a href="{{ route('abouts.index') }}" class="d-flex text-uppercase me-2" style="opacity:25%">about</a> >> <a class="d-flex text-uppercase ms-2">create</a>
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

    <form action="{{ route('abouts.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card border-0 shadow components-section">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-bottom mb-4" id="nav-tab" role="tablist">
                                @foreach($languages as $language)
                                    <button class="nav-link border-bottom" id="{{ $language->lang }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $language->lang }}" type="button" role="tab" aria-controls="{{ $language->lang }}" aria-selected="true">{{ $language->lang }}</button>
                                @endforeach
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            @foreach($languages as $language)
                                <div class="tab-pane fade" id="{{ $language->lang }}" role="tabpanel" aria-labelledby="{{ $language->lang }}-tab">
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <!-- Form -->
                                            <div class="mb-4">
                                                <label for="email">Title</label>
                                                <input type="text" class="form-control" name="title[{{ $language->small }}]" placeholder="title" value="{{ old('title.'.$language->small) }}">
                                            </div>
                                            <div class="mb-4">
                                                <label for="textarea">Description</label>
                                                <textarea type="text" class="form-control ckeditor" id="desc" name="desc[{{ $language->small }}]"
                                                    placeholder="desc" value="{{ old('desc.' . $language->small) }}">{{ old('desc.' . $language->small) }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-4">
                            <label for="email">Phone</label>
                            <input type="string" class="form-control" name="phone" value="{{ old('phone')  }}" placeholder="phone" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Twitter Link</label>
                            <input type="text" class="form-control" name="twitter" value="{{ old('twitter')  }}" placeholder="twitter" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Linkedin Link</label>
                            <input type="text" class="form-control" name="linkedin" value="{{ old('linkedin')  }}" placeholder="linkedin" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Instagram Link</label>
                            <input type="text" class="form-control" name="instagram" value="{{ old('instagram')  }}" placeholder="instagram" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Facebook Link</label>
                            <input type="text" class="form-control" name="facebook" value="{{ old('facebook')  }}" placeholder="facebook" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Skype Link</label>
                            <input type="text" class="form-control" name="skype" value="{{ old('skype')  }}" placeholder="skype" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Address First</label>
                            <input type="text" class="form-control" name="address1" value="{{ old('address1')  }}" placeholder="address1" >
                        </div>
                        <div class="mb-4">
                            <label for="email">Address Second</label>
                            <input type="text" class="form-control" name="address2" value="{{ old('address2')  }}" placeholder="address2" >
                        </div>
                        {{-- <div class="mb-4">
                            <label for="email">Description</label>
                            <input type="text" class="form-control" name="desc" value="{{ old('desc')  }}" placeholder="desc" >
                        </div> --}}
                        <div class="mb-4">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email')  }}" placeholder="email" >
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Image </label>
                                    <input class="form-control" type="file" name="img" value="{{ old('img')  }}" accept="image/*">
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
