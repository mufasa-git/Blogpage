@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Article</h2>
        </div>
        <div class="pull-right">
            <br/>
            <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
        </div>
    </div>
</div>

{!! Form::model($article, ['method' => 'PATCH', 'files' => true,'route' => ['articles.update', $article->id]]) !!}
     @if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <strong>Whoops!</strong> There were some problems with your input.<br><br>
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

	<div class="row">
	    <div class="col-xs-12 col-sm-12 col-md-12">
	        <div class="form-group">
	            <strong>Title:</strong>
	            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')), 'required' !!}
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
	        <div class="form-group">
	            <strong>Content:</strong>
	            {!! Form::textarea('content', null, array('placeholder' => 'Content','class' => 'form-control','style'=>'height:100px')), 'required' !!}
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
				<strong>Select Image</strong>
				<div class="col-md-8">
			   		<input type="file" name="image" />
             		<img src="{{ URL::to('/') }}/articlePhoto/{{ $article->image }}" class="img-thumbnail" width="100" />
                    <input type="hidden" name="hidden_image" value="{{ $article->image }}" />
			  	</div>
			 </div>
		</div>
	    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	        <button type="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
{!! Form::close() !!}
<hr>
<h3>Edit Comments</h3>
<hr>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @foreach($article->comments as $comment)
            <div class="comment">
                <h5>Name:</strong> {{ $comment->name }}</h5>
                <p style="font-size: 11px; font-style: italic; color: #aaa;">{{ $comment->created_at }}</p>
                <p><strong>Comment:</strong></br>{{ $comment->comment }}</p>
                <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary">Edit</a>
                <a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger">Delete</a>
                <br>
            </div>
            <hr>
        @endforeach
    </div>    
</div>
@endsection