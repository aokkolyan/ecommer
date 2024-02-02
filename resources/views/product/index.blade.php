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
            <a class="btn btn-success float-right p-2 m-3 " href="{{ route('product.store') }}">Add new Product </a>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th> Price </th>
                            <th> Discount</th>
                            <th> Image</th>  
                            <th> Category</th> 
                            <th> Qty</th> 
                            <th> Description</th> 
                            <th> Create At</th>
                            <th> Actions</th>   
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $pro)
                      
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $pro->title }}</td>
                                <td>{{ $pro->price }}</td>
                                <td>{{ $pro->discount_price }}</td>
                                <td><img src="{{ asset('storage/'.$pro->image) }}"  /></td>
                                <td>{{ $pro->category }}</td>
                                <td>{{ $pro->quatity }}</td>
                                <td>{{ $pro->decription }}</td>
                                <td>{{ $pro->created_at->format('y-m-d') }}</td>
                                <td>
                                    <a href="{{ url('product_update',$pro->id) }}" class="btn btn-success">update</a>
                                </td>
                                <td>
                                    <a href="{{ url('product_delete',$pro->id) }}" class="btn btn-danger" >delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>    
    </div>







        <!-- partial -->
        @include('admin.menu-top');
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</body>

</html>
