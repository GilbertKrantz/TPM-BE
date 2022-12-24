@extends('template')

@section('title', 'Edit Book')

@section('body')

<div class="m-5">
    <h1 class="text-center">Edit Book</h1>
    <form action="/update/{{$book->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Judul</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Judul" value="{{$book->Judul}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Author</label>
            <input type="text" class="form-control" id="exampleInputPassword1" name="Author" value="{{$book->Author}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Published Date</label>
            <input type="date" class="form-control" id="exampleInputPassword1" name="PublishDate" value="{{$book->PublishDate}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stock</label>
            <input type="number" class="form-control" id="exampleInputPassword1" name="Stock" value="{{$book->Stock}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <input type="file" class="form-control" id="exampleInputPassword1" name="Image">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>



@endsection
