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
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-usuarioAlcanceunos">
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
                <tbody>
                    @foreach($alcanceunos as $key => $alcanceuno)
                        <tr data-entry-id="{{ $alcanceuno->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $alcanceuno->id ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->usuario->id_usuario ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->usuario->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->lugar ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->equipo ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->tipo ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->cantidad_inicial ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->cantidad_anual ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->factor_emision ?? '' }}
                            </td>
                            <td>
                                {{ $alcanceuno->emisiones_totales ?? '' }}
                            </td>
                            <td>
                                @can('alcanceuno_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.alcanceunos.show', $alcanceuno->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('alcanceuno_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.alcanceunos.edit', $alcanceuno->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('alcanceuno_delete')
                                    <form action="{{ route('admin.alcanceunos.destroy', $alcanceuno->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('alcanceuno_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alcanceunos.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-usuarioAlcanceunos:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection