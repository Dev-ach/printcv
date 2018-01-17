@extends('layouts.app')


@section('content')

<div class="container">
    @if(count($errors))

        <div class='alert alert-danger'>
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
        

    @endif
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('cvs/'.$cv->id)}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="exampleInputTitre1">Titre</label>
                <input type="text" class="form-control" name="titre" value="{{$cv->titre}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPresentation1">Presentation</label>
                <textarea type="text" class="form-control" name="presentation" >{{$cv->presentation}}</textarea>
            </div>
            <!--<div class="form-group">
                <label for="exampleInputPresentation1">Date de publication</label>
                <input type="text" class="form-control" name="datePublish" placeholder="Presentation">
            </div>-->
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="photo"/>
            </div>
            <input type="submit" class="form-control btn btn-danger" value="Modifier"/>
            
            </form>
        </div>
    </div>
</div>


@endsection