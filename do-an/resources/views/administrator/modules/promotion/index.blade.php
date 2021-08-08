@extends('administrator.master')
@section('module', module('promotion'))
@section('action', behavior('action.index'))
@section('title', title_module('promotion','index'))

@can('promotion_create')
    @section('create',route('admin.promotion.create'))
@endcan

@push('themejs')
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/select2.min.js') }}"></script>
@endpush

@section('content')
    <x-card title="action.info" table="true">
        <table class="table table-hover datatable-colvis-basic" url="{{ route('admin.ajax.promotionDataTables') }}">
            <thead>
                <tr>
                    <th>{{ label('element.table_id') }}</th>
                    <th>{{ label('news.image') }}</th>
                    <th>{{ label('news.title') }}</th>
                    <th>{{ label('news.date_start') }}</th>
                    <th>{{ label('news.date_end') }}</th>
                    <th>{{ label('element.status') }}</th>
                    <th>{{ label('element.featured') }}</th>
                        <th class="text-center">{{ label('element.actions') }}</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th data="DT_RowIndex" name="DT_RowIndex" orderable="false" searchable="false"></th>
                    <th data="image" name="image"></th>
                    <th type="text" data="title" name="title">{{ label('news.title') }}</th>
                    <th type="text" name="date_start" data="date_start" orderable="false" searchable="false">{{ label('news.date_start') }}</th>
                    <th type="text" name="date_end" data="date_end" orderable="false" searchable="false">{{ label('news.date_end') }}</th>
                    <th type="select" data="status" name="status">
                        <select class="form-control">
                            <option value="">{{ label('please_choose') }}</option>
                            @foreach (status() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th type="select" data="featured" name="featured">
                        <select class="form-control">
                            <option value="">{{ label('please_choose') }}</option>
                            @foreach (featured() as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </th>
                        <th class="text-center" data="actions" name="actions" orderable="false" searchable="false">{{ label('element.actions') }}</th>
                </tr>
            </tfoot>
        </table>
    </x-card>
@endsection
