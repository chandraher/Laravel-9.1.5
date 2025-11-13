@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
<x-page-header :title="'Edit Category'">
    <a href="{{ route('categories.index') }}" class="btn btn-light btn-sm">Back</a>
</x-page-header>

<div class="row">
    <div class="col-md-8 col-lg-6">
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $category->id) }}" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" id="id" class="form-control" value="{{ $category->id }}" disabled>
                        <div class="form-text">ID tidak dapat diubah.</div>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" class="form-control @error('name') is-invalid @enderror" placeholder="Category name">
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Optional description">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
