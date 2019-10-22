<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cathegorie;
use App\Article;
use App\Newsletter;
use App\Applicant;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected $write;
    protected $edit;
    protected $is_admin;

    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $is_admin = $this->is_admin();
        $edit = $this->edit();
        $write = $this->write();

        $articles = Article::all();
        $applicants = Applicant::all();
        if($_POST) {
            Cathegorie::create(['title'=>$_POST['title'], 'description'=>$_POST['content']]);
            return redirect('/home');
        }
        $newsletters = Newsletter::all();
        $users = User::all();
        $cathegories = Cathegorie::all();
        return view('home', compact(['users', 'cathegories', 'articles', 'newsletters', 'applicants', 'is_admin', 'edit', 'write' ]));
    }
    public function deleteAdmin() {

        $id = $_GET['id'];

        $del = User::find($id)->delete();

        if($del) {  
            echo json_encode('ok');  
        }
        else {
            echo json_encode('nok');
        }
        
    }
    public function deleteCat() {

        $id = $_GET['id'];

        $del = Cathegorie::find($id)->delete();

        if($del) {  
            echo json_encode('ok');  
        }
        else {
            echo json_encode('nok');
        }
        
    }
    public function deleteNewsLetter() {

        $id = $_GET['id'];

        $del = Newsletter::find($id)->delete();

        if($del) {  
            echo json_encode('ok');  
        }
        else {
            echo json_encode('nok');
        }
        
    }

    public function deleteApplicant() {

        $id = $_GET['id'];

        $del = Applicant::find($id)->delete();

        if($del) {  
            echo json_encode('ok');  
        }
        else {
            echo json_encode('nok');
        }
        
    }

    public function editAdmin () {
       $id = $_GET['id'];
       $del = User::find($id);
       return view('admin/edit', compact('del'));
        
    }

    public function applicantDetail(Request $request){
        if(isset($_POST['delete'])){
            $id = $_POST['id'];
            Applicant::findOrFail($id)->delete();
            return redirect('/home');
        }
        $id = $request->get('id');
        $applicant = Applicant::findOrFail($id);

        return view('article.applicant', compact('applicant'));
    }


    protected function is_admin(){
        if($this->is_admin = Auth::user()->is_admin == 0) {
            return false;
        }
        else {
            return true;
        }

    }

    protected function edit(){
        if($this->edit = Auth::user()->edit == 0) {
            return false;
        }
        else {
            return true;
        }

    }

    protected function write(){
        if($this->write = Auth::user()->write == 0) {
            return false;
        }
        else {
            return true;
        }

    }
}
