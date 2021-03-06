@extends('layouts.default',['title'=>'Contact'])

@section('content')

<div class="container">
	<div class="row card text-white bg-dark">
		<h4 class="card-header">Contactez-moi</h4>
		<div class="card-body">
			<form action="{{ url('contact') }}" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="nom">Nom</label>
					<input type="text" class="form-control {{ $errors->has('nom') ? 'is-invalid' : '' }}" name="nom" id="nom" placeholder="Votre nom" value="{{ old('nom') }}" required>
					{!! $errors->first('nom', '<div class="invalid-feedback">:message</div>') !!}
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" id="email" placeholder="Votre email" value="{{ old('email') }}" required>
					{!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
				</div>
				<div class="form-group">
					<label for="message">Message</label>
					<textarea class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" name="message" id="message" placeholder="Votre message" required>{{ old('message') }}</textarea>
					{!! $errors->first('message', '<div class="invalid-feedback">:message</div>') !!}
				</div>
				<button type="submit" class="btn btn-secondary">Envoyer !</button>
			</form>
		</div>
	</div>
</div>

@stop