@extends('layouts.app')
@section('module', '')
@section('action', '')
@section('content')

            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Sub-category Selection -->
            <div class="form-group">
                <label for="sub_category_id">Sub-category</label>
                <select class="form-control" id="sub_category_id" name="sub_category_id">
                    <!-- Options for sub-category will be populated dynamically using AJAX -->
                </select>
            </div>
@endsection
