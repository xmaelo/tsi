<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Article;
use App\Cathegorie;
use App\Newsletter;
use App\Tag;
use App\Applicant;

class BaseController extends Controller
{
    public function index(){
    	if (isset($_POST['email'])) {

    		Newsletter::create([
    			'email' => $_POST['email']
    		]);
    	}
        $pined = Article::where('pined', '1')->get();
    	$cathegories = Cathegorie::all();
    	$articles = Article::all();
        $last_articles = Article::where('id', '>=', 0)->orderBy('id', 'desc')->take(5)->get();
        $most_visited = Article::where('id', '>=', 0)->orderBy('visited', 'desc')->take(5)->get();
        $decrois = Article::all();
        $tab = [];
        $tabId = [];
        foreach ($decrois as $article) {
           array_push($tab, $article->visited);
           array_push($tabId, $article->id);
        }
        $count = count($articles);
        if($count < 5) {
            $last = $count;
        }
        else {
            $last = 5;
        }
        //$most_visited = [];
        for ($i=0; $i < $last; $i++) { 
            $max = max($tab);
        /*    
            foreach ($tab as $key => $value) {
                if ($value == $max) {  
                    var_dump($max);
                    $elemId = $tabId[$key];
                    var_dump($elemId);
                }
            }
        */
            $one = Article::where('visited', $max)->get();
            unset($tab[array_search($max, $tab)]);
            //array_push($most_visited, $one[0]['original']);
         
        }
        //dd($most_visited);

        
        
        
        //personnal view of web application
        return view('article/index', compact([
                                                'articles',
                                                'cathegories', 
                                                'pined', 
                                                'most_visited', 
                                                'last_articles'
                                            ]));
    }

    public function detail(){
        $id = $_GET['id'];
        $article = Article::findOrFail($id);
        $tags = $article->tags;
        $cathegories = $article->cathegories;

        $insert = $article->update([
            'visited' => $article->visited + 1, 
        ]);

        return view('article/detail', compact(['article', 'tags', 'cathegories']));
    }

    public function all(){
        $articles = Article::all();
        $cathegories = Cathegorie::all();
        if (isset($_POST)) {
            if(isset($_POST['two'])) {                
                $q = $_POST['q'];
                $tags = Tag::whereRaw('tag like ?', ["%{$q}%"])->get();
                $arr = [];
                foreach ($tags as $tag) {
                    $id = $tag->article_id;
                    array_push($arr, $id);                
                }
                $articles = Article::find($arr);
            }
            elseif (isset($_POST['cat'])){
                $q = $_POST['cat'];
                $cat = Cathegorie::find($q);
                $articles = $cat->articles;
            } 

        }

        return view('article/all', compact([ 'cathegories', 'articles']));
    }

    public function subscribe(Request $request){
        $tab = array();
        if (isset($_POST['catrine'])) {
            $tab = $this->getValue($request);
            $create = Applicant::create($tab);
            $id = $create->id;

            return view ('article.tempo', compact(['tab', 'id']));

        }
        if(isset($request['save'])){
           return redirect('/');
        }
        if (isset($_POST['edit'])) {

            $id=$request->get('id');
            $edit = Applicant::findOrFail($id);

            return view('article.subscribe', compact('edit'));
            
        }
        if(isset($_POST['update'])){
            $id=$request->get('id');
            $update = Applicant::findOrFail($id);
            $tab = $this->getValue($request);
            $update->update($tab);
            return redirect('/');
        }
        if(isset($_POST['delete'])){
            $id=$request->get('id');
            Applicant::findOrFail($id)->delete();
            return redirect('/');
        }

        return view('article.subscribe');
    }

    function getValue($request){
         $tab = [
                    'appelation' =>$request->get('appelation'),
                    'firstname' =>$request->get('firstname'),
                    'lastname' =>$request->get('lastname'),
                    'dateApplicationStarted' =>$request->get('dateApplicationStarted'),
                    'dateApplicationCompleted' =>$request->get('dateApplicationCompleted'),
                    'email' =>$request->get('email'),
                    'skypeId' =>$request->get('skypeId'),
                    'gender' =>$request->get('gender'),
                    'dob' =>$request->get('dob'),
                    'identityDocument' =>$request->get('identityDocument'),
                    'address' =>$request->get('address'),
                    'cityResidence' =>$request->get('cityResidence'),
                    'countryResidence' =>$request->get('countryResidence'),
                    'nationality' =>$request->get('nationality'),
                    'linkedInURL' =>$request->get('linkedInURL'),
                    'giHubURL' =>$request->get('giHubURL'),
                    'school' => $request->get('school'),
                    'professionalStatus' =>$request->get('professionalStatus'),
                    'maritalStatus' =>$request->get('maritalStatus'),
                    'preferredCountryPostProgram' =>$request->get('preferredCountryPostProgram'),
                    'motivationLetter' =>$request->get('motivationLetter'),
                    'scope1' =>$request->get('scope1'),
                    'scope2' =>$request->get('scope2'),
                ];

        return $tab;
    }
}
