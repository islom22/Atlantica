@extends('layouts.app')

@section('content')

<h1 class="text-uppercase mb-4">translations</h1>

<form class="navbar-search form-inline mb-4 w-50 d-flex" action="{{ route('translation.search') }}" method="post">
  @csrf
  <input type="text" class="form-control" placeholder="Search..." name="search">
  <button class="btn btn-primary ms-1" type="submit">Search</button>
</form>

<a href="{{ route('translations.create') }}" class="btn btn-success mb-3 text-white">Add translation</a>

<div class="card border-0 shadow mb-4">
  <div class="card-body">
      <div class="table-responsive">
          <table class="table table-centered table-nowrap mb-0 rounded">
              <thead class="thead-light">
                  <tr>
                      <th class="border-0 rounded-start">#</th>
                      <th class="border-0">Key</th>
                      <th class="border-0">Value</th>
                      <th class="border-0 rounded-end">Actions</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($translations as $translation)
                  <!-- Item -->
                  <tr>
                      <td><a href="#" class="text-primary fw-bold">{{ ($translations ->currentpage()-1) * $translations ->perpage() + $loop->index + 1 }}</a></td>
                      <td class="fw-bold">{{ $translation->key }}</td>
                      <td>
                      @foreach($langs as $lang)
                          @if(isset($translation->val[$lang->small]))
                              {{ $translation->val[$lang->small] }}
                              @if($loop->last) @continue @endif
                              <br><br>
                          @endif
                      @endforeach
                      </td>
                      <td>
                        <div class="actions d-flex flex-column">
                          <form class="" action="{{ route('translations.destroy', ['translation' => $translation->id]) }}" method="post">
                            @csrf
                              @method('delete')
                            <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder">delete</button>
                          </form>
                          <a href="{{ route('translations.edit', ['translation' => $translation->id]) }}" class="text-info fw-bolder">edit</a>
                        </div>
                      </td>
                  </tr>
                  <!-- End of Item -->
                  @endforeach
              </tbody>
          </table>
          <div class="mt-4">
            {!! $translations->links() !!}
          </div>
      </div>
  </div>
</div>

@endsection
