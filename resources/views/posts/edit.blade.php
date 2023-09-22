<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Edit Post</title>
</head>

<body>

<div class="container" style="margin-top: 80px">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    EDIT POST
                </div>
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>id_pelanggan </label>
                            <input type="text" name="id_pelanggan " placeholder="Masukkan id_pelanggan " value="{{ $post->id_pelanggan  }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>name </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>address </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>tariff </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>daya </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>no_meter </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>merk_meter </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>type_meter </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>no_comm_device </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>merk_comm_device </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>type_comm_device </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>port </label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>phone</label>
                            <input type="text" name="phone" placeholder="Masukkan Phone" value="{{ $post->phone }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>CONTENT</label>
                            <textarea class="form-control" name="content" placeholder="Masukkan Content" rows="4">{{ $post->content }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-success">UPDATE</button>
                        <button type="reset" class="btn btn-warning">RESET</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>