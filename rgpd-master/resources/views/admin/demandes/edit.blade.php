@extends('admin.layouts.default',['title'=>'Demande - Edition'])

@section('content')

<div class="container py-5">
	<form class="form-horizontal" method="POST" action="{{ route('demande.update',$demande) }}">
		{{ csrf_field() }}
		{{ method_field('PUT') }}
		<div class="form-group">
			<div class="col-md-6">
				<label for="titre" class="control-label font-weight-bold">@lang('Titre')</label>
				<input id="titre" type="text" class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" name="titre" value="{{ (!empty($demande->titre)) ? $demande->titre : old('titre') }}" placeholder="Saisir le titre de la demande" autofocus>
				@if ($errors->has('titre'))
					<div class="help-block text-danger font-italic">{{ $errors->first('titre') }}</div>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<label for="description" class="control-label font-weight-bold">@lang('Description')</label>
				<textarea id="description" class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" name="description" placeholder="Saisir le détail de la demande">{{ (!empty($demande->description)) ? $demande->description : old('description') }}</textarea>
				@if ($errors->has('description'))
					<div class="help-block text-danger font-italic">{{ $errors->first('description') }}</div>
				@endif
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">
					@lang('Modifier la Demande')
				</button>
				<a class="btn btn-primary" href="{{ url()->previous() }}" role="button">@lang('Annuler')</a>
			</div>
		</div>
	</form>
</div>

@stop