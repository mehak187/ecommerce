<!DOCTYPE html>
<html lang="en">
<head>
	@include('/files/links')
    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Update Category</title>
</head>
<body>

    <section class="sign-sec">
        <div class="container">
            <div class="row justify-content-center align-items-center py-5">
                <div class="col-6 bg-dark px-4 py-4 rounded-3">
                   <h1 class="text-center fw-normal fs-1 text-light">
                        Update Product
                   </h1>
                   <form action="/editProduct" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" value="{{$data[0]['id']}}">
                        </div>
                        <div class="mb-3">
                            <label for="product_name" class="form-label text-light fs-5">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" value="{{$data[0]['name']}}">
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label text-light fs-5">Product Price</label>
                            <input type="text" name="product_price" class="form-control" id="product_price" value="{{$data[0]['price']}}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-light fs-5 w-100">Product Image</label>
                            <label for="pro_img" class="form-label text-light fs-5">   
                                <img src="<?php echo asset("myimgs/" .$data[0]['photo']) ?>" alt="" id="blah" >
                            </label>
                            <input type="file" name="product_img" class="form-control" id="pro_img" style="display:none" onchange="readURL(this);">
                        </div>
                        <div class="mb-3">
                            <label for="pro_catg" class="form-label text-light fs-5">Product Category</label>
                            <select name="product_category" class="form-control" id="pro_catg">
                                @foreach ($categories as $category)
                                   <option 
                                   @if($category['id']==$data[0]['category_id']) selected @endif 
                                    value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                            @error('product_category')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="my-4 text-center">
                            <button class="btn btn-lg btn-success" type="submit" class="m-0 d-block w-100 w-100 rounded-3 fs-4 fw-bold">
                                Update Category 
                            </button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                    };
                reader.readAsDataURL(input.files[0]);
            }
            }
    </script>
</body>
</html>