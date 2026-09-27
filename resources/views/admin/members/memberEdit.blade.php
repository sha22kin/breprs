@extends(adminTheme().'layouts.app')
@section('title')
<title>{{websiteTitle('Member Edit')}}</title>
@endsection

@push('css')
<style type="text/css">
    .slugEditData{
        display:none;
    }
</style>
@endpush
@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Member Edit</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.members')}}">Members List </a></li>
                    <li class="breadcrumb-item active">Member Edit</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-outline-primary" href="{{route('admin.members')}}">BACK</a>
            @isset(json_decode(Auth::user()->permission->permission, true)['members']['add'])
            <a class="btn btn-outline-primary" href="{{route('admin.membersAction', 'create')}}">Add Member</a>
            @endisset
            <a class="btn btn-outline-primary" href="{{route('admin.membersAction', ['edit', $member->id])}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- Basic Elements start -->
    <section class="basic-elements">
        @include(adminTheme().'alerts')
        <form action="{{route('admin.membersAction', ['update', $member->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- Left Column: Main Info -->
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Member Information</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Member Full Name </label>
                                    <input type="text" class="form-control {{$errors->has('name')?'error':''}}" name="name" placeholder="Enter Member Full Name" value="{{old('name', $member->name)}}" required="" />
                                    @if ($errors->has('name'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="short_description">Designation / Role </label>
                                    <input type="text" class="form-control {{$errors->has('short_description')?'error':''}}" name="short_description" placeholder="e.g. Executive Director" value="{{old('short_description', $member->short_description)}}" />
                                    @if ($errors->has('short_description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('short_description') }}</p>
                                    @endif
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_title">Member ID Badge </label>
                                            <input type="text" class="form-control {{$errors->has('seo_title')?'error':''}}" name="seo_title" placeholder="e.g. BRERP-001" value="{{old('seo_title', $member->seo_title)}}" />
                                            @if ($errors->has('seo_title'))
                                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_title') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="seo_keyword">Phone Number </label>
                                            <input type="text" class="form-control {{$errors->has('seo_keyword')?'error':''}}" name="seo_keyword" placeholder="e.g. +880 1700-000-001" value="{{old('seo_keyword', $member->seo_keyword)}}" />
                                            @if ($errors->has('seo_keyword'))
                                            <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_keyword') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Bio / About </label>
                                    <textarea name="description" class="{{$errors->has('description')?'error':''}} summernote" placeholder="Enter member biography or description">{{old('description', $member->description)}}</textarea>
                                    @if ($errors->has('description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('description') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Social Media Links</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="seo_description">Facebook URL </label>
                                    <input type="text" class="form-control {{$errors->has('seo_description')?'error':''}}" name="seo_description" placeholder="https://facebook.com/username" value="{{old('seo_description', $member->seo_description)}}" />
                                    @if ($errors->has('seo_description'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('seo_description') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="tags">Twitter URL </label>
                                    <input type="text" class="form-control {{$errors->has('tags')?'error':''}}" name="tags" placeholder="https://twitter.com/username" value="{{old('tags', $member->tags)}}" />
                                    @if ($errors->has('tags'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('tags') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="search_key">LinkedIn URL </label>
                                    <input type="text" class="form-control {{$errors->has('search_key')?'error':''}}" name="search_key" placeholder="https://linkedin.com/in/username" value="{{old('search_key', $member->search_key)}}" />
                                    @if ($errors->has('search_key'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('search_key') }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Photo & Actions -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Member Photo</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="image">Profile Photo</label>
                                    <input type="file" name="image" class="form-control {{$errors->has('image')?'error':''}}" accept="image/jpeg,image/png,image/jpg,image/webp,image/gif" />
                                    @if ($errors->has('image'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('image') }}</p>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <img src="{{asset($member->image())}}" style="max-width: 100px; border-radius: 50%; border: 2px solid #e3ebf3;" />
                                    @isset(json_decode(Auth::user()->permission->permission, true)['members']['add'])
                                    @if($member->imageFile)
                                    <a href="{{route('admin.mediesDelete',$member->imageFile->id)}}" class="mediaDelete" style="color: red;"><i class="fa fa-trash"></i></a>
                                    @endif
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                            <h4 class="card-title">Member Action</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="status">Member Status</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" {{$member->status=='active'?'checked':''}}/>
                                            <label class="custom-control-label" for="status">Active</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="fetured">Featured</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="fetured" name="fetured" {{$member->fetured?'checked':''}}/>
                                            <label class="custom-control-label" for="fetured">Active</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Sort Order (Lower = First)</label>
                                    <input type="number" class="form-control form-control-sm" name="drag" value="{{old('drag', $member->drag ?? 0)}}" min="0" placeholder="0" />
                                </div>
                                <div class="form-group">
                                    <label>Published Date</label>
                                    <input type="date" class="form-control form-control-sm" name="created_at" value="{{$member->created_at->format('Y-m-d')}}">
                                    @if ($errors->has('created_at'))
                                    <p style="color: red; margin: 0; font-size: 10px;">{{ $errors->first('created_at') }}</p>
                                    @endif
                                </div>
                                @isset(json_decode(Auth::user()->permission->permission, true)['members']['add'])
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
    $(".summernote").summernote({
        placeholder: "Enter member biography...",
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
