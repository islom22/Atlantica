@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Comments</h1>

    <a href="{{ route('comments.create') }}" class="btn btn-success mb-3 text-white">Add </a>

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
                            <th class="border-0">Immage</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($comments->currentpage() - 1) * $comments->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $comment->title['en'] ?? '--' }}</td>
                                {{-- <td class="fw-bold">{!! $comment->desc['en'] ?? '--' !!}</td> --}}
                                <td class="fw-bold">
                                    {{-- {{ $comment->date ?? '--' }} --}}
                                    {{date('d.m.Y', strtotime($comment->date))}}
                                    {{-- {{$comment->date->format('d-m-Y')}} --}}
                                </td>
                                <td>
                                    @if (!($comment->img == null))
                                        <img src="{{ asset('uploads/comment/' . $comment->img) }}" alt=""
                                            style="max-width: 250px">
                                    @else
                                        {{ ' --' }}
                                    @endif
                                </td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('comments.destroy', ['comment' => $comment->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('comments.edit', ['comment' => $comment->id]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $comments->links() !!}
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
