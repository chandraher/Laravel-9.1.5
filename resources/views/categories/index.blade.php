@extends('layouts.app')

@section('title', 'Categories')

<!-- [section content start] Awal dari isi utama halaman. Akan dimasukkan ke @yield('content') di layout. -->
@section('content')
<!-- get component page-header -->
<x-page-header :title="'Categories'">
    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm">Add</a>
</x-page-header>
    @if($categories->isEmpty())
        <div class="alert alert-info">No categories found.</div>
    @else
        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th style="width: 180px;">ID</th>
                        <th>Name</th>
                        <th style="width: 40%;">Description</th>
                        <th style="width: 180px;">Created At</th>
                        <th style="width: 180px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $c)
                    <tr>
                        <td><code>{{ $c->id }}</code></td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->description }}</td>
                        <td>{{ $c->created_at }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('categories.edit', $c->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form method="POST" action="{{ route('categories.destroy', $c->id) }}" onsubmit="return confirm('Hapus kategori ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection

