<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Statistik Pelanggan</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        DETAIL STATISTIK PELANGGAN
                    </div>
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="btn btn-md btn-success mb-2">CREATE</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col"><input type="checkbox" id="selectAllCheckbox"></th>
                                        <th scope="col">PHONE</th>
                                        <th scope="col">CONTENT</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                    <tr>
                                        <td><input type="checkbox" name="selected[]" value="{{ $post->id }}" class="dataTerpilihCheckbox"></td>
                                        <td>{{ $post->phone }}</td>
                                        <td>{!! $post->content !!}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/twilio@3.69.0/dist/twilio.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        });

        $(document).ready(function () {
            $('#myTable').DataTable();

            // Fungsi untuk menangani "Centang Semua"
            $("#selectAllCheckbox").on("change", function () {
                var isChecked = $(this).prop("checked");
                $(".dataTerpilihCheckbox").prop("checked", isChecked);
                updateSelectedPhones();
            });

            $(".dataTerpilihCheckbox").on("change", function () {
                updateSelectedPhones();
            });

            function updateSelectedPhones() {
                var selectedPhones = [];
                $(".dataTerpilihCheckbox:checked").each(function () {
                    var phone = $(this).closest("tr").find("td:eq(1)").text();
                    selectedPhones.push(phone);
                });

                // Memperbarui isi div dengan nomor telepon yang dipilih
                $("#selectedPhones").text(selectedPhones.join(", "));
            }
        });
    </script>
</body>
</html>
