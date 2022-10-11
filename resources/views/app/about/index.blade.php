@extends('layouts.app')

@section('content')

    <h1 class="text-uppercase mb-4">about</h1>

    @if (count($about) <= 0)
      <a href="{{ route('abouts.create') }}" class="btn btn-success mb-3 text-white">Add </a>
    @endif

    

    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                    <tr>
                        <th class="border-0 rounded-start">#</th>
                        <th class="border-0">Phone</th>
                        <th class="border-0">Title</th>
                        {{-- <th class="border-0">Description</th> --}}
                        <th class="border-0">First Image</th>
                        <th class="border-0 rounded-end">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($about as $item)
                        <!-- Item -->
                        <tr>
                            <td><a href="#" class="text-primary fw-bold">{{ ($about ->currentpage()-1) * $about ->perpage() + $loop->index + 1 }}</a></td>
                            <td class="fw-bold">{{ $item->phone ?? '--' }}</td>
                            {{-- <td>
                                {{ $item->desc['en'] ?? '--'  }}
                            </td> --}}
                            <td>
                                {{ $item->title['en'] ?? '--'  }}
                            </td>
                            <td>
                                @if(!($item->img == null))
                                    <img src="{{asset('uploads/about/'.$item->img )}}" alt="" style="max-width: 250px">
                                @else
                                   {{ " --" }}
                                @endif       
                            </td>
                            <td>
                                <div class="actions d-flex">
                                    <form class="" onclick="return myFunction();" action="{{ route('abouts.destroy', ['about' => $item->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger bg-transparent border-0 p-0 m-0 mb-3 fw-bolder"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <a href="{{ route('abouts.edit', ['about'=>$item->id]) }}" class="text-info fw-bolder ms-3"><i class="fa-solid fa-pen"></i></a>
                                </div>
                            </td>
                        </tr>
                        <!-- End of Item -->
                    @endforeach
                    </tbody>
                </table>
                <div class="mt-4">
                    {!! $about->links() !!}
                </div>
            </div>
        </div>
    </div>


    <script>
        function myFunction() {
            if(!confirm("Are You Sure to delete this"))
            event.preventDefault();
        }
       </script>



@endsection
