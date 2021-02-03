@extends('layouts.admin')
@section('content')
@can('alcancedo_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.alcancedos.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.alcancedo.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.alcancedo.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Alcancedo">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.usuario') }}
                        </th>
                        <th>
                            {{ trans('cruds.organizacion.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.periodo_inicial') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.periodo_final') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.ubicacion') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.consumo') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.factor_emision') }}
                        </th>
                        <th>
                            {{ trans('cruds.alcancedo.fields.emisiones_totales') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alcancedos as $key => $alcancedo)
                        <tr data-entry-id="{{ $alcancedo->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $alcancedo->id ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->usuario->id_usuario ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->usuario->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->periodo_inicial ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->periodo_final ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->ubicacion ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->consumo ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->factor_emision ?? '' }}
                            </td>
                            <td>
                                {{ $alcancedo->emisiones_totales ?? '' }}
                            </td>
                            <td>
                                @can('alcancedo_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.alcancedos.show', $alcancedo->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('alcancedo_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.alcancedos.edit', $alcancedo->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('alcancedo_delete')
                                    <form action="{{ route('admin.alcancedos.destroy', $alcancedo->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('alcancedo_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.alcancedos.massDestroy') }}",
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
  let table = $('.datatable-Alcancedo:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection