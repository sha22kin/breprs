@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Project Edit')}}</title>
@endsection 

@push('css')
<style type="text/css">
    .catagorydiv {
        max-height: 300px;
        overflow: auto;
    }
    .catagorydiv ul {
        padding-left: 20px;
    }
    .catagorydiv ul li {
        list-style: none;
    }
    .slugEditData{
        display:none;
    }
</style>
@endpush 
@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Project Edit</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Project Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-outline-primary" href="{{route('admin.projects')}}">BACK</a>
            @isset(json_decode(Auth::user()->permission->permission, true)['projects']['add'])
            <a class="btn btn-outline-primary" href="{{route('admin.projectsAction', 'create')}}">Add Project</a>
            @endisset
            <a class="btn btn-outline-primary" href="{{route('admin.projectsAction', ['edit', $project->id])}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- Basic Elements start -->
    <section class="basic-elements">
        @include(adminTheme().'alerts')
        <form action="{{route('admin.projectsAction', ['update', $project->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Project Edit</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Project Name </label>
                                    <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Project Name" value="{{old('name', $project->name)}}" required="" />
                                    @if ($errors->has('name'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="slugEdit" for="slug" style="color: #3F51B5;cursor: pointer;">Project Slug <i class="fa fa-edit"></i></label>
                                    <input type="text" class="slugEditData form-control {{$errors->has('slug')?'error':''}}" name="slug" placeholder="Project Slug" value="{{old('slug', $project->slug)}}" />
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_description">Location / Division </label>
                                            <input type="text" class="form-control {{$errors->has('seo_description')?'error':''}}" name="seo_description" placeholder="e.g. Dhaka Division" value="{{old('seo_description', $project->seo_description)}}" />
                                            @if ($errors->has('seo_description'))
                                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_description') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_title">Status Badge </label>
                                            <select name="seo_title" class="form-control {{$errors->has('seo_title')?'error':''}}">
                                                <option value="Active" {{ (old('seo_title', $project->seo_title) == 'Active') ? 'selected' : '' }}>Active</option>
                                                <option value="Upcoming" {{ (old('seo_title', $project->seo_title) == 'Upcoming') ? 'selected' : '' }}>Upcoming</option>
                                                <option value="Completed" {{ (old('seo_title', $project->seo_title) == 'Completed') ? 'selected' : '' }}>Completed</option>
                                            </select>
                                            @if ($errors->has('seo_title'))
                                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_title') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="seo_keyword">Metric Tags / Summary Badges </label>
                                    <input type="text" class="form-control {{$errors->has('seo_keyword')?'error':''}}" name="seo_keyword" placeholder="e.g. 15K Trees | 300 Vol | '24-'26" value="{{old('seo_keyword', $project->seo_keyword)}}" />
                                    @if ($errors->has('seo_keyword'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_keyword') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Short Description </label>
                                    <textarea name="short_description" class="form-control {{$errors->has('short_description')?'error':''}}" placeholder="Enter Short Description">{{old('short_description', $project->short_description)}}</textarea>
                                    @if ($errors->has('short_description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('short_description') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="description">Description </label>
                                    <textarea name="description" class="{{$errors->has('description')?'error':''}} summernote" placeholder="Enter Description">{{old('description', $project->description)}}</textarea>
                                    @if ($errors->has('description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">SEO Optimize</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="seo_meta_title">SEO Meta Title</label>
                                    <input type="text" class="form-control {{$errors->has('seo_meta_title')?'error':''}}" name="seo_meta_title" placeholder="Enter SEO Meta Title" value="{{old('seo_meta_title', $project->seo_meta_title ?? '')}}" />
                                    @if ($errors->has('seo_meta_title'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_meta_title') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="seo_meta_description">SEO Meta Description </label>
                                    <textarea name="seo_meta_description" class="form-control {{$errors->has('seo_meta_description')?'error':''}}" placeholder="Enter SEO Meta Description">{{old('seo_meta_description', $project->seo_meta_description ?? '')}}</textarea>
                                    @if ($errors->has('seo_meta_description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_meta_description') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="seo_meta_keyword">SEO Meta Keyword </label>
                                    <textarea name="seo_meta_keyword" class="form-control {{$errors->has('seo_meta_keyword')?'error':''}}" placeholder="Enter SEO Meta Keyword">{{old('seo_meta_keyword', $project->seo_meta_keyword ?? '')}}</textarea>
                                    @if ($errors->has('seo_meta_keyword'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_meta_keyword') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Project Images</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Project Image</label>
                                    <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" />
                                    @if ($errors->has('image'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($project->image())}}" style="max-width: 100px;" />
                                    @isset(json_decode(Auth::user()->permission->permission, true)['projects']['add'])
                                    @if($project->imageFile)
                                    <a href="{{route('admin.mediesDelete',$project->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                                    @endif
                                    @endisset
                                </div>
                                <div class="form-group">
                                    <label for="banner">Project Banner</label>
                                    <input type="file" name="banner" class="form-control {{$errors->has('banner')?'error':''}}" />
                                    @if ($errors->has('banner'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('banner') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($project->banner())}}" style="max-width: 200px;" />
                                    @isset(json_decode(Auth::user()->permission->permission, true)['projects']['add'])
                                    @if($project->bannerFile)
                                    <a href="{{route('admin.mediesDelete',$project->bannerFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                                    @endif
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Project Action</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="status">Project Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" {{$project->status=='active'?'checked':''}}/>
                                            <label class="custom-control-label" for="status">Active</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="fetured">Project Featured</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fetured" name="fetured" {{$project->fetured?'checked':''}}/>
                                            <label class="custom-control-label" for="fetured">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Published Date</label>
                                    <input type="date" class="form-control form-control-sm" name="created_at" value="{{$project->created_at->format('Y-m-d')}}">
                                    @if ($errors->has('created_at'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('created_at') }}</p>
                                    @endif
                                </div>
                                @isset(json_decode(Auth::user()->permission->permission, true)['projects']['add'])
                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save changes</button>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- Basic Inputs end -->
</div>

@endsection @push('js')
    <script>
        $(document).ready(function(){
            $('.slugEdit').click(function(){
                $('.slugEditData').toggle();
            });
        });
        $(".summernote").summernote({
            placeholder: "Hello stand alone ui",
            tabsize: 2,
            height: 120,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link", "picture"]],
                ["view", ["fullscreen", "codeview"]],
            ],
        });
    </script>

@endpush
