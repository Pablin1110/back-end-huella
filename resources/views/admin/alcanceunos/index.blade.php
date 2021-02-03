@extends('layouts.admin')
@section('content')
@can('alcanceuno_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.alcanceunos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.alcanceuno.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.alcanceuno.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Alcanceuno">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.usuario') }}
                    </th>
                    <th>
                        {{ trans('cruds.organizacion.fields.nombre') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.lugar') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.equipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.tipo') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.cantidad_inicial') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.cantidad_anual') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.factor_emision') }}
                    </th>
                    <th>
                        {{ trans('cruds.alcanceuno.fields.emisiones_totales') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('alcanceuno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alcanceunos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.alcanceunos.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'usuario_id_usuario', name: 'usuario.id_usuario' },
{ data: 'usuario.nombre', name: 'usuario.nombre' },
{ data: 'lugar', name: 'lugar' },
{ data: 'equipo', name: 'equipo' },
{ data: 'tipo', name: 'tipo' },
{ data: 'cantidad_inicial', name: 'cantidad_inicial' },
{ data: 'cantidad_anual', name: 'cantidad_anual' },
{ data: 'factor_emision', name: 'factor_emision' },
{ data: 'emisiones_totales', name: 'emisiones_totales' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Alcanceuno').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection