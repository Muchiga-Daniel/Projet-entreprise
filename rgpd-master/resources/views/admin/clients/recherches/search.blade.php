@extends('admin.layouts.default',['title'=>'Client - Recherche'])

@section('content')

<div class="container">
	<form class="form" method="POST" action="{{ route('recherche.search') }}">
		{{ csrf_field() }}
		<input type="hidden" name="recherche" value="email">
		<div class="form-row align-items-center">
			<div class="col-md-4">
				<label for="email" class="control-label small sr-only">@lang('Email')</label>
				<input id="email" type="text" class="form-control mb-2 mr-sm-2 {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Saisir l'email" autofocus>
				@if ($errors->has('email'))
					<div class="help-block text-danger font-italic">{{ $errors->first('email') }}</div>
				@endif
			</div>
			<div class="col-auto">
				<button type="submit" class="btn-sm btn-primary mb-2">
					@lang('Recherche Email')
				</button>
			</div>
		</div>
	</form>
	<form class="form" method="POST" action="{{ route('recherche.search') }}">
		{{ csrf_field() }}
		<input type="hidden" name="recherche" value="telephone">
		<div class="form-row align-items-center">
			<div class="col-md-4">
				<label for="telephone" class="control-label small sr-only">@lang('Telephone')</label>
				<input id="telephone" type="text" class="form-control mb-2 mr-sm-2 {{ $errors->has('telephone') ? 'is-invalid' : '' }}" name="telephone" value="{{ old('telephone') }}" placeholder="Saisir le telephone" autofocus>
				@if ($errors->has('telephone'))
					<div class="help-block text-danger font-italic">{{ $errors->first('telephone') }}</div>
				@endif
			</div>
			<div class="col-auto">
				<button type="submit" class="btn-sm btn-primary mb-2">
					@lang('Recherche Téléphone')
				</button>
			</div>
		</div>
	</form>
	<form class="form" method="POST" action="{{ route('recherche.search') }}">
		{{ csrf_field() }}
		<input type="hidden" name="recherche" value="client">
		<div class="form-row align-items-center">
			<div class="col-md-4">
				<label for="nom" class="control-label small sr-only">@lang('Nom')</label>
				<input id="nom" type="text" class="form-control mb-2 mr-sm-2 {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" value="{{ old('Nom') }}" placeholder="Saisir le nom" autofocus>
				@if ($errors->has('nom'))
					<div class="help-block text-danger font-italic">{{ $errors->first('nom') }}</div>
				@endif
			</div>
			<div class="col-md-4">
				<label for="prenom" class="control-label small sr-only">@lang('Prenom')</label>
				<input id="prenom" type="text" class="form-control mb-2 mr-sm-2 {{ $errors->has('prenom') ? 'is-invalid' : '' }}" name="prenom" value="{{ old('Prenom') }}" placeholder="Saisir le prenom" autofocus>
				@if ($errors->has('prenom'))
					<div class="help-block text-danger font-italic">{{ $errors->first('prenom') }}</div>
				@endif
			</div>
			<div class="col-md-2">
				<label for="date_naissance" class="control-label small sr-only">@lang('Date de Naissance')</label>
				<input id="date_naissance" type="date" class="form-control mb-2 mr-sm-2 {{ $errors->has('date_naissance') ? 'is-invalid' : '' }}" name="date_naissance" value="{{ old('Date_Naissance') }}" autofocus>
				@if ($errors->has('date_naissance'))
					<div class="help-block text-danger font-italic">{{ $errors->first('date_naissance') }}</div>
				@endif
			</div>
			<div class="col-auto">
				<button type="submit" class="btn-sm btn-primary mb-2">
					@lang('Recherche Client')
				</button>
			</div>
		</div>
	</form>
</div>

@include('admin.clients.recherches.partials._tab_clients')

@stop