@extends('layouts.app')
@section('module', 'Sản Phẩm')
@section('action', 'Chỉnh Sửa')
@section('content')
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
    </style>
    <div class="col-xl-12">
        <div class="card custom-card">
            <div class="card-body add-products p-0">
                <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="p-4">
                        <div class="row gx-5">
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-3">
                                            <div class="col-xl-12">
                                                <label for="product-name-add" class="form-label">Tên Sản Phẩm:</label>
                                                <input type="text" class="form-control" id="product-name-add"
                                                    name="product_name" value="{{ $product->product_name }}"
                                                    placeholder="Tên sản phẩm...">
                                            </div>
                                            <label for="product-name-add"
                                                class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Tên sản phẩm không
                                                nên
                                                quá 30 kí tự</label>
                                            <div class="col-xl-12">
                                                <label for="product-title-add" class="form-label">Tiêu Đề Sản Phẩm:</label>
                                                <input type="text" class="form-control" id="product_title"
                                                    name="product_title" value="{{ $product->product_title }}"
                                                    placeholder="Tiêu đề sản phẩm...">
                                                <label for="product-name-add"
                                                    class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Tiêu đề sản phẩm
                                                    không
                                                    nên
                                                    quá 30 kí tự</label>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="slug" class="form-label">Slug:</label>
                                                <input type="text" class="form-control" id="slug" name="slug"
                                                    value="{{ $product->slug }}" placeholder="Slug...">

                                                <label for="product-name-add"
                                                    class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Tự động tạo dựa trên
                                                    tiêu đề sản phẩm</label>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="category_id" class="form-label">Danh Mục:</label>
                                                <select class="form-control" data-trigger name="category_id"
                                                    id="category_id">
                                                    <option value="">Danh Mục</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                                            {{ $category->category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="sub_category_id" class="form-label">Danh Mục Con:</label>
                                                <select class="form-control" name="sub_category_id" id="sub_category_id">
                                                    <!-- Assume you have a $sub_categories array passed from the controller -->
                                                    @foreach ($subCategories as $sub_category)
                                                        <option value="{{ $sub_category->id }}"
                                                            {{ $product->sub_category_id == $sub_category->id ? 'selected' : '' }}>
                                                            {{ $sub_category->sub_category_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-12">
                                                <label for="brand_id" class="form-label">Thương Hiệu:</label>
                                                <select class="form-control" data-trigger name="brand_id" id="brand_id">
                                                    <option value="">Thương Hiệu</option>
                                                    @foreach ($brands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                                            {{ $brand->brand_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-xl-6 color-selection">
                                                <label for="product-color-add" class="form-label">Tình Trạng Kho:</label>
                                                <select class="form-control" name="stock_status" id="product-color-add">
                                                    <option value=""
                                                        {{ $product->stock_status == '' ? 'selected' : '' }}>Chọn</option>
                                                    <option value="in_stock"
                                                        {{ $product->stock_status == 'in_stock' ? 'selected' : '' }}>Còn
                                                        Hàng</option>
                                                    <option value="out_of_stock"
                                                        {{ $product->stock_status == 'out_of_stock' ? 'selected' : '' }}>
                                                        Hết Hàng</option>
                                                </select>
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-cost-add" class="form-label">Số Lượng:</label>
                                                <input type="text" name="stock" class="form-control"
                                                    id="product-cost-add" placeholder="Số lượng(0)"
                                                    value="{{ $product->stock }}">
                                                <label for="product-cost-add"
                                                    class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Số lượng sản phẩm
                                                    phải
                                                    lớn hơn 0</label>
                                            </div>
                                            <div class="col-xl-12">
                                                <label for="product-description-add" class="form-label">Mô Tả:</label>
                                                <textarea class="form-control" id="product-description-add" name="short_description">{{ $product->short_description }}</textarea>
                                                <label for="product-description-add"
                                                    class="form-label mt-1 fs-12 op-5 text-muted mb-0">*Mô tả ngắn không nên
                                                    quá 500 từ</label>
                                            </div>
                                            <div class="col-xl-12">
                                                <label class="form-label">Tính Năng Sản Phẩm:</label>
                                                <div id="product-features"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-6 col-xl-12 col-lg-12 col-md-6">
                                <div class="card custom-card shadow-none mb-0 border-0">
                                    <div class="card-body p-0">
                                        <div class="row gy-4">
                                            <div class="col-xl-6">
                                                <label for="product-actual-price" class="form-label">Giá Gốc:</label>
                                                <input type="text" class="form-control" name="price"
                                                    value="{{ $product->price }}" id="product-actual-price"
                                                    placeholder="Vui lòng điền giá gốc..">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="product-dealer-price" class="form-label">Giá KM(%):</label>
                                                <input type="text" class="form-control" name="offer_price"
                                                    value="{{ $product->offer_price }}" id="product-dealer-price"
                                                    placeholder="Vui lòng điền giá KM...">
                                            </div>

                                            <div class="col-xl-6">
                                                <label for="publish-date" class="form-label">Ngày Bắt Đầu KM:</label>
                                                <input type="text" class="form-control" name="sales_begin"
                                                    value="{{ $product->sales_begin }}" id="publish-date"
                                                    placeholder="Vui lòng chọn ngày bắt đầu KM">
                                            </div>
                                            <div class="col-xl-6">
                                                <label for="publish-date" class="form-label">Ngày Kết Thúc:</label>
                                                <input type="text" class="form-control" name="sales_end"
                                                    value="{{ $product->sales_end }}" id="publish-date"
                                                    placeholder="Vui lòng chọn ngày kết thúc KM">
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="card custom-card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            Chỉnh Sửa Hình Main
                                                        </div>
                                                    </div>
                                                    <div class="card-body dropzone" ondragover="allowDrop(event)"
                                                        ondrop="drop(event)" onclick="triggerInputFile()">
                                                        <input type="file" class="single-fileupload" name="images"
                                                            accept="image/png, image/jpeg, image/gif"
                                                            style="display: none;" onchange="handleFileChange(this)">

                                                        <img id="previewImage" src="#" alt="Image Preview"
                                                            style="display:none; max-width:100%;">
                                                        <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="card custom-card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            Hình ảnh sản phẩm hiện tại
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($product->images)
                                                            <img src="{{ asset($product->images) }}"
                                                                alt="Hình ảnh sản phẩm" style="max-width: 200px;">
                                                        @else
                                                            <p>Không có hình ảnh sản phẩm</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-12">
                                                <div class="card custom-card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            Chỉnh Sửa Thư Viện Hình
                                                        </div>
                                                    </div>
                                                    <div class="card-body dropzone" ondragover="allowDrop(event)"
                                                        ondrop="dropGallery(event)" onclick="triggerGalleryInputFile()">
                                                        <input type="file" multiple class="multi-fileupload"
                                                            name="images_gallery[]"
                                                            accept="image/png, image/jpeg, image/gif"
                                                            style="display: none;" onchange="handleGalleryChange(this)">
                                                        <div id="galleryPreview"></div>
                                                        <p>Kéo & thả để chọn hình <label for="images">Tìm kiếm</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="card custom-card">
                                                    <div class="card-header">
                                                        <div class="card-title">
                                                            Thư viện hình ảnh hiện tại
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        @if ($product->images_gallery)
                                                            @php
                                                                $galleryImages = explode(',', $product->images_gallery);
                                                            @endphp
                                                            @foreach ($galleryImages as $image)
                                                                <img src="{{ asset($image) }}" alt="Hình ảnh sản phẩm"
                                                                    style="max-width: 100px; margin-right: 10px;">
                                                            @endforeach
                                                        @else
                                                            <p>Không có hình ảnh trong thư viện</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-6">
                                                <label for="publish-date" class="form-label">Ngày Dự Kiến:</label>
                                                <input type="text" class="form-control" id="publish-date"
                                                    name="publish" placeholder="Vui lòng chọn ngày"
                                                    value="{{ $product->publish }}">
                                            </div>

                                            <div class="col-xl-6">
                                                <label for="product-status-add1" class="form-label">Trạng Thái:</label>
                                                <select class="form-control" data-trigger name="status"
                                                    id="product-status-add1">
                                                    <option value="published"
                                                        {{ $product->status == 'published' ? 'selected' : '' }}>Xuất Bản
                                                    </option>
                                                    <option value="draft"
                                                        {{ $product->status == 'draft' ? 'selected' : '' }}>Nháp</option>
                                                </select>
                                            </div>

                                            <div class="col-xl-6">
                                                <label for="product-tags" class="form-label">Thẻ Tags:</label>
                                                <input type="text" multiple class="form-control" name="product_tags[]" id="product-tags" placeholder="Nhập thẻ tags">
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 border-top border-block-start-dashed d-sm-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-light m-1">Chỉnh Sửa Sản Phẩm<i
                                class="bi bi-plus-lg ms-2"></i></button>
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
        // Sự kiện khi chọn danh mục
        $('#category_id').on('change', function() {
            var selectedCategoryId = $(this).val();

            // Gửi yêu cầu AJAX để lấy danh sách danh mục con
            $.ajax({
                url: '{{ route('admin.product.getSubcategories') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    category_id: selectedCategoryId
                },
                success: function(data) {
                    // Xóa tất cả các tùy chọn hiện có trong danh sách danh mục con
                    $('#sub_category_id').empty();

                    // Thêm tùy chọn danh mục con mới
                    $.each(data, function(key, subCategory) {
                        $('#sub_category_id').append($('<option>', {
                            value: subCategory.id,
                            text: subCategory.sub_category_name
                        }));
                    });
                },
                error: function(error) {
                    console.error(error);
                }
            });
        });

        // Ban đầu, điều này sẽ thiết lập danh sách danh mục con cho danh mục đầu tiên
        $('#category_id').trigger('change');
    </script>

    <script>
        // Hàm chuyển đổi chuỗi thành Slug
        function convertToSlug(text) {
            // Define a dictionary of accented characters and their replacements
            text = text.toLowerCase();

            const accentChars = {
                'á': 'a',
                'à': 'a',
                'ả': 'a',
                'ã': 'a',
                'ạ': 'a',
                'ă': 'a',
                'ắ': 'a',
                'ằ': 'a',
                'ẳ': 'a',
                'ẵ': 'a',
                'ặ': 'a',
                'â': 'a',
                'ấ': 'a',
                'ầ': 'a',
                'ẩ': 'a',
                'ẫ': 'a',
                'ậ': 'a',
                'é': 'e',
                'è': 'e',
                'ẻ': 'e',
                'ẽ': 'e',
                'ẹ': 'e',
                'ê': 'e',
                'ế': 'e',
                'ề': 'e',
                'ể': 'e',
                'ễ': 'e',
                'ệ': 'e',
                'í': 'i',
                'ì': 'i',
                'ỉ': 'i',
                'ĩ': 'i',
                'ị': 'i',
                'ó': 'o',
                'ò': 'o',
                'ỏ': 'o',
                'õ': 'o',
                'ọ': 'o',
                'ô': 'o',
                'ố': 'o',
                'ồ': 'o',
                'ổ': 'o',
                'ỗ': 'o',
                'ộ': 'o',
                'ơ': 'o',
                'ớ': 'o',
                'ờ': 'o',
                'ở': 'o',
                'ỡ': 'o',
                'ợ': 'o',
                'ú': 'u',
                'ù': 'u',
                'ủ': 'u',
                'ũ': 'u',
                'ụ': 'u',
                'ư': 'u',
                'ứ': 'u',
                'ừ': 'u',
                'ử': 'u',
                'ữ': 'u',
                'ự': 'u',
                'ý': 'y',
                'ỳ': 'y',
                'ỷ': 'y',
                'ỹ': 'y',
                'ỵ': 'y',
                'đ': 'd',

            };

            // Replace accented characters with their non-accented counterparts
            text = text.replace(/[áàảãạăắằẳẵặâấầẩẫậéèẻẽẹêếềểễệíìỉĩịóòỏõọôốồổỗộơớờởỡợúùủũụưứừửữựýỳỷỹỵđ]/g, char =>
                accentChars[char] || char);

            // Remove any remaining special characters or spaces
            text = text.replace(/[^\w\s-]/g, '');

            // Replace spaces with hyphens
            text = text.replace(/\s+/g, '-');
            return text;
        }
        // Sự kiện khi nhập Product Title
        $('#product_title').on('input', function() {
            // Lấy giá trị của Product Title
            var productTitle = $(this).val();

            // Chuyển đổi thành Slug
            var slug = convertToSlug(productTitle);

            // Gán Slug vào trường input Slug
            $('#slug').val(slug);
        });
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
