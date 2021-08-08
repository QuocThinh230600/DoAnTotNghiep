@extends('administrator.master')
@section('module', module('review'))
@section('action', behavior('action.index'))
@section('title', title_module('review', 'index'))

@can('review_create')
    @section('create', route('admin.review.create'))
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
        <table class="table table-hover datatable-colvis-basic" url="{{ route('admin.ajax.reviewDataTables') }}">
            <thead>
                <tr>
                    <th>{{ label('element.table_id') }}</th>
                    <th>{{ label('review.name') }}</th>
                    <th>{{ label('review.phone') }}</th>
                    <th>{{ label('review.email') }}</th>
                    <th>{{ label('review.votes') }}</th>
                    <th>{{ label('review.content') }}</th>
                    <th>{{ label('review.product') }}</th>
                    <th>{{ label('element.status') }}</th>
                    @canany(['review_edit', 'review_destroy'])
                        <th class="text-center">{{ label('element.actions') }}</th>
                    @endcanany
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th data="DT_RowIndex" name="DT_RowIndex" orderable="false" searchable="false"></th>
                    <th type="text" data="name" name="name" orderable="false">{{ label('review.name') }}</th>
                    <th type="text" data="phone" name="phone" orderable="false">{{ label('review.phone') }}</th>
                    <th type="text" data="email" name="email" orderable="false">{{ label('review.email') }}</th>
                    <th type="text" data="votes" name="votes" orderable="false">{{ label('review.votes') }}</th>
                    <th type="text" data="content" name="content" orderable="false">{{ label('review.content') }}</th>
                    <th type="text" data="product_id" name="product_id" orderable="false" searchable="false">{{ label('review.product') }}</th>
                    <th type="select" data="status" name="status">
                        <select class="form-control">
                            <option value="">{{ label('please_choose') }}</option>
                            <option value="on">{{ label('element.default_yes') }}</option>
                            <option value="off">{{ label('element.default_no') }}</option>
                        </select>
                    </th>
                    @canany(['review_edit', 'review_destroy'])
                        <th class="text-center" data="actions" name="actions" orderable="false" searchable="false">{{ label('element.actions') }}</th>
                    @endcanany
                </tr>
            </tfoot>
        </table>
    </x-card>
@endsection
