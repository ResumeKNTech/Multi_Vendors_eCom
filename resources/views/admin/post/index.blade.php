@extends('layouts.app')
@section('module', 'Bài Viết')
@section('action', '')
@section('content')

<div class="col-xl-12">
    <div class="card custom-card">
        <div class="card-header justify-content-between">
            <div class="card-title">
                @yield('action')
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($posts) > 0)
                <table class="table text-nowrap">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Tag</th>
                            <th>Author</th>
                            <th>Photo</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        @php
                        $author_info = DB::table('users')
                        ->select('name')
                        ->where('id', $post->added_by)
                        ->get();
                        @endphp
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->cat_info->title }}</td>
                            <td>{{ $post->tags }}</td> 
                            <td>
                                @foreach ($author_info as $data)
                                {{ $data->name }}
                                @endforeach
                            </td>
                            <td>
                                <img src="{{asset($post->photo)}}" alt="kh" height="100px" width="100px">
                            </td>
                            <td>
                                @if ($post->status == 'active')
                                <span class="badge badge-success">{{ $post->status }}</span>
                                @else
                                <span class="badge badge-warning">{{ $post->status }}</span>
                                @endif
                            </td>
                            <td>

                                <div class="hstack gap-2 fs-15">
                                    <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-icon btn-sm btn-info"><i class="ri-edit-line"></i></a>
                                    <a href="#" class="btn btn-icon btn-sm btn-danger" onclick="confirmDelete('{{ route('admin.post.destroy', $post->id) }}')"><i class="ri-delete-bin-6-line"></i></a>
                                </div>


                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <span style="float:right">{{ $posts->links() }}</span>
                @else
                <h6 class="text-center">No posts found!!! Please create Post</h6>
                @endif
                </tbody>
                </table>
                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Xác nhận xóa</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Bạn có chắc chắn muốn xóa sản phẩm này không?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Xóa</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function confirmDelete(deleteUrl) {
            var confirmDeleteButton = document.getElementById("confirmDeleteButton");
            confirmDeleteButton.href = deleteUrl;

            var myModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            myModal.show();
        }

    </script>
</div>
@endsection
