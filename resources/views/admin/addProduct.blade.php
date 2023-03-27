<!DOCTYPE html>
<html lang="en">
<head>
	@include('/files/links')
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<title>add Product</title>
</head>
<body>

    <section class="sign-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center py-5">
                <div class="col-6 bg-dark px-4 py-4 rounded-3">
                   <h1 class="text-center text-light fw-normal fs-1">
                        Add Product
                   </h1>
                   <form action="saveProduct" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label for="pro_name" class="form-label text-light fs-5">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="pro_name" placeholder="e.g: Vegetables">
                            @error('product_name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pro_price" class="form-label text-light fs-5">Product Price</label>
                            <input type="number" name="product_price" class="form-control" id="pro_price" placeholder="e.g: 220" style="width:100%">
                            @error('product_price')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pro_catg" class="form-label text-light fs-5">Product Category</label>
                            <select name="product_category" class="form-control" id="pro_catg">
                                <option value="" disabled selected hidden>Choose Category</option>
                                @foreach ($categories as $category)
                                   <option value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                            @error('product_category')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="pro_img" class="form-label text-light fs-5">Product Image</label>
                            <input type="file" name="product_img" class="form-control" id="pro_img" >
                            @error('product_img')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-4 text-center">
                            <button class="btn btn-lg btn-success" type="submit" class="m-0 d-block w-100 w-100 rounded-3 fs-4 fw-bold">
                                Add Product 
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>