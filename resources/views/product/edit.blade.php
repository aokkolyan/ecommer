<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @include('admin.script');
    <style>
        .div_center {
            text-align: center;
            padding-top: 40px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.menu-header');

        <div class="card-body">
            <h4 class="card-title">Inverse table</h4>
            <p class="card-description">List product
            </p>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-12 grid-margin stretch-card ">
                    <div class="card text-white">
                        <div class="card-body">
                            <h4 class="card-title">Edit product</h4>
                            <p class="card-description"> </p>
                            <form class="forms-sample ">
                                <div class="form-group ">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control  text-white" name="title" value="{{ $product->title }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control text-white" name="price" value="{{ $product->price }}">
                                </div>
                                <div class="form-group">
                                    <label for="price">Discoun Price</label>
                                    <input type="number" class="form-control text-white" name="discount_price" value="{{ $product->discount_price }}">
                                </div>
                                <div class="form-group">
                                    <label for="quatity">Quatity</label>
                                    <input type="number" class="form-control text-white" name="quatity" value="{{ $product->quatity }}">
                                </div>
                                <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control text-white" name="category">select
                                        <option  value="{{ $product->category }}">{{ $product->category }}</option>
                                        @foreach ($category as $cat)
                                            <option value="{{ $cat->category_name }}">{{ $cat->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                              
                                <div class="form-group">
                                    <label for="image">Current Image</label>
                                    <div class="input-group mb-3"> 
                                        <img src="{{ asset('storage/'.$product->image) }}" class="img-thumbnail"  alt="Cinque Terre" width="100px;" height="100px">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="image">New Image</label>
                                    <div class="input-group mb-3"> 
                                        <input type="file" class="form-control" id="inputGroupFile02" name="image">
                                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="decription">Description</label>
                                    <textarea class="form-control text-white" name="decription" rows="4">{{ $product->decription }}</textarea>
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a class="btn btn-danger" href="{{ route('product.view') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
            <!-- partial -->
            @include('admin.menu-top');
            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
</body>

</html>

      
