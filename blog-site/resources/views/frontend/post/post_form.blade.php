<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend-assets') }}/images/favicon.png">

    <!-- STYLES -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
    <title>Document</title>
</head>

<body>






    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('post.store') }}" class="mx-auto" method="POST">
                    @csrf
                    <div class="messages"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="text" class="form-control" name="blog_title"
                                    placeholder="Enter Your Blog Title" required="required"
                                    data-error="Name is required.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Name input -->
                            <div class="form-group">
                                <input type="file" class="form-control" name="blog_photo" required="required"
                                    data-error="Name is required.">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- Email input -->
                            <div class="form-group">
                                <select class="form-select form-control" name="category">
                                    <option value="" selected>Open this select menu</option>
                                    @forelse (App\Models\Categories::all() as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                    @empty
                                        <option value="">Nothing added yet</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                        <div class="column col-md-12">
                            <!-- Message textarea -->
                            <div id="summernote"></div>
                        </div>
                    </div>
                    <button class="btn btn-danger rounded-pill" type="submit"
                        style="font-size: 20px; background: linear-gradient(to right, #FE4F70 0%, #FFA387 100%) !important">Post</button>
                </form>
            </div>
        </div>
    </div>




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>
</body>

</html>
