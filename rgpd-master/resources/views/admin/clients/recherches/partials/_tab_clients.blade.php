<div class="container col-auto">
	<h5 class="text-left">@lang('Prospects')</h5>
	<div class="table-responsive">
		<table class="table table-bordered table-hover table-sm">
			<thead class="thead-dark">
				<tr>
					<th scope="col" class="col-auto small">@lang('Id')</th>
					<th scope="col" class="col-auto small">@lang('Date Modification')</th>
					<th scope="col" class="col-auto small">@lang('Nom')</th>
					<th scope="col" class="col-auto small">@lang('Prenom')</th>
					<th scope="col" class="col-auto small">@lang('Date Naissance')</th>
					<th scope="col" class="col-auto small">@lang('Email')</th>
					<th scope="col" class="col-auto small">@lang('Téléphone')</th>
					<th scope="col" class="col-auto small">@lang('Id Prospect Campagne')</th>
					<th scope="col" class="col-auto small">@lang('Id Campagne')</th>
					<th scope="col" class="col-auto small">@lang('Code Campagne')</th>
					<th scope="col" class="col-auto small">@lang('Partenaire')</th>
				</tr>
			</thead>
			@if(isset($prospects))
				<tbody>
					@foreach ($prospects as $prospect)
						<tr scope="row">
							<td class="small">{{ $prospect->Id_Prospect }}</td>
							<td class="small">{{ $prospect->Modiciation_Date }}</td>
							<td class="small">{{ $prospect->Nom }}</td>
							<td class="small">{{ $prospect->Prenom }}</td>
							<td class="small">{{ $prospect->Date_Naissance }}</td>
							<td class="small">{{ $prospect->Email }}</td>
							<td class="small">{{ $prospect->Numero }}</td>
							<td class="small">{{ $prospect->Id_Prospect_Campagne }}</td>
							<td class="small">{{ $prospect->Id_Campagne }}</td>
							<td class="small">{{ $prospect->Code }}</td>
							<td class="small">{{ $prospect->Designation }}</td>
						</tr>
					@endforeach
				</tbody>
			@endif
		</table>
	</div>
	@if(isset($prospects))
		<div class="float-right">
			{{ $prospects->links('vendor.pagination.bootstrap-4') }}
		</div>
	@endif
</div>
