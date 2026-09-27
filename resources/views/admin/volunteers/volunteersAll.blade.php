@extends(adminTheme().'layouts.app')
@section('title')
<title>{{websiteTitle('Volunteer Applications')}}</title>
@endsection

@push('css')
<style type="text/css"></style>
@endpush

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Volunteer Applications</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Volunteer Applications</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group">
            <a class="btn btn-outline-primary" href="{{route('admin.volunteers')}}">
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
                                        <form action="{{route('admin.volunteers')}}">
                                            <div class="row">
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="date" name="startDate" value="{{request()->startDate?Carbon\Carbon::parse(request()->startDate)->format('Y-m-d') :''}}" class="form-control" />
                                                        <input type="date" value="{{request()->endDate?Carbon\Carbon::parse(request()->endDate)->format('Y-m-d') :''}}" name="endDate" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-1">
                                                    <div class="input-group">
                                                        <input type="text" name="search" value="{{request()->search?request()->search:''}}" placeholder="Name, Email, Mobile" class="form-control" />
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
                        <h4 class="card-title">Volunteer Applications</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.volunteers')}}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="input-group mb-1">
                                            <select class="form-control form-control-sm rounded-0" name="action" required="">
                                                <option value="">Select Action</option>
                                                <option value="1">Approve</option>
                                                <option value="2">Reject</option>
                                                <option value="3">Pending</option>
                                                <option value="5">Delete</option>
                                            </select>
                                            <button class="btn btn-sm btn-primary rounded-0" onclick="return confirm('Are You Want To Action?')">Action</button>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <ul class="statuslist">
                                            <li><a href="{{route('admin.volunteers')}}">All ({{$totals->total ?? 0}})</a></li>
                                            <li><a href="{{route('admin.volunteers',['status'=>'pending'])}}">Pending ({{$totals->pending ?? 0}})</a></li>
                                            <li><a href="{{route('admin.volunteers',['status'=>'approved'])}}">Approved ({{$totals->approved ?? 0}})</a></li>
                                            <li><a href="{{route('admin.volunteers',['status'=>'rejected'])}}">Rejected ({{$totals->rejected ?? 0}})</a></li>
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
                                                <th style="min-width: 200px;">Name</th>
                                                <th style="min-width: 180px;">Contact</th>
                                                <th style="min-width: 120px;">Status</th>
                                                <th style="min-width: 120px;">Date</th>
                                                <th style="min-width: 180px; width: 180px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($volunteers as $i=>$vol)
                                            @php $vData = json_decode($vol->content, true) ?: []; @endphp
                                            <tr>
                                                <td>
                                                    <input class="checkbox" type="checkbox" name="checkid[]" value="{{$vol->id}}" /><br />
                                                    {{$volunteers->currentpage()==1?$i+1:$i+($volunteers->perpage()*($volunteers->currentpage() - 1))+1}}
                                                </td>
                                                <td>
                                                    <span><strong>{{$vol->name}}</strong></span>
                                                    <br/>
                                                    @if(isset($vData['occupation']) && $vData['occupation'])
                                                    <span style="color: #999; font-size: 12px;"><i class="fa fa-briefcase" style="color: #1ab394;"></i> {{$vData['occupation']}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($vol->email)
                                                    <span style="font-size: 12px;"><i class="fa fa-envelope" style="color: #1ab394;"></i> {{$vol->email}}</span><br/>
                                                    @endif
                                                    @if(isset($vData['mobile']) && $vData['mobile'])
                                                    <span style="font-size: 12px;"><i class="fa fa-phone" style="color: #1ab394;"></i> {{$vData['mobile']}}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($vol->status=='approved')
                                                    <span class="badge badge-success">Approved</span>
                                                    @elseif($vol->status=='rejected')
                                                    <span class="badge badge-danger">Rejected</span>
                                                    @else
                                                    <span class="badge badge-warning">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <span style="color: #ccc; font-size: 12px;"><i class="fa fa-calendar" style="color: #1ab394;"></i> {{$vol->created_at->format('d-m-Y')}}</span>
                                                </td>
                                                <td style="padding: 5px;">
                                                    <a href="{{route('admin.volunteerView', $vol->id)}}" class="btn btn-sm btn-info">View</a>
                                                    @if($vol->status != 'approved')
                                                    <a href="{{route('admin.volunteersAction', ['approve', $vol->id])}}" class="btn btn-sm btn-success" onclick="return confirm('Approve this volunteer?')">Approve</a>
                                                    @endif
                                                    <a href="{{route('admin.volunteersAction', ['delete', $vol->id])}}" class="btn btn-sm btn-danger" onclick="return confirm('Are You Want To Delete?')">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                    {{$volunteers->links('pagination')}}
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
