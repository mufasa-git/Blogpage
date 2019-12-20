@extends('layouts.app')

@section('content')

        @if ($agent->isMobile())

            <h1>Mobile</h1>
        @endif
        <table class="table table-bordered">
            <tr>
                <th width="8%">Title</th>
                <th width="70%">Content</th>
                <th width="10%">Image</th>
                <th width="140px" class="text-center">
                    <a class="btn btn-success btn-sm" href="{{ route('analyze') }}">Analyze</a>
                </th>

            </tr>
            @foreach ($articles as $article)
            <tr>
                <td>{{ $article->title }}</td>
                <td>{{ $article->content }}</td>
                <td><img src="{{ URL::to('/') }}/articlePhoto/{{ $article->image }}" class="img-thumbnail" width="123" /></td>
                <td><a class="btn btn-info btn-sm" href="{{ route('blogs.show',$article->id) }}">View</a></td>

            </tr>
            @endforeach
        </table>
{!! $articles->render() !!}
@endsection