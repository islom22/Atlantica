@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">News</h1>

    <a href="{{ route('news.create') }}" class="btn btn-success mb-3 text-white">Add </a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Title</th>
                            {{-- <th class="border-0">Description</th> --}}
                            <th class="border-0">Date</th>
                            <th class="border-0">Image</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($news as $new)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($news->currentpage() - 1) * $news->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $new->title['en'] ?? '--' }}</td>
                                {{-- <td class="fw-bold">{!! $new->desc['en'] ?? '--' !!}</td> --}}
                                <td class="fw-bold">
                                    {{-- {{ $new->date ?? '--' }} --}}
                                    {{date('d.m.Y', strtotime($new->date))}}
                                    {{-- {{$new->date->format('d-m-Y')}} --}}
                                </td>
                                <td>
                                    @if (!($new->img == null))
                                        <img src="{{ asset('uploads/news/' . $new->img) }}" alt=""
                                            style="max-width: 250px">
                                    @else
                                        {{ ' --' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('news.destroy', ['news' => $new->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('news.edit', ['news' => $new->id]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $news->links() !!}
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
