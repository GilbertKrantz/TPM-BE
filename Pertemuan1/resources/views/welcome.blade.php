@extends('template')

@section('title', 'welcome')

@section('body')

<a href="{{route('create')}}" class="btn btn-primary">Create Book</a>

@foreach ($books as $book)
    <div class="card" style="margin: 6rem">
        <div class="card-body">
            <img src="{{asset('/storage/Book/'.$book->Image)}}" class="card-img-top" style="width: 100px">
            <h5 class="card-title">{{$book->Judul}}</h5>
            <p class="card-text">{{$book->Author}}</p>
            <p class="card-text">{{$book->PublishDate}}</p>
            <p class="card-text">{{$book->Stock}}</p>
            <a href="{{route('show', $book->id)}}" class="btn btn-primary">Show</a>
            <a href="{{route('edit', $book->id)}}" class="btn btn-success">Edit</a>
            <form action="/delete/{{$book->id}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endforeach

<form action="/send-mail" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Message</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="message">
    </div>

    <button type="submit" class="btn btn-primary">Send Email</button>
</form>

@endsection
