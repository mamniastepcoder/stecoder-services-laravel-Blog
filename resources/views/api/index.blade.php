<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
     
    <div class="mt-4">
  <h1 class="text-center bg-info text-white p-2 ">API Data Fetch</h1> 
        <table class="table table-bordered mt-4">
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
    </div>
</div>

</body>
</html>