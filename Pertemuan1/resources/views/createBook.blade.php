@extends('template')

@section('title', 'Create Book')

@section('body')

<div class="m-5">
    <h1 class="text-center">Create Book</h1>
    <form action="/store-book" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul</label>
            <input type="text" class="form-control @error('Judul') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="Judul">
                @error('Judul')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
            <input type="text" class="form-control @error('Author') is-invalid @enderror" id="exampleInputPassword1" name="Author">
            @error('Author')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Published Date</label>
            <input type="date" class="form-control @error('PublishDate') is-invalid @enderror" id="exampleInputPassword1" name="PublishDate">
            @error('PublishDate')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stock</label>
            <input type="number" class="form-control @error('Stock') is-invalid @enderror" id="exampleInputPassword1" name="Stock">
            @error('Stock')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" class="form-control @error('Image') is-invalid @enderror" id="exampleInputPassword1" name="Image">
            @error('Image')
                    <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="category">
                @foreach ($categories as $category)
                    <option value='{{$category->id}}'>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@endsection
