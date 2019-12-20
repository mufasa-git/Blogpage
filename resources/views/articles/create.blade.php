@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Article</h2>
        </div>
        <div class="pull-right">
        	<br/>
            <a class="btn btn-primary" href="{{ route('articles.index') }}"> Back</a>
        </div>
    </div>
</div>
{!! Form::open(array('route' => 'articles.store','method'=>'POST', 'files' => true)) !!}
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
	            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
	        <div class="form-group">
	            <strong>Content:</strong>
	            {!! Form::textarea('content', null, array('placeholder' => 'Content','class' => 'form-control','style'=>'height:100px')) !!}
	        </div>
	    </div>
	    <div class="col-xs-12 col-sm-12 col-md-12">
		    <div class="form-group">
				<strong>Select Profile Image</strong>
				<div class="col-md-8">
			   		<input type="file" name="image" />
			  	</div>
			 </div>
		</div>
	    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
	        <button type="submit" class="btn btn-primary">Submit</button>
	    </div>
	</div>
{!! Form::close() !!}
@endsection