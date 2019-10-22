@extends('../layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    Personnal page of website
                    <a href="articles" style="text-align: right;">All artilce</a>
                    &nbsp; &nbsp; &nbsp; &nbsp;<a href="subscribe"> Subscribe</a>
                    <hr>
                    <div>
                        Newsletter
                        <form method="POST">
                            {{ csrf_field()}}
                            <label for="email">Email</label>
                            <input type="email" name="email" required>
                            <input type="submit" value="Subscribe">
                        </form>
                        
                    </div>
                    <hr>
                    <div>
                        <h2>All categories</h2>

                     
                            @foreach($cathegories as $cathegorie)
                            <input type="checkbox" onclick="onGetCategorie('{{ $cathegorie->id }}')"> {{ $cathegorie->title }}
                            @endforeach

                     
                    </div>
                    <hr>
                    <div>
                       <h2> 5 last  articles</h2><br>

                     
                            @foreach($last_articles as $article)
                                @if($article->image != '')
                                <img src="/{{$article->image}}" width="50px" height="50px">
                                @else
                                <p>Not found picture for this post</p>
                                @endif
                             <h4> <a href="detail?id={{$article->id}}">{{$article->title}}</a> </h4>
                             <p>{{ $article->content}}</p>
                             <p><i>Ajouter le {{ $article->created_at}}</i></p>
                            @endforeach
                            
                     
                    </div>
                    <hr>
                    <div>
                        <h2>5 most visited</h2> <br>

                     
                            @foreach($most_visited as $article)

                                @if($article['image'] != '')
                                <img src="/{{$article['image']}}" width="50px" height="50px">
                                @else
                                <p>Not found picture for this post</p>
                                @endif
                             <h4><a href="detail?id={{$article['id']}}">{{$article['title']}}</a> </h4>
                             <p>Ajouter le {{ $article['content']}}</p>
                             <p><i>Ajouter le {{ $article['created_at']}}</i></p><br>
                            @endforeach
                            
                     
                    </div>
                    <hr>

                    <div>
                       <h2> Pined article</h2> <br>

                     
                            @foreach($pined as $pin)
                                @if($pin->image != '')
                                <img src="/{{$pin->image}}" width="50px" height="50px">
                                @else
                                <p>Not found picture for this post</p>
                                @endif
                             <h4> <a href="detail?id={{$pin->id}}">{{$pin->title}}</a> </h4>
                             <p>{{ $pin->content}}</p>
                             <p><i>Ajouter le {{ $pin->created_at}}</i></p>
                            @endforeach
                            
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection