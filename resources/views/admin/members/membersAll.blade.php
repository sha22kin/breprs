@extends(adminTheme().'layouts.app')
@section('title')
<title>{{websiteTitle('Members List')}}</title>
@endsection

@push('css')
<style type="text/css"></style>
@endpush

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Members List</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Members List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            @isset(json_decode(Auth::user()->permission->permission, true)['members']['add'])
            <a class="btn btn-outline-primary" href="{{route('admin.membersAction', 'create')}}">Add Member</a>
            @endisset
            <a class="btn btn-outline-primary" href="{{route('admin.members')}}">
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
                                        <form action="{{route('admin.members')}}">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control {{$errors->has('startDate')?'error':''}}" />
                                                        <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control {{$errors->has('endDate')?'error':''}}" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Member Name, Designation" class="form-control {{$errors->has('search')?'error':''}}" />
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
                        <h4 class="card-title">Members List</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.members')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-1">
                                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                                <option value="">Select Action</option>
                                                <option value="1">Active</option>
                                                <option value="2">InActive</option>
                                                <option value="3">Feature</option>
                                                <option value="4">Un-feature</option>
                                                <option value="5">Delete</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <ul class="statuslist">
                                            <li><a href="{{route('admin.members')}}">All ({{$totals->total ?? 0}})</a></li>
                                            <li><a href="{{route('admin.members',['status'=>'active'])}}">Active ({{$totals->active ?? 0}})</a></li>
                                            <li><a href="{{route('admin.members',['status'=>'inactive'])}}">Inactive ({{$totals->inactive ?? 0}})</a></li>
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
                                                <th style="min-width: 300px;">Member Name</th>
                                                <th style="min-width: 100px;">Photo</th>
                                                <th style="min-width: 200px;">Designation / Contact</th>
                                                <th style="min-width: 100px;">Member ID</th>
                                                <th style="min-width: 150px; width: 150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($members as $i=>$member)
                                            <tr>
                                                <td>
                                                    <input class="checkbox" type="checkbox" name="checkid[]" value="{{$member->id}}" /><br />
                                                    {{$members->currentpage()==1?$i+1:$i+($members->perpage()*($members->currentpage() - 1))+1}}
                                                </td>
                                                <td>
                                                    <span><strong>{{$member->name}}</strong></span>
                                                    <br/>
                                                    @if($member->status=='active')
                                                    <span class="badge badge-success">Active </span>
                                                    @elseif($member->status=='inactive')
                                                    <span class="badge badge-danger">Inactive </span>
                                                    @else
                                                    <span class="badge badge-danger">Draft </span>
                                                    @endif
                                                    @if($member->fetured==true)
                                                    <span><i class="fa fa-star" style="color: #1ab394;"></i></span>
                                                    @endif
                                                    <span style="color: #ccc;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$member->created_at->format('d-m-Y')}}</span>
                                                </td>
                                                <td style="padding: 5px; text-align: center;">
                                                    <img src="{{asset($member->image())}}" style="max-width: 50px; max-height: 50px; border-radius: 50%; object-fit: cover;" />
                                                </td>
                                                <td>
                                                    <span>{{$member->short_description ?: '—'}}</span>
                                                    @if($member->seo_keyword)
                                                    <br/><span style="color: #ccc;"><i class="fa fa-phone" style="color: #1ab394;"></i> {{$member->seo_keyword}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge badge-light">{{$member->seo_title ?: '—'}}</span>
                                                </td>
                                                <td style="padding: 5px;">
                                                    <a href="{{route('admin.membersAction', ['edit', $member->id])}}" class="btn btn-sm btn-info">Edit</a>

                                                    @isset(json_decode(Auth::user()->permission->permission, true)['members']['delete'])
                                                    <a href="{{route('admin.membersAction', ['delete', $member->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Want To Delete?')">Delete</a>
                                                    @endisset
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$members->links('pagination')}}
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
