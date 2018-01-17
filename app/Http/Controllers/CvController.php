<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Cv;
use App\Experience;
use App\Http\Requests\cvRequest;
use Auth;

class CvController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    //lister les cvs
    public function index(){
        if(Auth::user()->is_admin){
            $listcv = Cv::all();
        }else{
            $listcv = Auth::user()->cvs;
        }
        
        return view('cvs.index',['listcv'=>$listcv]);
    }

    //Enregistrer le cv
    public function store(cvRequest $request){
        $cv = new Cv();

        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');
        $cv->user_id= Auth::user()->id;

       if($request->hasFile('photo')){
            $cv->photo = $request->photo->store('image') ;
       }
            
      
        
        $cv->save();

        session()->flash('success','le cv est bien ajouter');
        return redirect('cvs');

    }

    //Afficher le formulaire de creation de cv
    public function create(){
        return view('cvs.create');
    }

    //recuperer un cv est le mettre dans un formulaire
    public function edit($id){
        $cv = Cv::find($id);

        $this->authorize('update',$cv);

        return view('cvs.edit',['cv'=>$cv]);
    }

    //modifier un cv
    public function update(cvRequest $request,$id){
        $cv = Cv::find($id);
        $cv->titre = $request->input('titre');
        $cv->presentation = $request->input('presentation');

        if($request->hasFile('photo')){
            $cv->photo = $request->photo->store('image') ;
       }

        $cv->save();
        return redirect('cvs');
    }

    //suprimer un cv
    public function destroy(Request $request,$id){
        $cv = Cv::find($id);
        $this->authorize('delete',$cv);

        $cv->delete();
        return redirect('cvs');
    }

    public function show($id){
        return view('cvs.cv',['id'=>$id]); 
    }

    public function getExperiences(){
        $experiences = Experience::all();
        return $experiences;
    }
    
}
