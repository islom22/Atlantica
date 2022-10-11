@extends('layouts.app')

@section('content')

<h1 class="text-uppercase mb-4">Langugaes</h1>

<a href="{{ route('langs.create') }}" class="btn btn-success mb-3 text-white">Add</a>

<div class="card border-0 shadow mb-4">
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-centered table-nowrap mb-0 rounded">
              <thead class="thead-light">
                  <tr>
                      <th class="border-0 rounded-start">#</th>
                      <th class="border-0">Title</th>
                      <th class="border-0">Slug</th>
                      <th class="border-0 rounded-end">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($langs as $lang)
                  <!-- Item -->
                  <tr>
                      <td><a href="#" class="text-primary fw-bold">{{ $loop->iteration }}</a></td>
                      <td class="fw-bold">{{ $lang->lang }}</td>
                      <td>{{ $lang->small }}</td>
                      <td>
                        <div class="actions d-flex flex-column">
                          @if($lang->small != 'en')
                          <form class="" action="{{ route('langs.destroy', ['lang' => $lang->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder delete-btn"><i class="fa-solid fa-trash"></i></button>
                          </form>
                          @else
                          -
                          @endif
                        </div>
                      </td>
                  </tr>
                  <!-- End of Item -->
                  @endforeach
              </tbody>
          </table>
      </div>
  </div>
</div>

@endsection
