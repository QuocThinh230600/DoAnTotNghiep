@extends('administrator.master')
@section('module', module('category'))
@section('action', behavior('action.create'))
@section('title', title_module('category','create'))

@canany(['category_index', 'category_edit', 'category_destroy'])
    @section('index', route('admin.category.index'))
@endcanany

@push('themejs') 
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'ui/dragula.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'media/fancybox.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/inputs/maxlength.min.js') }}"></script>
    <script src="{{ asset(GLOBAL_ASSETS_PLUG.'forms/tags/tokenfield.min.js') }}"></script>
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
    <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data" class="formAjax">
        @csrf
        @method('POST')

        <div class="row">
            @include('administrator.partials.button', ['exit' => route('admin.category.index')])

            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-transparent border-bottom header-elements-inline">

                        <h6 class="card-title">{{ behavior('action.info') }}</h6>

                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="fullscreen"></a>
                                <a class="list-icons-item" data-action="remove"></a>
                            </div>
                        </div>
                    </div>

                    <div class="bg-light">
                        <ul class="nav nav-tabs nav-tabs-bottom mb-0">
                            <li class="nav-item">
                                <a href="#card-toolbar-tab1" class="nav-link active" data-toggle="tab">
                                    <i class="icon-cube mr-2"></i>
                                    {{ behavior('action.content') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#card-toolbar-tab2" class="nav-link" data-toggle="tab">
                                    <i class="icon-image2 mr-2"></i>
                                    {{ behavior('action.banner') }}
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body tab-content" id="forms-target-left">
                        <div class="tab-pane fade show active" id="card-toolbar-tab1">
                            <x-text label="category.name" type="text" name="name" placeholder="category.name" slug="slug_name" title="title_name" required="required">
                                {{ old('name') }}
                            </x-text>
        
                            <x-text label="category.link" type="text" name="link" placeholder="category.link">
                                {{ old('link') }}
                            </x-text>
        
                            <x-editor label="category.description" name="description">
                                {{ old('description') }}
                            </x-editor>
                            <x-multiple label="seo.meta_robots" name="meta_robots[]" :dataSelect="robot()" required="required">
                                {{ old('meta_robots','index,follow') }}
                            </x-multiple>
        
                            <x-multiple label="seo.meta_google_bot" name="meta_google_bot[]" :dataSelect="robot()" required="required">
                                {{ old('meta_google_bot','index,follow') }}
                            </x-multiple>
        
                            <x-text label="seo.slug" type="text" name="slug" placeholder="seo.slug" id="slug_name" required="required">
                                {{ old('slug') }}
                            </x-text>
        
                            <x-text label="seo.title_tag" type="text" name="title_tag" placeholder="seo.title_tag" id="title_name" required="required">
                                {{ old('title_tag') }}
                            </x-text>
        
                            <x-tag label="seo.meta_keywords" name="meta_keywords" placeholder="seo.meta_description">
                                {{ old('meta_keywords') }}
                            </x-tag>
        
                            <x-description label="seo.meta_description" name="meta_description" placeholder="seo.meta_description">
                                {{ old('meta_description') }}
                            </x-description>
                        </div>

                        <div class="tab-pane fade" id="card-toolbar-tab2">
                            <div class="row">
                                <div class="col-lg-4">
                                    <label class="font-weight-semibold">Banner chính</label>
                                    <x-image name="banner1"> 
                                        {{ old('banner1') }}
                                    </x-image>
                                    <x-text label="category.linkbanner" type="text" name="link1" placeholder="category.linkbanner">
                                        {{ old('link1') }}
                                    </x-text>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-semibold">Banner 2</label>
                                    <x-image name="banner2"> 
                                        {{ old('banner2') }}
                                    </x-image>
                                    <x-text label="category.linkbanner" type="text" name="link2" placeholder="category.linkbanner">
                                        {{ old('link2') }}
                                    </x-text>
                                </div>
                                <div class="col-lg-4">
                                    <label class="font-weight-semibold">Banner 3</label>
                                    <x-image name="banner3"> 
                                        {{ old('banner3') }}
                                    </x-image>
                                    <x-text label="category.linkbanner" type="text" name="link3" placeholder="category.linkbanner">
                                        {{ old('link3') }}
                                    </x-text>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                
            </div>

            <div class="col-lg-4">
                <x-card title="action.info" id="forms-target-right">
                    <div class="form-group">
                        <label class="font-weight-semibold">{{ label('category.parent') }} <span class="text-danger">*</span></label>
                        <select class="form-control parent_position" name="parent_id" data-url="{{ route('admin.ajax.ajaxSelectCategory') }}">
                            <option value="1">------------ ROOT ------------</option>
                            @php
                                recursiveSelect($parent, old('parent_id'))
                            @endphp
                        </select>
                    </div>

                    <x-text label="category.position" type="text" name="position" placeholder="category.position" required="required">
                        {{ old('position',$root_position_max) }}
                    </x-text>

                    {{--  <x-selectbox label="element.open_link" name="open_link" :dataSelect="open_link()" required="required">
                        {{ old('open_link') }}
                    </x-selectbox>

                    <x-multiple label="element.access" name="access[]" :dataSelect="level()" required="required">
                        {{ old('access','1,2') }}
                    </x-multiple>

                    <x-text label="category.icon" type="text" name="icon" placeholder="category.icon">
                        {{ old('icon') }}
                    </x-text>  --}}

                    {{--  <x-toggle label="element.status" name="status" on="element.status_enable"  off="element.status_disable" required="required">
                        {{ old('status','on') }}
                    </x-toggle>  --}}

                    <x-selectbox label="element.featured" name="featured" :dataSelect="featured_cat()" required="required">
                        {{ old('featured') }}
                    </x-selectbox>

                    <label class="font-weight-semibold">Hình ảnh<span class="text-danger">*</span></label>
                    <x-image name="image"> 
                        {{ old('image') }}
                    </x-image>

                    <label class="font-weight-semibold">Hình ảnh trên điện thoại <span class="text-danger">*</span></label>
                    <x-image name="image_mobile"> 
                        {{ old('image_mobile') }}
                    </x-image>
                </x-card>
            </div>

        </div>
    </form>
@endsection
