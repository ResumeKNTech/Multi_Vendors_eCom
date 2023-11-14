@extends('layouts.app')
@section('module', 'Bài Viết')
@section('action', 'Chỉnh Sửa')
@section('content')
    <!-- Bootstrap CSS -->
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#quote'
        });
        tinymce.init({
            selector: 'textarea#summary'
        });
        tinymce.init({
            selector: 'textarea#description'
        });
    </script>
    <style>
        #image-label {
            border: 2px dashed #ccc;
            padding: 10px;
            cursor: pointer;
        }

        #image-preview {
            margin-top: 10px;
        }

        img.preview-image {
            max-width: 100px;
            max-height: 100px;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        ,
    </style>


    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body add-products p-0">
                <form method="post" action="{{route('admin.post.update',$post->id)}}">
                    @csrf 

                    <div class="form-group">
                      <label for="inputTitle" class="col-form-label">Title <span class="text-danger">*</span></label>
                      <input id="inputTitle" type="text" name="title" placeholder="Enter title"  value="{{$post->title}}" class="form-control">
                      @error('title')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label for="quote" class="col-form-label">Quote</label>
                      <textarea class="form-control" id="quote" name="quote">{{$post->quote}}</textarea>
                      @error('quote')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                      <textarea class="form-control" id="summary" name="summary">{{$post->summary}}</textarea>
                      @error('summary')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label for="description" class="col-form-label">Description</label>
                      <textarea class="form-control" id="description" name="description">{{$post->description}}</textarea>
                      @error('description')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
            
                    <div class="form-group">
                      <label for="post_cat_id">Category <span class="text-danger">*</span></label>
                      <select name="post_cat_id" class="form-control">
                          <option value="">--Select any category--</option>
                          @foreach($categories as $key=>$data)
                              <option value='{{$data->id}}' {{(($data->id==$post->post_cat_id)? 'selected' : '')}}>{{$data->title}}</option>
                          @endforeach
                      </select>
                    </div>
                    {{-- {{$post->tags}} --}}
                    @php 
                            $post_tags=explode(',',$post->tags);
                            // dd($tags);
                          @endphp
                    <div class="form-group">
                      <label for="tags">Tag</label>
                      <select name="tags[]" multiple  data-live-search="true" class="form-control selectpicker">
                          <option value="">--Select any tag--</option>
                          @foreach($tags as $key=>$data)
                          
                          <option value="{{$data->title}}"  {{(( in_array( "$data->title",$post_tags ) ) ? 'selected' : '')}}>{{$data->title}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="added_by">Author</label>
                      <select name="added_by" class="form-control">
                          <option value="">--Select any one--</option>
                          @foreach($users as $key=>$data)
                            <option value='{{$data->id}}' {{(($post->added_by==$data->id)? 'selected' : '')}}>{{$data->name}}</option>
                          @endforeach
                      </select>
                    </div>
                    <div class="col-xl-12">
                        <div class="card custom-card">
                            <div class="card-header">
                                <div class="card-title">
                                    Tải Hình
                                </div>
                            </div>
                            <div class="card-body dropzone" ondragover="allowDrop(event)"
                                ondrop="drop(event)" onclick="triggerInputFile()">
                                <input type="file" class="single-fileupload" name="photo"
                                    accept="image/png, image/jpeg, image/gif" style="display: none;"
                                    onchange="handleFileChange(this)">

                                <img id="previewImage" src="#" alt="Image Preview"
                                    style="display:none; max-width:100%;">
                                <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div id="holder" style="margin-top:15px;max-height:100px;"></div>
            
                      @error('photo')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                      <select name="status" class="form-control">
                        <option value="active" {{(($post->status=='active')? 'selected' : '')}}>Active</option>
                        <option value="inactive" {{(($post->status=='inactive')? 'selected' : '')}}>Inactive</option>
                    </select>
                      @error('status')
                      <span class="text-danger">{{$message}}</span>
                      @enderror
                    </div>
                    <div class="form-group mb-3">
                       <button class="btn btn-success" type="submit">Update</button>
                    </div>
                  </form>
            </div>
        
        
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function triggerGalleryInputFile() {
            const input = document.querySelector('.multi-fileupload');
            input.click();
        }

        function dropGallery(event) {
            event.preventDefault();
            const files = event.dataTransfer.files;
            const input = document.querySelector('.multi-fileupload');
            input.files = files;
            handleGalleryChange(input);
        }

        function handleGalleryChange(input) {
            const galleryPreview = document.getElementById('galleryPreview');
            galleryPreview.innerHTML = ''; // Clear current previews

            for (let i = 0; i < input.files.length; i++) {
                const file = input.files[i];
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('preview-image');
                        galleryPreview.appendChild(img);
                    }
                    reader.readAsDataURL(file);
                }
            }
        }
    </script>
    <script>
        function allowDrop(event) {
            event.preventDefault();
        }

        function triggerInputFile() {
            const input = document.querySelector('.single-fileupload');
            input.click();
        }


        function drop(event) {
            event.preventDefault();
            const file = event.dataTransfer.files[0];
            const input = document.querySelector('.single-fileupload');
            input.files = event.dataTransfer.files;
            previewImage(input);
        }

        function previewImage(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('previewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function handleFileChange(input) {
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.getElementById('previewImage');
                    img.src = e.target.result;
                    img.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>




    <script>
        const imagesGalleryInput = document.getElementById('images-gallery-input');
        const imagesGalleryLabel = document.getElementById('images-gallery-label');
        const imagesGalleryPreview = document.getElementById('images-gallery-preview');

        imagesGalleryInput.addEventListener('change', handleImagesGallerySelect);

        function handleImagesGallerySelect(e) {
            const files = e.target.files;
            imagesGalleryPreview.innerHTML = ''; // Clear current preview

            for (let i = 0; i < files.length; i++) {
                const file = files[i];

                if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.classList.add('preview-image');
                    img.file = file;

                    const reader = new FileReader();
                    reader.onload = (function(aImg) {
                        return function(e) {
                            aImg.src = e.target.result;
                        };
                    })(img);

                    reader.readAsDataURL(file);

                    imagesGalleryPreview.appendChild(img);
                }
            }
        }

        imagesGalleryPreview.addEventListener('click', handleImageDelete);

        function handleImageDelete(e) {
            if (e.target && e.target.tagName === 'IMG') {
                const img = e.target;
                img.parentNode.removeChild(img);
                // Note: You may also want to handle the removal from the input file list here.
            }
        }
    </script>
    <!-- DATE & TIME PICKER JS -->
    <script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
@endsection
