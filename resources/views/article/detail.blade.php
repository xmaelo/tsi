 Showing detail for article {{$article->title}}

<hr>
Content:
 <p>
 {{$article->content}}	
 </p>
@if($article->image != '')
 <img src="/{{$article->image}}" width="100px"; height="100px">
 @else
 <p>Not found picture for this post</p>
 @endif
 <p>add at {{$article->created_at}}</p>

<hr>Categories for this articles

@foreach($cathegories as $cathegorie)
<p>{{ $cathegorie->title }}</p>
<p>{{ $cathegorie->description }}</p>
@endforeach

<hr>Tags for this articles

@foreach($tags as $tag)
<p>{{ $tag->tag }}</p>
@endforeach