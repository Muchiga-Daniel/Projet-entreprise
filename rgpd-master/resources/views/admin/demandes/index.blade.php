@extends('admin.layouts.default',['title'=>'Demandes'])

@section('content')
<div class="container">
	<div class="btn">
		<a class="btn btn-sm btn-primary" href="{{ route('demande.create') }}" role="button">@lang('Créer Une Nouvelle Demande')</a>
	</div>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col" style="width: 20%">@lang('Titre')</th>
					<th scope="col" style="width: 50%">@lang('Description')</th>
					<th scope="col" style="width: 10%">@lang('Lien')</th>
					<th scope="col" style="width: 20%">@lang('Action')</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($demandes as $demande)
					<tr scope="row">
						<td>{{ $demande->titre }}</td>
						<td>{{ $demande->description }}</td>
						<td>
							@if(count($demande->lien) > 0)
								<a class="btn-sm btn-primary" href="{{ route('lien.edit',$demande->lien) }}" role="button">@lang('Editer le Lien')</a>
							@else
								<a class="btn-sm btn-primary" href="{{ route('lien.create',['demande_id' => $demande->id]) }}" role="button">@lang('Créer Un Lien')</a>
							@endif
						</td>
						<td>
							<a class="btn-sm btn-primary" href="{{ route('demande.show',$demande) }}" role="button">@lang('Afficher')</a>
							<a class="btn-sm btn-primary" href="{{ route('demande.edit',$demande) }}" role="button">@lang('Editer')</a>
							<a class="btn-sm btn-danger" href="{{ route('demande.destroyform',$demande) }}" role="button">@lang('Supprimer')</a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="float-right">
		{{ $demandes->links('vendor.pagination.bootstrap-4') }}
	</div>
</div>

@stop