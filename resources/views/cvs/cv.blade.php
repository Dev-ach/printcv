@extends('layouts.app')

@section('content')

    <div class="container" id="app">
        <div class="row">
            <div class="col-md-12">
            <h1>@{{ msg }}</h1>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title">Experience</h3></div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </div>

                    </div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <li class="list-group-item" v-for="experience in experiences">
                                <div class="pull-right">
                                    <button class="btn btn-warning btn-sm">Edit</button>
                                </div>
                                <h3>@{{experience.titre}}</h3>
                                <p>@{{experience.body}}.</p> 
                                <small>@{{experience.debut}} - @{{experience.fin}}</small>
                            </li> 
                        </ul>
                    </div>
                </div>
            </div>

            <hr>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title">Formation</h3></div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                        
                    </div>
                    <div class="panel-body">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                     Quod commodi sint amet sunt adipisci aliquid voluptatibus quis odio impedit 
                     porro facere voluptates laborum, consectetur labore officiis 
                     eum possimus blanditiis ea.
                    </div>
                </div>
            </div>

            <hr>

            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title">Portfolio</h3></div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                        
                    </div>
                    <div class="panel-body">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                     Quod commodi sint amet sunt adipisci aliquid voluptatibus quis odio impedit 
                     porro facere voluptates laborum, consectetur labore officiis 
                     eum possimus blanditiis ea.
                    </div>
                </div>
            </div>
            
            <hr>
        
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-10"><h3 class="panel-title">Competence</h3></div>
                        <div class="col-md-2 text-right">
                            <button class="btn btn-success">Ajouter</button>
                        </div>
                    </div>
                        
                    </div>
                    <div class="panel-body">
                     Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                     Quod commodi sint amet sunt adipisci aliquid voluptatibus quis odio impedit 
                     porro facere voluptates laborum, consectetur labore officiis 
                     eum possimus blanditiis ea.
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/vue.js')}}"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        var app = new Vue({
            el:'#app',
            data:{
                msg: 'je suis Achraf GORANI',
                experiences:[]
            },
            methods:{
                getExperiences: function(){
                    axios.get('http://localhost:8100/getexperiences')
                    .then(response=>{
                        this.experiences=response.data;
                    })
                    .catch(error=>{
                        console.log('errors: :',error)
                    })
                }
            },
            mounted:function(){
                this.getExperiences();
            }
        });
    </script>

@endsection