<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cathegorie;
use App\Article;
use App\Tag;
use App\CathegorieArticle;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cathergories = Cathegorie::all();
        $action = 'create';
        return view('article/create', compact(['action', 'cathergories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->get('cathegorie'));
       
        $nomphoto = $this->file($request, 'store', null);
        $tag = explode(";", $request->get('tags'));

        if($request->get('pined') == null) {
            $pined = false;
        }
        else {
            $pined = true;
        }
        
        $insert = Article::create([
            'title' => $request->get('title'), 
            'content' => $request->get('content'),
            'image' => $nomphoto,
            'pined' => $pined 
        ]);

       
        if($insert) {

            $lastInsertId = $insert->id;
            foreach ($request->get('cathegorie') as  $cat) {                
                $insert->cathegories()->attach($cat);
            }

 
            
            for($i=0;$i < count($tag);$i++)
            {
                Tag::create([
                    'article_id' => $lastInsertId,
                    'tag' => $tag[$i]
                ]);
            }
        }


        
        return redirect('/home');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        $article = Article::find($id);
        $tags = $article->tags;
        $cathegories = $article->cathegories;

        return view ('article/show', compact(['article', 'tags', 'cathegories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        $tags = $article->tags;
        $catArc = $article->cathegories;
        $action = 'editing';
        $cathergories = Cathegorie::all();
        $tagsInString = '';
        for($i=0;$i < count($tags);$i++)
        {
            if($tagsInString == '') {
                $tagsInString.= $tags[$i]->tag;
            }
            else {
                $tagsInString.= ';'.$tags[$i]->tag;
            }
        }
        
        return view('article/create', compact([
                                            'action', 
                                            'cathergories', 
                                            'tagsInString', 
                                            'article', 
                                            'catArc'
                                        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $tag = explode(";", $request->get('tags'));

        if($request->get('pined') == null) {
            $pined = false;
        }
        else {
            $pined = true;
        }
        $article = Article::findOrFail($id);

        $nomphoto = $this->file($request, 'update', $article->image);

        $insert = $article->update([
            'title' => $request->get('title'), 
            'content' => $request->get('content'),
            'image' => $nomphoto,
            'pined' => $pined 
        ]);

        $cathegories = $article->cathegories;

       
        foreach ($cathegories as  $cat) {                
                $article->cathegories()->detach($cat);
        }


        foreach ($request->get('cathegorie') as  $cat) {                
                $article->cathegories()->attach($cat);
        }

        $tags = $article->tags;

        for($i=0;$i < count($tags);$i++){
            Tag::where('article_id', $article->id)->delete();
        }

        for($i=0;$i < count($tag);$i++)
            {
                Tag::create([
                    'article_id' => $article->id,
                    'tag' => $tag[$i]
                ]);
            }
        return redirect('/article/'.$article->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $tags = $article->tags;

        for($i=0;$i < count($tags);$i++){
            Tag::where('article_id', $id)->delete();
        }

        Article::destroy($id);
        return redirect('/home');
    }

    protected function file($arg, $source, $lastImg) {

        $arg = $_FILES['image']['name'];


        $file_tmp_name=$_FILES['image']['tmp_name'];
        $extension = pathinfo($arg, PATHINFO_EXTENSION);
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png','JPG');
        if (in_array($extension, $extensions_autorisees))
        {
            $arg = 'img/'.$this->getNom().'.'.$extension;
            move_uploaded_file($file_tmp_name,$arg);
        }
        else
        {
            $arg = "";
        }
        

        if($source == 'update' && $arg == '') {
            $arg = $lastImg;
        }

        return $arg;

    }

    protected function getNom(){

        $characts    = 'abcdefghijklmnopqrstuvwxyz';
        $characts   .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $characts   .= '1234567890';
        $code_aleatoire = '';
     
        for($i=0;$i < 4;$i++)
        {
            $code_aleatoire .=substr($characts,rand()%(strlen($characts)),1);
        }

        return $code_aleatoire;
    }
}
