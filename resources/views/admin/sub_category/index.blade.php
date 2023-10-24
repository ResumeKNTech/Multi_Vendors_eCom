@extends('layouts.app')
@section('module', 'Danh Mục Con')
@section('action', 'Danh Sách')
@section('content')
    <div class="col-xl-4">
        <div class="card custom-card">
            <div class="card-header justify-content-between">
                <div class="card-title">
                    Tạo Danh Mục Con
                </div>

            </div>
            <div class="card-body">
                <form action="{{ route('admin.sub_category.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="sub_category_name" class="form-label">Danh Mục Con</label>
                        <input type="text" name="sub_category_name" id="sub_category_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" id="slug" name="slug" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Short Description</label>
                        <input type="text" id="description" name="description" class="form-control">
                    </div>
                    <p class="fw-semibold mb-2">Danh Mục Cha</p>
                    <select class="form-control" data-trigger name="category_id" id="choices-single-groups">
                        <option value="">Vui lòng chọn</option>
                        <optgroup label="Category">
                            @foreach ($categories as $i)
                                <option value="{{ $i->id }}">{{ $i->category_name }}</option>
                            @endforeach
                        </optgroup>

                    </select>

                    <div id="emailHelp" class="form-text">Làm ơn điền đầy đủ thông tin.</div>
                    
                    <br>
                    <button type="submit" style="width:100%" class="btn btn-primary">Thêm</button>

                </form>

            </div>

        </div>
    </div>
    <div class="col-xl-8">
        <div class="card custom-card">
            <div class="card-header">
                <div class="card-title">
                    Danh Sách
                </div>
            </div>
            <div class="card-body">
                <table id="responsivemodal-DataTable" class="table table-bordered text-nowrap w-100">
                    <thead>
                        <tr>

                            <th>Danh Mục Cha</th>
                            <th>Danh Mục Con</th>
                            <th>Slug</th>
                            <th>Mô Tả</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subCategories as $i)
                            <tr>
                                <td>
                                    {{ $i->category_name }}
                                </td>
                                <td>
                                    {{ $i->sub_category_name }}
                                </td>
                                <td>{{ $i->slug }}</td>
                                <td>{{ $i->description }}</td>

                                <td>
                                    <div class="hstack gap-2 fs-15">
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-success"><i
                                                class="ri-download-2-line"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-icon btn-sm btn-info"><i
                                                class="ri-edit-line"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
        $('#sub_category_name').on('input', function() {
            // Lấy giá trị của Product Title
            var productTitle = $(this).val();

            // Chuyển đổi thành Slug
            var slug = convertToSlug(productTitle);

            // Gán Slug vào trường input Slug
            $('#slug').val(slug);
        });
    </script>
@endsection
