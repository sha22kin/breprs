@extends(welcomeTheme().'layouts.app')

@section('title')
<title>Certificates — {{general()->website_title ?: 'Bangladesh River Environment Protection Rights Society'}}</title>
@endsection

@push('css')
<style>
  .cert-header-banner {
    background: linear-gradient(rgba(19, 44, 30, 0.8), rgba(19, 44, 30, 0.8)), url('{{asset('assets/ima/hero-2.jpg')}}') no-repeat center center/cover;
    padding: 100px 0;
    text-align: center;
  }
  .cert-banner-title {
    color: #fff;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 15px;
  }
  .cert-banner-crumbs a {
    color: #ffd700;
    text-decoration: none;
    font-weight: 500;
  }
  .cert-banner-crumbs span {
    color: #fff;
    margin: 0 10px;
  }
  
  .certificate-card {
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    cursor: pointer;
    border: 1px solid #eee;
  }
  .certificate-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }
  .certificate-img {
    width: 100%;
    height: 300px;
    object-fit: contain;
    background: #f9f9f9;
    padding: 15px;
  }
  .certificate-title {
    padding: 20px;
    text-align: center;
    font-weight: 700;
    color: #132c1e;
    margin: 0;
    font-size: 1.25rem;
    border-top: 1px solid #eee;
  }

  /* Custom Lightbox Modal */
  #certLightboxModal .modal-dialog {
    max-width: 800px;
  }
  #certLightboxModal .modal-content {
    background: transparent;
    border: none;
    box-shadow: none;
  }
  #certLightboxModal .modal-header {
    border: none;
    padding: 0;
    justify-content: flex-end;
  }
  .cert-lightbox-close {
    color: #fff;
    font-size: 2rem;
    opacity: 0.8;
    background: none;
    border: none;
    padding: 10px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    transition: opacity 0.2s;
  }
  .cert-lightbox-close:hover {
    opacity: 1;
  }
  #lightboxImg {
    width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 10px 40px rgba(0,0,0,0.5);
  }
</style>
@endpush

@section('contents')
  <!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="cert-header-banner">
    <div class="container">
      <h1 class="cert-banner-title">Our Certificates</h1>
      <div class="cert-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Certificates</span>
      </div>
    </div>
  </section>

  <!-- ========== CERTIFICATES SECTION ========== -->
  <section class="py-5 bg-light">
    <div class="container py-4">
      <div class="row g-4">
        @forelse($certificates as $cert)
        <div class="col-lg-4 col-md-6 col-12">
          <div class="certificate-card" onclick="openLightbox('{{asset($cert->image)}}')">
            <img src="{{asset($cert->image)}}" alt="{{$cert->name}}" class="certificate-img" />
            <h4 class="certificate-title">{{$cert->name}}</h4>
          </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">No certificates found.</h3>
        </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Lightbox Modal -->
  <div class="modal fade" id="certLightboxModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="cert-lightbox-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="modal-body text-center p-0">
          <img src="" id="lightboxImg" alt="Certificate Full View">
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
<script>
  function openLightbox(imageUrl) {
    document.getElementById('lightboxImg').src = imageUrl;
    var certModal = new bootstrap.Modal(document.getElementById('certLightboxModal'));
    certModal.show();
  }
</script>
@endpush
