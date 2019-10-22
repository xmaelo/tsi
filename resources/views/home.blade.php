@extends('layouts.app')
 
@section('content')
<style type="text/css">
    .sty {
        border: solid black 1px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Administration
                </div>
                <div class="panel-body">
                    <div>
                        Liste user

                            <ul>
                                @foreach($users as $user)
                                <li> {{ $user->name }} / {{ $user->email }}
                                @if($edit || $is_admin)
                                    <button onclick='onDelete("{{$user->id}}", "Admin")'>Delete</button> 
                                    <a href="edit?id={{$user->id}}" class="btn btn-default">Edit</a>
                                @else
                                <strong>Don't get privilege to do actions</strong>
                                @endif
                                </li>
                                @endforeach
                            </ul>
                    </div>
                    <hr><hr>
                    <div style="border-color: red solid  1px">
                    @if($write || $is_admin) 
                        <div>
                            <form method="post">
                                {{ csrf_field() }}
                                <div>
                                    <label for="title">Title</label>
                                    <input type="text" name="title" required>
                                </div>
                                 <div>
                                    <label for="content">Content</label>
                                    <input type="text" name="content" required>
                                </div>
                                <input type="submit" name="" value="submit">

                            </form>
                        </div>
                    @else
                    <strong>Don't get privillege to add cathegorie</strong>
                    @endif
                        Liste cathegories
                        <div>
                            <ul>
                                @foreach($cathegories as $cat)
                                <li> {{ $cat->title }}
                                    @if($edit || $is_admin)
                                    <button onclick='onDelete("{{$cat->id}}", "Cat")'>Delete</button>
                                    @else
                                    <strong>don't get privillege</strong>
                                    @endif

                                </li>
                                @endforeach
                            </ul>
                            
                        </div>
                        
                    </div>
                    <hr><hr>
                    <div>
                        Liste des Aeticle
                        @if($write || $is_admin)
                         <a href="article/create"> Add articles</a>
                        @endif
                        <table class="sty" >
                            <tr class="sty">
                                <td class="sty">#</td>
                                <td class="sty">Title</td>
                                <td class="sty">Content</td>
                                <td class="sty">Action</td>
                            </tr>
                            @foreach($articles as $key => $article)
                            <tr class="sty">
                                <td class="sty">{{ $key + 1}}</td>
                                <td class="sty">{{ $article->title }}</td>
                                <td class="sty">{{ $article->content }}</td>
                                <td class="sty">
                                    <a href="article/{{ $article->id }}" class="btn btn-default"> Detail</a>
                                    @if($write || $is_admin)
                                    <a href="article/{{ $article->id }}/edit" class="btn btn-default"> Edit</a>
                                    <form action="{{ route('article.destroy', $article)}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <input type="submit" value="delete">
                                        
                                    </form>
                                    @else
                                    @endif
                                        
                                </td>
                            </tr>
                                 
                            @endforeach;

                        </table>
                    </div>
                    <hr>
                    <div>
                        Newslleter subscribe

                        @if(count($newsletters) != 0)
                        <ul>
                            @foreach($newsletters as $new)
                            
                            <li>
                                {{ $new->email }}
                                @if($edit || $is_admin)
                                <button onclick='onDelete("{{$new->id}}", "NewsLetter")'>Delete</button>
                                @else
                                @endif
                            </li>
                            @endforeach
                        </ul>
                        @else
                        <p>No record found in database</p> 
                        @endif
                    </div>

                    <hr>
                    <hr>
                    <div>
                        List of applicant
                        <ul>
                            @foreach($applicants as $applicant)
                            
                            <li> 
                                {{ $applicant->appelation }} {{ $applicant->lastname }}
                                 {{ $applicant->firstname }}
                                 @if($edit || $is_admin)
                                <button onclick='onDelete("{{$applicant->id}}", "Applicant")'>Delete</button>
                                @else
                                @endif
                                <a href="applicant?id={{ $applicant->id }}"> detail</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function onDelete(arg, attr) {

         $.ajax({
                    type: 'get',
                    url: 'delete'+attr+'?id='+arg,
                    timeout: 3000,
                    success: function(data) {
                         console.log(data);
                         window.location.reload();
                     },
                    error: function() {
                         alert('something wrong'); 

                  }    
                });   
    }


</script>
@endsection
