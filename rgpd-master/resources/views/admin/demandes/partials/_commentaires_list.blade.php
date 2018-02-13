<div class="container">
	<h5 class="text-left">@lang('Commentaires')</h5>
	<div class="panel-body">
		<form method="post" action={{ route('commentaire.store') }}>
			{{ csrf_field() }}
			<input type="hidden" name="demande_id" value="{{ $demande->id }}">
			<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
			<div class="form-group">
				<div class="col-md-12">
					<label for="texte" class="control-label font-weight-bold">@lang('Commentaire')</label>
					<textarea id="texte" class="form-control {{ $errors->has('texte') ? 'is-invalid' : '' }}" name="texte" placeholder="Saisir le commentaire">{{ old('texte') }}</textarea>
					@if ($errors->has('texte'))
						<div class="help-block text-danger font-italic">{{ $errors->first('texte') }}</div>
					@endif
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-8 col-md-offset-4">
					<button type="submit" class="btn btn-success">
						@lang('Créer le Commentaire')
					</button>
				</div>
			</div>
		</form>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-hover table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col" style="width: 10%">@lang('utilisateur')</th>
					<th scope="col" style="width: 90%">@lang('Texte')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($commentaires as $commentaire)
					<tr scope="row">
						<td class="small">{{ $commentaire->user->name }}<br/>{{ $commentaire->updated_at }}</td>
						<td>{{ $commentaire->texte }}</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="float-right">
		{{ $commentaires->links('vendor.pagination.bootstrap-4') }}
	</div>
</div>
