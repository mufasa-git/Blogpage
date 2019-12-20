@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
<h3>Edit Comment</h3>
 {{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}

    {{ Form::label('name', "Name:") }}
    {{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}

    {{ Form::label('comment', "Comment:") }}
    {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows' => '3']) }}
    {{ Form::submit('Update Comment', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px']) }}

{{ Form::close() }}
</div>
@endsection