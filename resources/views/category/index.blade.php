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
            <p class="card-description">List category
            </p>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
            <!-- The Modal -->
            <div class="modal fade" id="categoryModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">+ Add New Category</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <form class="forms-sample" action="{{ route('create-category') }}" method="POST" autocomplete="off">
                              @csrf
                                <div class="form-group">
                                    <label for="category_name">Category Name</label>
                                    <input type="text" class="form-control text-white" required id="category_name" name="category_name"
                                        placeholder="category name">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <a class="btn btn-success float-right p-2 m-3 " href="#" data-bs-toggle="modal"
                data-bs-target="#categoryModal">Create Category </a>
            <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th> # </th>
                            <th> Name </th>
                            <th>Create At</th>  
                            <th>Action</th>     
                            
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($category as $cat)
                       <tr>
                          <td>{{ ++$i}} </td>
                          <td> {{$cat->category_name }} </td>    
                          <td>{{$cat->created_at->format('d-m-Y')  }} </td>   
                          <td>
                           
                            <form action="{{ route('categories.destroy',$cat->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('categories.edit',$cat->id) }}" data-bs-toggle="modal"
                                    data-bs-target="#EditModal">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                         </td>                
                     </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- The Modal Edit-->
        <div class="modal fade" id="EditModals">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="forms-sample" action="{{ route('categories.update') }}" method="POST" >
                          @csrf
                            <div class="form-group">
                                <label for="category_name">Category Name</label>
                                <input type="text" class="form-control text-white" required  name="category_name" >
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
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
