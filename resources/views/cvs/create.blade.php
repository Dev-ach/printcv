@extends('layouts.app')


@section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="{{url('cvs')}}" method="post" enctype="multipart/form-data">
            
            {{ csrf_field() }}

            <div class="form-group @if($errors->get('titre')) has-error @endif">
                <label for="">Titre</label>
                <input type="text" class="form-control" name="titre" placeholder="Enter Titre" value="{{old('titre')}}">
                @if($errors->get('titre'))
                    <div class='alert-danger'>
                        <ul>
                            @foreach($errors->get('titre') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group @if($errors->get('presentation')) has-error @endif">
                <label for="">Presentation</label>
                <textarea type="text" class="form-control" name="presentation" placeholder="Presentation">{{old('presentation')}}</textarea>
                @if($errors->get('presentation'))
                    <div class='alert alert-danger'>
                        <ul>
                            @foreach($errors->get('presentation') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="photo"/>
            </div>
            <!--<div class="form-group">
                <label for="exampleInputPresentation1">Date de publication</label>
                <input type="text" class="form-control" name="datePublish" placeholder="Presentation">
            </div>-->
            <input type="submit" class="form-control btn btn-primary" value="Enregistrer"/>
            
            </form>
        </div>
    </div>
</div>


@endsection