@extends('layouts.app')

@section('content')
    <h1 class="text-uppercase mb-4">Applications</h1>

    @if (count($applications) <= 0)
        <a href="{{ route('applications.create') }}" class="btn btn-success mb-3 text-white">Add</a>
    @endif

    {{-- @dd($var); --}}
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-0 rounded-start">#</th>
                            <th class="border-0">Name</th>
                            <th class="border-0">Text</th>
                            <th class="border-0">Email</th>
                            <th class="border-0">Message</th>
                            <th class="border-0 rounded-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($applications as $application)
                            <!-- Item -->
                            <tr>
                                <td><a href="#"
                                        class="text-primary fw-bold">{{ ($applications->currentpage() - 1) * $applications->perpage() + $loop->index + 1 }}</a>
                                </td>
                                <td class="fw-bold">{{ $application->name ?? '--'  }}</td>
                                <td class="fw-bold">{{ $application->text ?? '--'  }}</td>
                                <td class="fw-bold">
                                    {{ $application->email ?? '--'  }}
                                </td>
                                <td class="fw-bold">{{ $application->message ?? '--'  }}</td>
                                <td>
                                    <div class="actions d-flex">
                                        <form class="" onclick="return myFunction();"
                                            action="{{ route('applications.destroy', ['application' => $application]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                        {{-- <a href="{{ route('applications.edit', ['application' => $application]) }}"
                                            class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a> --}}
                                    </div>
                                </td>
                            </tr>
                            <!-- End of Item -->
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $applications->links() !!}
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
