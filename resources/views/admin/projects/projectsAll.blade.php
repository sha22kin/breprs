@extends(adminTheme().'layouts.app') 
@section('title')
<title>{{websiteTitle('Projects List')}}</title>
@endsection 

@push('css')
<style type="text/css"></style>
@endpush 

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Projects List</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Projects List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            @isset(json_decode(Auth::user()->permission->permission, true)['projects']['add'])
            <a class="btn btn-outline-primary" href="{{route('admin.projectsAction', 'create')}}">Add Project</a>
            @endisset
            <a class="btn btn-outline-primary" href="{{route('admin.projects')}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
        </div>
    </div>
</div>

<div class="content-body">
    <!-- Basic Elements start -->
    <section class="basic-elements">
        <div class="row">
            <div class="col-md-12">
                @include(adminTheme().'alerts')
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div id="accordion">
                                <div
                                    class="card-header collapsed"
                                    data-toggle="collapse"
                                    data-target="#collapseTwo"
                                    aria-expanded="false"
                                    aria-controls="collapseTwo"
                                    id="headingTwo"
                                    style="background: #f5f7fa; padding: 10px; cursor: pointer; border: 1px solid #00b5b8;"
                                >
                                    Search click Here..
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion" style="border: 1px solid #00b5b8; border-top: 0;">
                                    <div class="card-body">
                                        <form action="{{route('admin.projects')}}">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                                                        <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Project Name, Location" class="form-control {{$errors->has('search')?'error':''}}" />
                                                        <button type="submit" class="btn btn-success btn-sm rounded-0">Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">Projects List</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.projects')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-1">
                                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                                <option value="">Select Action</option>
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
                                                <option value="5">Delete</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <ul class="statuslist">
                                            <li><a href="{{route('admin.projects')}}">All ({{$totals->total ?? 0}})</a></li>
                                            <li><a href="{{route('admin.projects',['status'=>'active'])}}">Active ({{$totals->active ?? 0}})</a></li>
                                            <li><a href="{{route('admin.projects',['status'=>'inactive'])}}">Inactive ({{$totals->inactive ?? 0}})</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th style="min-width: 60px;">
                                                    <label style="cursor: pointer; margin-bottom: 0;"> <input class="checkbox" type="checkbox" class="form-control" id="checkall" /> All <span class="checkCounter"></span> </label>
                                                </th>
                                                <th style="min-width: 300px;">Project Name</th>
                                                <th style="min-width: 100px;">Image</th>
                                                <th style="min-width: 200px;">Location / Status</th>
                                                <th style="min-width: 150px; width: 150px;">Action/Author</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($projects as $i=>$project)
                                            <tr>
                                                <td>
                                                    <input class="checkbox" type="checkbox" name="checkid[]" value="{{$project->id}}" /><br />
                                                    {{$projects->currentpage()==1?$i+1:$i+($projects->perpage()*($projects->currentpage() - 1))+1}}
                                                </td>
                                                <td>
                                                    <span><a href="{{route('projectView', $project->slug ?: $project->id)}}" target="_blank">{{$project->name}}</a></span>
                                                    <br/>
                                                    <span style="color: #ccc;"><i class="fa fa-eye" style="color: #1ab394;"></i> 0</span>

                                                    @if($project->status=='active')
                                                    <span class="badge badge-success">Active </span>
                                                    @elseif($project->status=='inactive')
                                                    <span class="badge badge-danger">Inactive </span>
                                                    @else
                                                    <span class="badge badge-danger">Draft </span>
                                                    @endif

                                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$project->created_at->format('d-m-Y')}}</span>
                                                </td>
                                                <td style="padding: 5px; text-align: center;">
                                                    <img src="{{asset($project->image())}}" style="max-width: 80px; max-height: 50px;" />
                                                </td>
                                                <td>
                                                    {{$project->seo_description ?: 'Bangladesh'}}
                                                    @if($project->seo_title)
                                                    <br/><span class="badge badge-info">{{$project->seo_title}}</span>
                                                    @endif
                                                </td>
                                                <td style="padding: 5px;">
                                                    <a href="{{route('admin.projectsAction', ['edit', $project->id])}}" class="btn btn-sm btn-info">Edit</a>

                                                    @isset(json_decode(Auth::user()->permission->permission, true)['projects']['delete'])
                                                    <a href="{{route('admin.projectsAction', ['delete', $project->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Want To Delete?')">Delete</a>
                                                    @endisset
                                                    <br />
                                                    <span style="color: #ccc;">
                                                        <i class="fa fa-user" style="color: #1ab394;"></i>
                                                        {{Str::limit($project->user?$project->user->name:'No Author',15)}}
                                                    </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$projects->links('pagination')}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Basic Inputs end -->
</div>

@endsection 

@push('js')
<script type="text/javascript">
    
</script>
@endpush
