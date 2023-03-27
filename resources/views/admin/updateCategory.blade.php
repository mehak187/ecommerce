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
                        Update Category
                   </h1>
                   <form action="/editCategory" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <input type="hidden" name="id" class="form-control" id="catg_name" value="{{$data['id']}}">
                        </div>
                        <div class="mb-3">
                            <label for="catg_name" class="form-label text-light fs-5">Category Name</label>
                            <input type="text" name="category_name" class="form-control" id="catg_name" value="{{$data['name']}}">
                        </div>
                        <div class="mb-3">
                            <label for="catg_img" class="form-label text-light fs-5">Category Image</label>
                            <input type="file" name="category_img" class="form-control" id="catg_img" >
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
</body>
</html>