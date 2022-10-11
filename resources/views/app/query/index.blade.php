@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Query</h1>

    <a href="{{ route('querys.create') }}" class="btn btn-success mb-3 text-white">Add </a>

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Question</th>
                            {{-- <th class="border-0">Description</th> --}}
                            <th class="border-0">Answer</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($querys as $new)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($querys->currentpage() - 1) * $querys->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $new->question['en'] ?? '--' }}</td>
                                <td class="fw-bold">{!! $new->answer['en'] ?? '--' !!}</td>
                                {{-- <td class="fw-bold">{!! $new->desc['en'] ?? '--' !!}</td> --}}
                                
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('querys.destroy', ['query' => $new->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        <a href="{{ route('querys.edit', ['query' => $new->id]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $querys->links() !!}
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
