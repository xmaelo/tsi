@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $action }}</div>

                <div class="panel-body">
                    {{ $action }} articles
                </div>
                <div class="panel-body">
                @if(!empty($article)) 
                    <form method="post"  action="{{ route('article.update', $article)}}"  enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                @else
                    <form method="post"  action="/article"  enctype="multipart/form-data">
                @endif
                        {{ csrf_field() }}
                        <div>
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{ !empty($article) ? $article->title : ''}}">
                        </div>
                        <div>
                            <label for="content">Content</label>
                            <textarea type="texte" name="content">
                                @if(!empty($article))
                                  {{$article->content}}
                                @endif
                            </textarea> 
                        </div>
                        <div>
                            <label for="cathegories">Cathegories</label>
                            <select name = "cathegorie[]" multiple>
                                @foreach($cathergories as $cat) 
                                <option value="{{ $cat->id }}" 
                                    <?php 

                                            if(isset($catArc)) {
                                                foreach ($catArc as $cats) {
                                                    if($cats->title == $cat->title)
                                                    {
                                                        echo "selected";
                                                    }
                                                }
                                               
                                            }
                                    ?>
                                > {{ $cat->title }}</option>
                                @endforeach;
                            </select>
                        </div>

                        <div>
                            @if(!empty($article)) 
                                @if($article->image != '')
                                <img src="/{{$article->image}}" width="50px" height="50px">
                                @else
                                <p>Not found picture for this post</p>
                                @endif
                                <label for="image">Change image</label>
                            @else
                                <label for="image">Choose image</label>
                            @endif
                            <input type="file" name="image">
                        </div>
                        <div>
                            <label for="pined">Pined</label>
                             @if(!empty($article))
                                @if($article->pined == '1') 
                                <input type="checkbox" name="pined" checked>
                                @else
                                <input type="checkbox" name="pined">
                                @endif
                             @else
                             <input type="checkbox" name="pined">
                             @endif
                        </div>
                         <div>
                            <label for="tags">Tags</label>
                            <input type="text" name="tags" placeholder="Entrez vos tags separer par des vigules" value="{{ !empty($tagsInString) ? $tagsInString : ''}}">
                        </div>
                        <div>
                            <input type="submit" name="Submit">
                        </div>

                        
                    </form>
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
