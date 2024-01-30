<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }}</title>
   @include('admin.script');
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.menu-top');
     @include('admin.menu-header');
      <!-- partial -->
     @include('admin.header');
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
   
  </body>
</html>