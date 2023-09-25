<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>Statistik Pelanggan</title>
  </head>

  <body>

    <div class="container" style="margin-top: 80px">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
            DETAIL STATISTIK PELANGGAN
            </div>
            <div class="card-body">
            <a href="{{ route('posts.ip') }}" class="btn btn-warning btn-md ml-2">CEK IP</a>
                            <a href="{{ route('posts.signal') }}" class="btn btn-primary btn-md ml-2">CEK SIGNAL</a>
                            <a href="{{ route('posts.reset') }}" class="btn btn-danger btn-md ml-2">RESET</a>
                            <a href="{{ route('posts.import_excel') }}" class="btn btn-success btn-md ml-2">IMPORT EXCEL</a>
                        <div class="table-responsive">
              <table class="table table-bordered" id="myTable">
                <thead>
                  <tr>
                  <th scope="col"><input type="checkbox" id="selectAllCheckbox"></th>
                  <th scope="col">ID</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">ALAMAT</th>
                                        <th scope="col">TARIF</th>
                                        <th scope="col">DAYA</th>
                                        <th scope="col">NO METER</th>
                                        <th scope="col">M.MTR</th>
                                        <th scope="col">T.MTR</th>
                                        <th scope="col">N.CM.DVC</th>
                                        <th scope="col">MRK.CM.DVC</th>
                                        <th scope="col">TP.CM.DVC</th>
                                        <th scope="col">PORT</th>
                                        <th scope="col">PHONE</th>
                                        <th scope="col">CONTENT</th>
                                        <th scope="col">AKSI</th>
                  </tr>
                </thead>
                <tbody>


                  @foreach($posts as $post)
                  <tr>
                  <td><input type="checkbox" name="selected[]" value="{{ $post->id }}" class="dataTerpilihCheckbox"></td>
                  <td>{{ $post->id_pelanggan  }}</td>
                                        <td>{{ $post->name  }}</td>
                                        <td>{{ $post->address  }}</td>
                                        <td>{{ $post->tariff  }}</td>
                                        <td>{{ $post->daya  }}</td>
                                        <td>{{ $post->no_meter  }}</td>
                                        <td>{{ $post->merk_meter  }}</td>
                                        <td>{{ $post->type_meter  }}</td>
                                        <td>{{ $post->no_comm_device  }}</td>
                                        <td>{{ $post->merk_comm_device  }}</td>
                                        <td>{{ $post->type_comm_device  }}</td>
                                        <td>{{ $post->port  }}</td>
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

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/twilio@3.69.0/dist/twilio.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

        // Fungsi untuk menangani "Centang Semua"
        $("#selectAllCheckbox").on("change", function () {
            var isChecked = $(this).prop("checked");
            $(".dataTerpilihCheckbox").prop("checked", isChecked);
            updateSelectedData(); // Memanggil fungsi yang benar yaitu updateSelectedData
        });

        $(".dataTerpilihCheckbox").on("change", function () {
            updateSelectedData();
        });

        function updateSelectedData() {
            var selectedData = []; // Array untuk menyimpan data yang dicentang
            $(".dataTerpilihCheckbox:checked").each(function () {
                var rowData = {
                    id_pelanggan: $(this).closest("tr").find("td:eq(1)").text(),
                    name: $(this).closest("tr").find("td:eq(2)").text(),
                    address: $(this).closest("tr").find("td:eq(3)").text(),
                    tariff: $(this).closest("tr").find("td:eq(4)").text(),
                    daya: $(this).closest("tr").find("td:eq(5)").text(),
                    no_meter: $(this).closest("tr").find("td:eq(6)").text(),
                    merk_meter: $(this).closest("tr").find("td:eq(7)").text(),
                    type_meter: $(this).closest("tr").find("td:eq(8)").text(),
                    no_comm_device: $(this).closest("tr").find("td:eq(9)").text(),
                    merk_comm_device: $(this).closest("tr").find("td:eq(10)").text(),
                    type_comm_device: $(this).closest("tr").find("td:eq(11)").text(),
                    port: $(this).closest("tr").find("td:eq(12)").text(),
                    content: $(this).closest("tr").find("td:eq(13)").text(),
                };
                selectedData.push(rowData); // Tambahkan data ke dalam array
            });

            // Sekarang selectedData berisi semua data yang dicentang
            console.log("Data yang dicentang:", selectedData);

        }
    </script>
  </body>
</html>