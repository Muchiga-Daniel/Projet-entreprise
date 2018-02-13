@extends('admin.layouts.default',['title'=>'Demande - Afficher'])

@section('content')

<div class="container py-1">
	<form class="form-horizontal" method="GET" action="{{ route('demande.edit',$demande) }}">
		<div class="form-group">
			<div class="col-md-4 float-right">
				<label for="user" class="control-label font-weight-bold">@lang('Utilisateur')</label>
				<input id="titre" type="text" class="form-control" name="titre" value="{{ $demande->user->name }}" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-6">
				<label for="titre" class="control-label font-weight-bold">@lang('Titre')</label>
				<input id="titre" type="text" class="form-control" name="titre" value="{{ $demande->titre }}" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<label for="description" class="control-label font-weight-bold">@lang('Description')</label>
				<textarea id="description" class="form-control" name="description" readonly>{{ $demande->description }}</textarea>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-8">
				<label for="url" class="control-label font-weight-bold">@lang('URL')</label>
				<input id="url" type="text" class="form-control" name="url" value="{{ !empty($demande->lien) ? $demande->lien->url : '' }}" readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-1">
				<label for="active" class="control-label font-weight-bold">@lang('Actif')</label>
				<input id="active" type="checkbox" class="form-control" name="active" {{ empty($demande->active) ? '' : 'checked' }} readonly>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<button type="submit" class="btn btn-primary">
					@lang('Modifier la Demande')
				</button>
				<a class="btn btn-primary" href="{{ url()->previous() }}" role="button">@lang('Retour')</a>
				<div class="float-right">
					@if(!empty($demande->lien))
						<a class="btn btn-sm btn-primary" href="{{ route('lien.edit',$demande->lien) }}" role="button">@lang('Editer le Lien')</a>
					@else
						<a class="btn btn-sm btn-primary" href="{{ route('lien.create',['demande_id' => $demande->id]) }}" role="button">@lang('Créer Un Lien')</a>
					@endif
				</div>
			</div>
		</div>
	</form>
</div>

@include('admin.demandes.partials._commentaires_list')

@stop