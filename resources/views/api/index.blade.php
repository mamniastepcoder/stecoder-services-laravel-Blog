
@extends('layouts.app')
@section('content')

 <div class="mt-4">

  <h1 class="text-center bg-info text-white p-2 ">API Data Fetch</h1> 
   <a href="{{ route('posts') }}" class="btn btn-danger text-center text-white float-right">Back</a>
        <table class="table table-bordered mt-5">
            <thead class="thead-dark">
                <tr class="text-center text-success">
                    <th>Name</th>
                    <th>Price</th>
                    <th>Color</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{$item['name']}}</td>
                       <td>{{ $item['data']['price'] ?? 'N/A' }}</td>
                       <td>{{ $item['data']['color'] ?? 'N/A' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2">No data available</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
       @if($page > 1)
    <a href="{{ route('api-data', array_merge(request()->all(), ['page' => $page - 1])) }}" class="btn btn-secondary">Previous</a>
@endif
<span>Page {{ $page }}</span>
<a href="{{ route('api-data', array_merge(request()->all(), ['page' => $page + 1])) }}" class="btn btn-secondary">Next</a>
 </div>
 
</div>


@endsection
