<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }} - {{ $date }}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Di export pada: {{ $date }}</p>
    <hr class="border border-dark border-2">

    <div class="pt-2">
        <table class="table table-bordered table-secondary">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Isi Pesan</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

                @php $no=1;  @endphp
                @foreach ( $testimoni as $data )
                @php
                    switch ($data->status) {
                        case 0:
                            $class = 'bg-danger text-white';
                            $status = 'Hide';
                            break;
                        case 1:
                            $class = 'bg-success';
                            $status = 'Show';
                            break;

                        default;
                        break;
                    };
                @endphp
                <tr>
                    <th>{{ $no++ }}.</th>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->isi_pesan}}</td>
                    <td><span class="badge {{ $class }}">{{ $status }}</span></td>
                </tr>    
                @endforeach
                
            </tbody>
        </table>    
    </div>

    

</body>
</html>