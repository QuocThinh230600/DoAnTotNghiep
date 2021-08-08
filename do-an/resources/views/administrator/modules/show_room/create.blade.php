@extends('administrator.master')
@section('module', module('showRoom'))
@section('action', behavior('action.create'))
@section('title', title_module('showRoom','create'))

@canany(['showRoom_index', 'showRoom_edit', 'showRoom_destroy'])
    @section('index', route('admin.showRoom.index'))
@endcanany

@push('themejs')
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'ui/dragula.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'media/fancybox.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/switch.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'editors/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/sweet_alert.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/selects/bootstrap_multiselect.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'notifications/pnotify.min.js') }}"></script>
    @include('ckfinder::setup')
@endpush

@section('content')
    <form action="{{ route('admin.showRoom.store') }}" method="POST" enctype="multipart/form-data" class="formAjax">
        @csrf
        @method('POST')

        <div class="row">
            @include('administrator.partials.button', ['exit' => route('admin.showRoom.index')])

            <div class="col-lg-8">
                <x-card title="action.info" id="forms-target-left">
                    <x-text label="showRoom.name" type="text" name="name" placeholder="showRoom.name" required="required">
                        {{ old('name') }}
                    </x-text>

                    <x-address></x-address>
                    <x-text label="showRoom.phone" type="text" name="phone" placeholder="showRoom.phone" required="required">
                        {{ old('phone') }} 
                    </x-text>

                    <x-text label="showRoom.description" type="text" name="description" placeholder="showRoom.description" required="required">
                        {{ old('description') }}
                    </x-text>

                    <x-text label="showRoom.script" type="text" name="script" placeholder="showRoom.script" required="required">
                        {{ old('script') }}
                    </x-text>
                </x-card>
            </div>

            <div class="col-lg-4">
                <x-card title="action.info" id="forms-target-right">
                    <x-toggle label="element.status" name="status" on="element.status_enable"  off="element.status_disable" required="required">
                        {{ old('status','on') }}
                    </x-toggle>

                    <x-image name="image">
                        {{ old('image') }}
                    </x-image>
                </x-card>
            </div>

        </div>
    </form>
@endsection
