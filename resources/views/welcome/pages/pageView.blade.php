@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{$page->seo_title ?: websiteTitle($page->name)}}</title>
@endsection

@section('SEO')
<meta name="title" property="og:title" content="{{$page->seo_title ?: websiteTitle($page->name)}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
<meta name="url" property="og:url" content="{{route('pageView', $page->slug ?: 'no-title')}}" />
<link rel="canonical" href="{{route('pageView', $page->slug ?: 'no-title')}}" />
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/about.css')}}" />
@endpush

@section('contents')
  <!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="about-header-banner">
    <div class="container">
      <h1 class="about-banner-title">{{$page->name}}</h1>
      <div class="about-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">{{$page->name}}</span>
      </div>
    </div>
  </section>

  <!-- ========== PAGE MAIN CONTENT ========== -->
  <section class="section-gap-lg">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto col-12">
          @if($page->imageFile)
          <div class="mb-4 text-center">
            <img src="{{asset($page->image())}}" alt="{{$page->name}}" class="img-fluid rounded-4 shadow-sm" />
          </div>
          @endif

          <div class="rich-text-wrapper fs-5 lh-lg text-secondary">
            {!! $page->description !!}
          </div>

          @if(isset($page->hasNitEditorContent) && $page->hasNitEditorContent->count() > 0)
            @include(welcomeTheme().'pages.nitEditor.primary',['datas'=>$page->hasNitEditorContent])
          @endif
        </div>
      </div>
    </div>
  </section>
@endsection