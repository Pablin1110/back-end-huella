@extends('layouts.admin')
@section('content')
@can('huella_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.huellas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.huella.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.huella.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Huella">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.huella.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.huella.fields.usuario') }}
                        </th>
                        <th>
                            {{ trans('cruds.organizacion.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.huella.fields.alcance_uno') }}
                        </th>
                        <th>
                            {{ trans('cruds.huella.fields.alcance_dos') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($huellas as $key => $huella)
                        <tr data-entry-id="{{ $huella->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $huella->id ?? '' }}
                            </td>
                            <td>
                                {{ $huella->usuario->id_usuario ?? '' }}
                            </td>
                            <td>
                                {{ $huella->usuario->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $huella->alcance_uno ?? '' }}
                            </td>
                            <td>
                                {{ $huella->alcance_dos ?? '' }}
                            </td>
                            <td>
                                @can('huella_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.huellas.show', $huella->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('huella_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.huellas.edit', $huella->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('huella_delete')
                                    <form action="{{ route('admin.huellas.destroy', $huella->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('huella_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.huellas.massDestroy') }}",
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
  let table = $('.datatable-Huella:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection