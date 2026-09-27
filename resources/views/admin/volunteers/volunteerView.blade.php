@extends(adminTheme().'layouts.app')
@section('title')
<title>{{websiteTitle('Volunteer Details - '.$volunteer->name)}}</title>
@endsection

@push('css')
<style type="text/css"></style>
@endpush

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Volunteer Details</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.volunteers')}}">Volunteers</a></li>
                    <li class="breadcrumb-item active">{{$volunteer->name}}</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group">
            @if($volunteer->status != 'approved')
            <a class="btn btn-success" href="{{route('admin.volunteersAction', ['approve', $volunteer->id])}}" onclick="return confirm('Approve this volunteer?')">
                <i class="fa fa-check"></i> Approve
            </a>
            @endif
            @if($volunteer->status != 'rejected')
            <a class="btn btn-warning" href="{{route('admin.volunteersAction', ['reject', $volunteer->id])}}" onclick="return confirm('Reject this volunteer?')">
                <i class="fa fa-times"></i> Reject
            </a>
            @endif
            <a class="btn btn-danger" href="{{route('admin.volunteersAction', ['delete', $volunteer->id])}}" onclick="return confirm('Are You Want To Delete?')">
                <i class="fa fa-trash"></i> Delete
            </a>
            <a class="btn btn-outline-primary" href="{{route('admin.volunteers')}}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="basic-elements">
        <div class="row">
            <div class="col-md-12">
                @include(adminTheme().'alerts')

                <!-- Status Badge -->
                <div class="mb-2">
                    @if($volunteer->status=='approved')
                    <span class="badge badge-success" style="font-size: 14px; padding: 6px 15px;">Approved</span>
                    @elseif($volunteer->status=='rejected')
                    <span class="badge badge-danger" style="font-size: 14px; padding: 6px 15px;">Rejected</span>
                    @else
                    <span class="badge badge-warning" style="font-size: 14px; padding: 6px 15px;">Pending</span>
                    @endif
                    <span style="color: #999; margin-left: 10px;"><i class="fa fa-calendar"></i> Applied: {{$volunteer->created_at->format('d M, Y h:i A')}}</span>
                </div>

                <!-- Personal Information -->
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title"><i class="fa fa-user"></i> Personal Information</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @if($photo)
                            <div class="col-md-3 text-center mb-3">
                                <img src="{{asset($photo->file_url)}}" style="max-width: 150px; max-height: 150px; border-radius: 10px; object-fit: cover; border: 2px solid #e3ebf3;" />
                                <p class="mt-1" style="font-size: 12px; color: #999;">Profile Photo</p>
                            </div>
                            @endif
                            <div class="{{$photo ? 'col-md-9' : 'col-md-12'}}">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 200px; background: #f8f9fa;">Full Name</th>
                                            <td><strong>{{$data['fullname'] ?? '—'}}</strong></td>
                                        </tr>
                                        <tr>
                                            <th style="background: #f8f9fa;">Date of Birth</th>
                                            <td>{{$data['dob'] ?? '—'}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background: #f8f9fa;">Gender</th>
                                            <td>{{$data['gender'] ?? '—'}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background: #f8f9fa;">Nationality</th>
                                            <td>{{$data['nationality'] ?? '—'}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background: #f8f9fa;">Married Status</th>
                                            <td>{{$data['married_status'] ?? '—'}}</td>
                                        </tr>
                                        <tr>
                                            <th style="background: #f8f9fa;">National ID</th>
                                            <td>{{$data['nid'] ?? '—'}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact & Occupation -->
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title"><i class="fa fa-phone"></i> Contact & Occupation Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px; background: #f8f9fa;">Email Address</th>
                                    <td>
                                        @if(isset($data['email']) && $data['email'])
                                        <a href="mailto:{{$data['email']}}">{{$data['email']}}</a>
                                        @else — @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Mobile Number</th>
                                    <td>
                                        @if(isset($data['mobile']) && $data['mobile'])
                                        <a href="tel:{{$data['mobile']}}">{{$data['mobile']}}</a>
                                        @else — @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Occupation</th>
                                    <td>{{$data['occupation'] ?? '—'}}</td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Emergency Contact</th>
                                    <td>{{$data['emergency_contact'] ?? '—'}}</td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Current Address</th>
                                    <td>{{$data['current_address'] ?? '—'}}</td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Permanent Address</th>
                                    <td>{{$data['permanent_address'] ?? '—'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Social Links -->
                @if(isset($data['social_links']) && count($data['social_links']) > 0)
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title"><i class="fa fa-share-alt"></i> Social Profile Links</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background: #f8f9fa;">Platform</th>
                                        <th style="background: #f8f9fa;">Link</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data['social_links'] as $social)
                                    <tr>
                                        <td style="width: 200px;"><strong>{{$social['platform'] ?? '—'}}</strong></td>
                                        <td><a href="{{$social['link'] ?? '#'}}" target="_blank">{{$social['link'] ?? '—'}}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Motivation & Engagement -->
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title"><i class="fa fa-heart"></i> Engagement & Motivation</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th style="width: 200px; background: #f8f9fa;">Why Join?</th>
                                    <td>{{$data['why_join'] ?? '—'}}</td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">Additional Comments</th>
                                    <td>{{$data['comments'] ?? '—'}}</td>
                                </tr>
                                <tr>
                                    <th style="background: #f8f9fa;">How They Heard</th>
                                    <td>{{$data['referral'] ?? '—'}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection

@push('js')
<script type="text/javascript">

</script>
@endpush
