@extends('admin.layouts.default',['title'=>'Lien - Création'])

@section('content')

<div class="container py-5">
	<form class="form-row" method="POST" action="{{ route('lien.store') }}">
		{{ csrf_field() }}
		<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
		<input type="hidden" name="uuid" value="{{ $lien->uuid }}">
		<input type="hidden" name="demande_id" value="{{ $demande_id }}">
		<div class="form-group col-md-12">
			<label for="url" class="control-label font-weight-bold">@lang('Url')</label>
			<input id="url" type="text" class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" name="url" value="{{ !empty($lien->url) ? $lien->url : old('url') }}" placeholder="Saisir l'url de la demande" autofocus>
			@if ($errors->has('url'))
				<div class="help-block text-danger font-italic">{{ $errors->first('url') }}</div>
			@endif
		</div>
		<div class="form-group col-md-2">
			<label for="valide_at" class="control-label font-weight-bold">@lang('Date Validité')</label>
			<input id="valide_at" type="date" class="form-control {{ $errors->has('valide_at') ? 'is-invalid' : '' }}" name="valide_at" value="{{ !empty($lien->valide_at) ? $lien->valide_at : old('valide_at') }}">
			@if ($errors->has('valide_at'))
				<div class="help-block text-danger font-italic">{{ $errors->first('valide_at') }}</div>
			@endif
		</div>
		<div class="form-group col-md-2">
			<label for="id_prospect" class="control-label font-weight-bold">@lang('Identifiant Prospect')</label>
			<input id="id_prospect" type="text" class="form-control {{ $errors->has('id_prospect') ? 'is-invalid' : '' }}" name="id_prospect" value="{{ old('id_prospect') }}">
			@if ($errors->has('id_prospect'))
				<div class="help-block text-danger font-italic">{{ $errors->first('id_prospect') }}</div>
			@endif
		</div>
		<div class="form-group col-md-3">
			<label for="campagne_recrutement" class="control-label font-weight-bold">@lang('Campagne Recrutement')</label>
			<input id="campagne_recrutement" type="checkbox" class="form-control {{ $errors->has('campagne_recrutement') ? 'is-invalid' : '' }}" name="campagne_recrutement" value="{{ old('campagne_recrutement') }}">
			@if ($errors->has('campagne_recrutement'))
				<div class="help-block text-danger font-italic">{{ $errors->first('campagne_recrutement') }}</div>
			@endif
		</div>
		<div class="form-group col-md-8 col-md-offset-4">
			<button type="submit" class="btn btn-primary">
				@lang('Créer le Lien')
			</button>
			<a class="btn btn-primary" href="{{ url()->previous() }}" role="button">@lang('Annuler')</a>
		</div>
	</form>
</div>

@stop