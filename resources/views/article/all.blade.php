@extends('../layouts.app')

@section('content')   
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">All Post</div>

                <div class="panel-body">           


                    <h3>Liste cathegories</h3>
                            <div>
                                <form id="myForm" method="post">
                                    {{ csrf_field() }}
                                    @foreach($cathegories as $cat)
                                        <input type="radio" name="cat"  value="{{$cat->id}}" onclick="onSearch('{{$cat->id}}')">{{$cat->title}}
                                    @endforeach
                                </form>
                                
                                
                            </div>
                            
                        </div>
                        <hr><hr>
                        <form method="post">
                            {{ csrf_field() }}
                            <input type="search" name="q" placeholder="enter tag for some article">
                            <input type="submit" value="search"  name="two">
                        </form>
                        <div>
                            Liste des Article

                            @foreach($articles as $article)
                                <div>
                                    <h2>{{$article->title}}</h2>
                                    <p><b>{{$article->content}}</b></p>  
                                     </p>
                                    @if($article->image != '')
                                     <img src="/{{$article->image}}" width="100px"; height="100px">
                                     @else
                                     <p>Not found picture for this post</p>
                                     @endif
                                     <p><i>add at {{$article->created_at}}</i></p>

                                   <h4>Categorie for this articles</h4>

                                    @foreach($cathegories as $cathegorie)
                                    <p>{{ $cathegorie->title }}</p>
                                    <p>{{ $cathegorie->description }}</p>
                                    @endforeach
                                    <hr>

                                </div>
                            @endforeach
                           
                       </div>
                 </div>
            </div>
        </div>
    </div>
</div>
                        <script type="text/javascript">
                            function onSearch(arg){
                                $('form#myForm').submit();
                            }
                        </script>

@endsection