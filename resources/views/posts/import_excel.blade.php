<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Excel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row p-4 border rounded-3 bg-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        Import Excel
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('import_excel') }}" enctype="multipart/form-data">
                            @csrf <!-- Laravel CSRF Protection -->
                            <div class="form-group">
                                <label for="excelFile">Pilih file excel</label>
                                <input type="file" name="file" id="excelFile" class="form-control-file" required="required">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include necessary scripts here if needed -->
</body>
</html>
