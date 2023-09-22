<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>SMS Portal</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </head>
    <body class="bg-light">
    <div class="container mt-5">
        <div class="row p-4 border rounded-3 bg-body">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        PORTAL                    
                    </div>
                        <div class="card-body">
                            <form method="POST" action="/custom">
                                @csrf
                                <div class="form-group">
    <label>Select contact</label>
    <select name="post[]" multiple class="form-control post">
        @foreach ($users as $user)
            @if ($user->phone === '+6283845930444')
                <option value="{{ $user->phone }}" selected>{{ $user->phone }}</option>
            @else
                <option value="{{ $user->phone }}">{{ $user->phone }}</option>
            @endif
        @endforeach
    </select>
</div>

                                <div class="form-group">
                                    <label>Message</label>
                                        <textarea name="body" class="form-control" rows="3">APA</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
            $('.post').select2();
            });
        </script>
    </body>
</html>