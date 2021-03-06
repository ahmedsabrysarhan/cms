<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel CMS</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('frontend/css/blog-home.css')}}" rel="stylesheet">

    </head>

    <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
            <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
            </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <h1 class="my-4">Page Heading
            <small>Secondary Text</small>
        </h1>

        <!-- Blog Post -->
        @foreach ($posts as $post)
        <div class="card mb-4">
            <img class="card-img-top" src="{{asset('storage/' . $post->image)}}" alt="Card image cap">
            <div class="card-body">
            <h2 class="card-title">{{$post->title}}</h2>
            <p class="card-text">{{$post->description}}</p>
            <a href="{{route('front.post.show' , $post->id)}}" class="btn btn-primary">Read More &rarr;</a>
            </div>    
            <div class="card-footer text-muted">
            {{$post->created_at}} | 
            <a href="#">{{$post->user->name}}</a>
            </div>
        </div>
        @endforeach
        
        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

        <!-- Categories Widget -->
        <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled mb-0">
                        @foreach ($categories as $category)
                        <li>
                            <a href="#">{{$category->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                
            </div>
            </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
            <h5 class="card-header">Side Widget</h5>
            <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
            </div>
        </div>

        </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-3 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

</body>

</html>
