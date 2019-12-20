@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Article Post</h2>
        </div>
    </div>
</div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<table class="table table-bordered">
    <tr>
        <th width="8%">Title</th>
        <th width="70%">Content</th>
        <th width="8%">Image</th>
        <th width="140px" class="text-center">
            <a class="btn btn-success btn-sm" href="{{ route('articles.create') }}">+</i></a>
        </th>
    </tr>
    @foreach ($articles as $article)
    <tr>
        <td>{{ $article->title }}</td>
        <td>{{ $article->content }}</td>
        <td><img src="{{ URL::to('/') }}/articlePhoto/{{ $article->image }}" class="img-thumbnail" width="75" /></td>
        <td>
                <a class="btn btn-info btn-sm" href="{{ route('articles.show',$article->id) }}">View</a>
            @if($user_role == 'admin' || ($user_role == 'author' && $article->user_id == $userId))
                <a class="btn btn-primary btn-sm" href="{{ route('articles.edit',$article->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['articles.destroy', $article->id],'style'=>'display:inline']) !!}
                <button type="submit" style="display: inline;" class="btn btn-danger btn-sm">Delete</button>
                {!! Form::close() !!}
            @endif

        </td>
    </tr>
    @endforeach
</table>

{!! $articles->render() !!}

@endsection