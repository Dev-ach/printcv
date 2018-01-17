@extends('layouts.app')

@section('content')

    <div class="container">
    @include('partials.flash')
        <div class="row">
            <div class="col-md-12">
            
                
                
                <h1>La liste de mes cvs <a href="{{url('cvs/create')}}" class="btn btn-success btn-sm pull-right">Nouveau cv</a></h1>
                    
                
                <div class="row">
                @foreach($listcv as $cv)
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="{{asset('storage/'.$cv->photo)}}" alt="">
                            <h3>{{$cv->titre}}</h3>
                            <p>{{$cv->presentation}}</p>
                            <p>
                               <form action="{{ url('cvs/'.$cv->id) }}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <a href="{{ url('cvs/'.$cv->id )}}" class="btn btn-primary" role="button">show</a>
                                    <a href="{{ url('cvs/'.$cv->id.'/edit' )}}" class="btn btn-default" role="button">edit</a>
                                    @can('delete',$cv)
                                    <button type="submit" class="btn btn-danger">supprimer</button>
                                    @endcan
                                </form>
                            </p>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection