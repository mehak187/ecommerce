<!doctype html>
<html class="no-js" lang=""> 
<head>
    <title>manage products</title>
    @include('../files/dash-links')
   <style>
        .navbar .navbar-nav li > a.products-active {
            font-weight: 700;
            color: #fff !important
        }
    </style>
</head>

<body>
    @include('../files/dash-sidebar')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('../files/adminHeader');
        <!-- /#header -->
        <section>
            <div class="container">
                <div class="mnain-tbl py-4">
                    <div>
                        @if(session('success'))
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{session('success')}} 
                        </p>
                        @endif
                        @if(session('updateSuccess')) 
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{session('updateSuccess')}} 
                        </p>
                        @endif
                        @if(session('deleteSuccess')) 
                        <p class="py-2 px-3 bg-success text-white my-3 rounded">
                            {{session('deleteSuccess')}} 
                        </p>
                        @endif
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>Manage Products</h2>
                        <button class="btn btn-dark">
                            <a href="addProduct" class="d-block w-100 text-light">Add Products</a>
                        </button>
                    </div>
                    <table class="table mt-4  border border-dark border-2">
                        <thead class="bg-dark text-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php $sr=1 ?>
                            @foreach ($products as $product)
                          <tr>
                            <th>{{$sr++}}</th>
                            <td>{{$product['name']}}</td>
                            <td>{{$product['category_name']}}</td>
                            <td>{{$product['price']}}</td>
                            <td>
                                <img src="<?php echo asset("myimgs/" .$product['photo']) ?>" alt="product-img" style="width:60px">
                            </td>
                            <td>
                                <a href="updateProduct/{{$product['id']}}" class="px-3 py-2 mr-2 bg-warning text-light">
                                    Edit
                                </a>
                                <a href="deleteProduct/{{$product['id']}}" class="px-3 py-2 bg-danger text-light">
                                    Delete
                                </a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js-admin/main.js"></script>

</body>
</html>
