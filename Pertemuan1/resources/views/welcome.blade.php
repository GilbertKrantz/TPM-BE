@extends('template')

@section('title', 'welcome')

@section('body')


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


@endsection
