@extends(adminTheme().'layouts.app') 

@section('title')
<title>{{websiteTitle('Edit Certificate')}}</title>
@endsection 

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Edit Certificate</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.certificates')}}">Certificates</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content-body">
    <section class="basic-elements">
        <div class="row">
            <div class="col-md-12">
                @include(adminTheme().'alerts')
                <div class="card">
                    <div class="card-header" style="border-bottom: 1px solid #e3ebf3;">
                        <h4 class="card-title">Edit Certificate</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{route('admin.certificates.update', $certificate->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Certificate Name</label>
                                    <input type="text" name="name" class="form-control" value="{{$certificate->name}}" required>
                                </div>
                                <div class="form-group">
                                    <label>Current Image</label><br>
                                    @if($certificate->image)
                                    <img src="{{asset($certificate->image)}}" style="max-height: 100px; margin-bottom: 10px;" />
                                    @endif
                                    <br>
                                    <label>Upload New Image (Leave blank to keep current)</label>
                                    <input type="file" name="image" class="form-control" accept="image/*">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control">
                                        <option value="active" {{$certificate->status == 'active' ? 'selected' : ''}}>Active</option>
                                        <option value="inactive" {{$certificate->status == 'inactive' ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                                <div class="form-actions text-right">
                                    <a href="{{route('admin.certificates')}}" class="btn btn-warning mr-1">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
