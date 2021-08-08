@extends('administrator.master')
@section('module', module('questionProduct'))
@section('action', behavior('action.index'))
@section('title', title_module('questionProduct', 'index'))

@can('questionProduct_create')
    @section('create', route('admin.questionProduct.create'))
@endcan

@push('themejs')
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/buttons.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'tables/datatables/extensions/responsive.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/noty.min.js') }}"></script>
@endpush

@section('content')
    <x-card title="action.info" table="true">
        <table class="table table-hover datatable-colvis-basic" url="{{ route('admin.ajax.questionProductDataTables') }}">
            <thead>
                <tr>
                    <th>{{ label('element.table_id') }}</th>
                    <th>{{ label('questionProduct.question') }}</th>
                    <th>{{ label('questionProduct.answer') }}</th>
                    <th>{{ label('element.status') }}</th>
                    @canany(['questionProduct_edit', 'questionProduct_destroy'])
                        <th class="text-center">{{ label('element.actions') }}</th>
                    @endcanany
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th data="DT_RowIndex" name="DT_RowIndex" orderable="false" searchable="false"></th>
                    <th type="text" data="question" name="question">{{ label('questionProduct.question') }}</th>
                    <th type="text" data="answer" name="answer">{{ label('questionProduct.answer') }}</th>
                    <th type="select" data="status" name="status">
                        <select class="form-control">
                            <option value="">{{ label('please_choose') }}</option>
                            <option value="on">{{ label('element.default_yes') }}</option>
                            <option value="off">{{ label('element.default_no') }}</option>
                        </select>
                    </th>
                    @canany(['questionProduct_edit', 'questionProduct_destroy'])
                        <th class="text-center" data="actions" name="actions" orderable="false" searchable="false">{{ label('element.actions') }}</th>
                    @endcanany
                </tr>
            </tfoot>
        </table>
    </x-card>
@endsection
