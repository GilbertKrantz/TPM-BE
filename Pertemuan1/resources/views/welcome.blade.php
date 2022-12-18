@extends('template')

@section('title', 'welcome')

@section('body')


@foreach ($books as $book)
    <div class="card" style="margin: 6rem">
        <div class="card-body">
            <h5 class="card-title">{{$book->Judul}}</h5>
            <p class="card-text">{{$book->Author}}</p>
            <p class="card-text">{{$book->PublishDate}}</p>
            <p class="card-text">{{$book->Stock}}</p>
            <a href="{{route('show', $book->id)}}"><button>Show</button></button></a>
        </div>
    </div>
@endforeach


@endsection