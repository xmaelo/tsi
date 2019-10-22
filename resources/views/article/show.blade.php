show article detail
<br>

@if($article->image != '')
<img src="/{{$article->image}}" width="100px"; height="100px">
@else
<p>Not found picture for this post</p>
@endif
{{ $article->title}}<br>
{{ $article->content}}<br> <br>

Tag of article

<ul>
    @foreach($tags as $tag)
    <li> {{ $tag->tag }}</li>
    @endforeach
</ul>
<br><br>
Cathegories of article

<ul>
    @foreach($cathegories as $cathegorie)
    <li> {{ $cathegorie->title }}
        <p>{{ $cathegorie->description }}</p>
    </li>
    
    @endforeach
</ul>

<div>
	<a href="{{ $article->id }}/edit" class="btn btn-default">Edit</a>
	<form action="{{ route('article.destroy', $article)}}" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="delete">
        
    </form>
</div>
