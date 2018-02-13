@extends('admin.layouts.default',['title'=>'Demandes - Suppresion'])

@section('content')

<div class="container py-5">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="card">
				<div class="card-header text-white bg-dark">
					@lang('Supprimer une demande')
				</div>
				<div class="card-body">
					<h5 class="card-title">
						@lang('Supprimer la demande :')
					</h5>
					<div class="card-text border">
						@lang($demande->titre)
					</div>
				</div>
				<form class="form-horizontal" method="POST" action="{{ route('demande.destroy', $demande) }}">
					{{ csrf_field() }}
					{{ method_field('DELETE') }}
					<div class="form-group">
						<div class="py-2 col-md-12">
							<button type="submit" class="btn btn-sm btn-danger">
								@lang('Supprimer')
							</button>
							<a class="btn btn-primary" href="{{ url()->previous() }}" role="button">@lang('Annuler')</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

@stop