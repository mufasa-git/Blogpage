@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Article</h2>
        </div>
        <div class="pull-right">
            <br/>
            <a class="btn btn-primary" href="{{ route('blogs.index') }}"> Back</a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Title:</strong>
            {{ $article->title}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Content:</strong>
            {{ $article->content}}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
    	<div class="form-group">
			<img src="{{ URL::to('/') }}/articlePhoto/{{ $article->image }}" class="img-thumbnail" />
    	</div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <p style="font-size: 11px; font-style: italic; color: #aaa;">Posted by {{ $article->user->name }}</p>
        <p style="font-size: 11px; font-style: italic; color: #aaa;">{{ $article->created_at }}</p>
    </div>
</div>
<hr>
<h3>Display Comments</h3>
<hr>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        @foreach($comments as $comment)
            @if($comment->article_id == $article->id)
            <div class="comment">
                <h5>Name:</strong> {{ $comment->name }}</h5>
                <p style="font-size: 11px; font-style: italic; color: #aaa;">Posted by {{ $comment->user->name }}</p>
                <p style="font-size: 11px; font-style: italic; color: #aaa;">{{ $comment->created_at }}</p>
                <p><strong>Comment:</strong></br>{{ $comment->comment }}</p>
                <br>
            </div>
            <hr>
            @endif
        @endforeach
    </div>    
</div>
<hr>
<div class="row">
    <div id="comment-form" class="col-md-8 col-md-offset-2" style="margin-top: 50px;">

        {{ Form::open(['route' => ['comments.store', $article->id], 'method' => 'POST']) }}
            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('name', "Name:") }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="col-md-12">
                    {{ Form::label('comment', "Comment:") }}
                    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}
                    {{ Form::submit('Add Comment', ['class' => 'btn btn-success']) }}
                </div>

            </div>
        {{ Form::close() }}
    </div>
</div>
@endsection