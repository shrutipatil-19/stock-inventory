@extends('stock-management.layout.app')

@section('page-content')
<div class="page-content">

    <!-- <h6 class="card-title">Add Blog</h6> -->
    {{-- Success Message --}}
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Add Blog</h6>

                        <div class="mb-3">
                            <label>Blog Card Name</label>
                            <input type="text" name="card_title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Blog Name</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Content</label>
                            <textarea id="summernote" name="content"></textarea>

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Horizontal Form</h6>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="status" id="active" value="active">
                                    <label class="form-check-label" for="active">
                                        Active
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="status" id="inactive" value="inactive">
                                    <label class="form-check-label" for="inactive">
                                        Inactive
                                    </label>
                                </div>
                            </div>
                        </div>


                        <!-- <div class="mb-3">
                            <input type="checkbox" name="display_on_home" value="1"> Display on Home
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label">Display On Home</label>
                            <div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" name="display_on_home" class="form-check-input" id="display_on_home" value="1">
                                    <label class="form-check-label" for="display_on_home">
                                        Display on Home
                                </div>
                                </label>
                            </div>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Inputs</h6>
                        <div class="mb-3">
                            <label class="form-label">SEO Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="title" onkeyup="updateSlug()">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SEO Meta Description</label>
                            <input type="text" class="form-control" name="meta_description">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">SEO Meta Keywords</label>
                            <input type="text" class="form-control" name="meta_keywords">
                        </div>
                        <div class="mb-3">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>canonical</label>
                            <input type="url" name="canonicals" id="canonicals" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Schema</label>
                            <input type="text" name="blog_schema" id="blog_schema" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">

                        <h6 class="card-title">Image</h6>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="images[]" multiple class="form-control">
                        </div>
                        <!-- <div class="mb-3">
                            <label>Upload Images</label>
                            <input type="file" name="images[]" multiple class="form-control">
                            <input type="file" id="myDropify"/>
                        </div> -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Upload Images</label>
                            <div class="dropzone" id="imageDropzone"></div>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>
@endsection