<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <table border="2">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th>Jawa</th>
        </tr>
        @foreach ($hiu as $ror)
            <tr>
                <td>{{ $ror->name }}</td>
                <td>{{ $ror->price }}</td>
                <td>{{ $ror->category }}</td>
                <td>{{ $ror->description }}</td>
                <td>{{ $ror->jawa }}</td>
                {{-- <td>@if ($ror->price < 10000)
                        @if ($ror->price < 18000)
                            <p>merah</p>
                        @endif
                    @elseif ($ror->price > 18000 && $ror->price < 30000)
                        <p>kuning</p>
                    @elseif ($ror->price >= 30000)
                        <p>hijau</p>
                    @endif
                </td> --}}
            </tr>
        @endforeach
    </table>
</body>

</html>