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
                    <th>Isi Feedback</th>
                    <th>Course</th>
                </tr>
            </thead>
            <tbody>

                @php $no=1; @endphp
                @foreach ( $feedback as $data )
                <tr>
                    <th>{{ $no++ }}.</th>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->isi_feedback }}</td>
                    <td>{{ $data->course->nama_course }}</td>
                </tr>    
                @endforeach
                
            </tbody>
        </table>    
    </div>

    

</body>
</html>