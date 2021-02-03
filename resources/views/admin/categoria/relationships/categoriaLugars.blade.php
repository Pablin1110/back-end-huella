@can('lugar_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.lugars.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.lugar.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.lugar.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-categoriaLugars">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.categoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.subcategoria') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.tipo') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.descripcion') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.direccion') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.latitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.longitud') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.hora_apertura') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.hora_cierre') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.fecha_inicio') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.fecha_fin') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.contactos') }}
                        </th>
                        <th>
                            {{ trans('cruds.lugar.fields.foto') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lugars as $key => $lugar)
                        <tr data-entry-id="{{ $lugar->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $lugar->id ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->categoria->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->subcategoria->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->tipo->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->descripcion ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->direccion ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->latitud ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->longitud ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->hora_apertura ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->hora_cierre ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->fecha_inicio ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->fecha_fin ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->contactos ?? '' }}
                            </td>
                            <td>
                                {{ $lugar->foto ?? '' }}
                            </td>
                            <td>
                                @can('lugar_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.lugars.show', $lugar->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('lugar_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.lugars.edit', $lugar->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('lugar_delete')
                                    <form action="{{ route('admin.lugars.destroy', $lugar->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('lugar_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.lugars.massDestroy') }}",
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
  let table = $('.datatable-categoriaLugars:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection