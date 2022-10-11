@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Banners</h1>

    <a href="{{ route('banners.create') }}" class="btn btn-success mb-3 text-white">Add </a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Title</th>
                            {{-- <th class="border-0">Description</th> --}}
                            <th class="border-0">Link</th>
                            <th class="border-0">Image</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($banners->currentpage() - 1) * $banners->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $banner->title['en'] ?? '--' }}</td>
                                {{-- <td class="fw-bold">{!! $banner->desc ?? '--' !!}</td> --}}
                                <td class="fw-bold">
                                    {{ $banner->link ?? '--' }}
                                    {{-- {{$banner->date->format('d-m-Y')}} --}}
                                </td>
                                <td>
                                    @if (!($banner->img == null))
                                        <img src="{{ asset('uploads/banners/' . $banner->img) }}" alt=""
                                            style="max-width: 250px">
                                    @else
                                        {{ ' --' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('banners.destroy', ['banner' => $banner->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('banners.edit', ['banner' => $banner->id]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $banners->links() !!}
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            if (!confirm("Are You Sure to delete this"))
                event.preventDefault();
        }
    </script>
@endsection
