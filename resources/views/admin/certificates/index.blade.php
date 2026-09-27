@extends(adminTheme().'layouts.app') 

@section('title')
<title>{{websiteTitle('Certificates List')}}</title>
@endsection 

@push('css')
<style type="text/css"></style>
@endpush 

@section('contents')

<div class="content-header row">
    <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0">Certificates List</h3>
        <div class="row breadcrumbs-top">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard </a></li>
                    <li class="breadcrumb-item active">Certificates List</li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-header-right col-md-6 col-12 mb-md-0 mb-2">
        <div class="btn-group float-md-right" role="group" aria-label="Button group with nested dropdown">
            <a class="btn btn-outline-primary" href="#" data-toggle="modal" data-target="#addCertificateModal">Add Certificate</a>
            <a class="btn btn-outline-primary" href="{{route('admin.certificates')}}">
                <i class="fa-solid fa-rotate"></i>
            </a>
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
                        <h4 class="card-title">Certificates List</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th style="min-width: 60px;">S:L</th>
                                            <th style="min-width: 300px;">Certificate Name</th>
                                            <th style="max-width: 100px;">Image</th>
                                            <th style="min-width: 200px;width: 200px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($certificates as $i=>$certificate)
                                        <tr>
                                            <td>
                                                {{$i+1}}
                                            </td>
                                            <td>
                                                <span>{{$certificate->name}}</span><br />
                                                @if($certificate->status=='active')
                                                <span><i class="fa fa-check" style="color: #1ab394;"></i> Active</span>
                                                @else
                                                <span><i class="fa fa-times" style="color: #ed5565;"></i> Inactive</span>
                                                @endif
                                            </td>
                                            <td style="padding: 5px; text-align: center;">
                                                <img src="{{asset($certificate->image)}}" style="max-width: 80px; max-height: 50px;" />
                                            </td>
                                            <td class="center">
                                                <a href="{{route('admin.certificates.edit', $certificate->id)}}" class="btn btn-md btn-info">Edit</a>
                                                <a href="{{route('admin.certificates.destroy', $certificate->id)}}" class="btn btn-md btn-danger" onclick="return confirm('Are You Want To Delete?')" ><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Add Modal -->
<div class="modal fade" id="addCertificateModal" tabindex="-1" role="dialog" aria-labelledby="addCertificateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="{{route('admin.certificates.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="addCertificateModalLabel">Add New Certificate</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Certificate Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Certificate Image</label>
                <input type="file" name="image" class="form-control" required accept="image/*">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Certificate</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection
