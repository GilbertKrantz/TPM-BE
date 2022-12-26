@extends('template')

@section('title', 'Show Book')

@section('body')

<div class="card" style="width: 18rem;">
    <div class="card-body">
        <img src="{{asset('/storage/Book/'.$books->Image)}}" class="card-img-top" alt="">
        <h5 class="card-title">{{$books->Judul}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$books->Author}}</h6>
        <p class="card-text">{{$books->PublishDate}}</p>
        <p class="card-text">{{$books->Stock}}</p>
        <p class="card-text">{{$books->category->name}}</p>
        <a class="btn btn-primary" href="{{route('home')}}">Back</a>
    </div>
</div>



@endsection
