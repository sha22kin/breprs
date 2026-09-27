@extends(welcomeTheme().'layouts.app')

@section('title')
<title>{{ isset($page) && $page->seo_title ? $page->seo_title : 'Volunteer Registration — ' . (general()->title ?: 'Green Earth Foundation') }}</title>
@endsection

@section('SEO')
@if(isset($page) && $page)
<meta name="title" property="og:title" content="{{$page->seo_title ?: 'Volunteer Registration — ' . (general()->title ?: 'Green Earth Foundation')}}" />
<meta name="description" property="og:description" content="{!!$page->seo_description ?: general()->meta_description!!}" />
<meta name="keywords" content="{{$page->seo_keyword ?: general()->meta_keyword}}" />
@if($page->imageFile)
<meta name="image" property="og:image" content="{{asset($page->image())}}" />
@endif
@endif
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/css/volunteer.css')}}" />
@endpush

@section('contents')
<!-- ========== BREADCRUMB HEADER BANNER ========== -->
  <section class="volunteer-header-banner">
    <div class="container">
      <h1 class="volunteer-banner-title">Volunteer Registration</h1>
      <div class="volunteer-banner-crumbs">
        <a href="{{route('index')}}">Home</a>
        <span>/</span>
        <span class="text-white">Join Us</span>
      </div>
    </div>
  </section>

  <!-- ========== VOLUNTEER REGISTRATION SECTION ========== -->
  <section class="volunteer-main-section">
    <div class="container">
      <div class="volunteer-form-card">
        <h2 class="volunteer-form-title">Become a Volunteer</h2>
        <p class="volunteer-form-subtitle">
          Join our global network of eco-warriors and support conservation programs in tree plantation, forest preservation, and waste reduction.
        </p>

        <!-- Success/Error Messages -->
        @if(session('success'))
        <div class="alert alert-success py-2 mb-3">
          <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger py-2 mb-3">
          <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
        </div>
        @endif

        <form action="{{route('volunteerApply')}}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <!-- 1. PERSONAL INFORMATION -->
          <h3 class="volunteer-form-section-title">Personal Information</h3>
          <div class="row">
            <!-- Full Name -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volFullName" class="volunteer-form-label">Full Name <span class="text-danger">*</span></label>
                <input type="text" id="volFullName" name="fullname" class="volunteer-form-control" placeholder="John Doe" value="{{old('fullname')}}" required />
                @error('fullname')<div class="text-danger small mt-1">{{$message}}</div>@enderror
              </div>
            </div>
            <!-- Date of Birth -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volDOB" class="volunteer-form-label">Date of Birth</label>
                <input type="date" id="volDOB" name="dob" class="volunteer-form-control" value="{{old('dob')}}" />
              </div>
            </div>
            <!-- Gender -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volGender" class="volunteer-form-label">Gender</label>
                <select id="volGender" name="gender" class="volunteer-form-control">
                  <option value="" disabled {{old('gender') ? '' : 'selected'}}>Select Gender</option>
                  <option value="Male" {{old('gender')=='Male'?'selected':''}}>Male</option>
                  <option value="Female" {{old('gender')=='Female'?'selected':''}}>Female</option>
                  <option value="Other" {{old('gender')=='Other'?'selected':''}}>Other</option>
                </select>
              </div>
            </div>
            <!-- Nationality -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volNationality" class="volunteer-form-label">Nationality</label>
                <input type="text" id="volNationality" name="nationality" class="volunteer-form-control" placeholder="Bangladeshi" value="{{old('nationality')}}" />
              </div>
            </div>
            <!-- Married Status -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volMarriedStatus" class="volunteer-form-label">Married Status</label>
                <select id="volMarriedStatus" name="married_status" class="volunteer-form-control">
                  <option value="" disabled {{old('married_status') ? '' : 'selected'}}>Select Status</option>
                  <option value="Single" {{old('married_status')=='Single'?'selected':''}}>Single</option>
                  <option value="Married" {{old('married_status')=='Married'?'selected':''}}>Married</option>
                  <option value="Divorced" {{old('married_status')=='Divorced'?'selected':''}}>Divorced</option>
                  <option value="Widowed" {{old('married_status')=='Widowed'?'selected':''}}>Widowed</option>
                </select>
              </div>
            </div>
            <!-- National ID -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volNID" class="volunteer-form-label">National ID</label>
                <input type="text" id="volNID" name="nid" class="volunteer-form-control" placeholder="e.g., 199XXXXXXXXXX" value="{{old('nid')}}" />
              </div>
            </div>
          </div>

          <!-- 2. CONTACT & OCCUPATION DETAILS -->
          <h3 class="volunteer-form-section-title">Contact &amp; Occupation Details</h3>
          <div class="row">
            <!-- Email Address -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volEmail" class="volunteer-form-label">Email Address</label>
                <input type="email" id="volEmail" name="email" class="volunteer-form-control" placeholder="john@example.com" value="{{old('email')}}" />
                @error('email')<div class="text-danger small mt-1">{{$message}}</div>@enderror
              </div>
            </div>
            <!-- Mobile Number -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volMobile" class="volunteer-form-label">Mobile Number <span class="text-danger">*</span></label>
                <input type="tel" id="volMobile" name="mobile" class="volunteer-form-control" placeholder="+880 17XX-XXXXXX" value="{{old('mobile')}}" required />
                @error('mobile')<div class="text-danger small mt-1">{{$message}}</div>@enderror
              </div>
            </div>
            <!-- Occupation -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volOccupation" class="volunteer-form-label">Occupation</label>
                <input type="text" id="volOccupation" name="occupation" class="volunteer-form-control" placeholder="e.g., Student, Engineer" value="{{old('occupation')}}" />
              </div>
            </div>
            <!-- Emergency Contact -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volEmergencyContact" class="volunteer-form-label">Emergency Contact Number</label>
                <input type="tel" id="volEmergencyContact" name="emergency_contact" class="volunteer-form-control" placeholder="Emergency contact number" value="{{old('emergency_contact')}}" />
              </div>
            </div>
            <!-- Current Address -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volCurrentAddress" class="volunteer-form-label">Current Address</label>
                <input type="text" id="volCurrentAddress" name="current_address" class="volunteer-form-control" placeholder="Dhanmondi, Dhaka" value="{{old('current_address')}}" />
              </div>
            </div>
            <!-- Permanent Address -->
            <div class="col-lg-4 col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volPermanentAddress" class="volunteer-form-label">Permanent Address</label>
                <input type="text" id="volPermanentAddress" name="permanent_address" class="volunteer-form-control" placeholder="Mirpur, Dhaka" value="{{old('permanent_address')}}" />
              </div>
            </div>
          </div>

          <!-- 3. PROFILE PHOTO & SOCIAL PROFILE -->
          <h3 class="volunteer-form-section-title">Profile Photo &amp; Social Profile</h3>
          <div class="row">
            <!-- Profile Photo -->
            <div class="col-md-6 col-12">
              <div class="volunteer-form-group">
                <span class="volunteer-form-label">Profile Photo</span>
                <label for="volPhoto" class="volunteer-file-upload-wrapper">
                  <i class="fas fa-cloud-upload-alt volunteer-file-upload-icon"></i>
                  <p class="volunteer-file-upload-text">Drag &amp; drop or click to upload photo (JPG, PNG, max 2MB)</p>
                  <input type="file" id="volPhoto" name="photo" class="volunteer-file-upload-input" accept="image/*" />
                </label>
              </div>
            </div>
            <!-- Social Link -->
            <div class="col-md-6 col-12">
              <div class="volunteer-form-group">
                <label class="volunteer-form-label">Social Profile Link</label>
                <div class="volunteer-social-links-list" id="socialLinksList">
                  <div class="volunteer-social-row d-flex gap-2 mb-2 align-items-center">
                    <select name="social_platform[]" class="volunteer-social-select" style="width: 130px;" onchange="updatePlaceholder(this)">
                      <option value="Facebook">Facebook</option>
                      <option value="LinkedIn">LinkedIn</option>
                      <option value="Twitter">Twitter</option>
                      <option value="Instagram">Instagram</option>
                      <option value="Other">Other</option>
                    </select>
                    <input type="url" name="social_link[]" class="volunteer-form-control volunteer-social-input" placeholder="https://facebook.com/username" />
                    <button type="button" class="volunteer-social-remove-btn" onclick="removeSocialRow(this)" style="display: none;" aria-label="Remove social profile link">
                      <i class="fas fa-trash-alt"></i>
                    </button>
                  </div>
                </div>
                <button type="button" class="volunteer-social-add-btn mt-2" onclick="addSocialRow()">
                  <i class="fas fa-plus"></i> Add More Link
                </button>
                <span class="text-muted mt-2 d-block" style="font-size: 11px;">Provide one or more social profile links to help us verify your identity.</span>
              </div>
            </div>
          </div>

          <!-- 4. MOTIVATION & ENGAGEMENT -->
          <h3 class="volunteer-form-section-title">Engagement &amp; Motivation</h3>
          <div class="row">
            <!-- Why join -->
            <div class="col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volWhyJoin" class="volunteer-form-label">Why do you want to join as a volunteer?</label>
                <textarea id="volWhyJoin" name="why_join" class="volunteer-form-control" placeholder="Tell us briefly why you want to support environmental conservation...">{{old('why_join')}}</textarea>
              </div>
            </div>
            <!-- Additional Comments -->
            <div class="col-md-6 col-12">
              <div class="volunteer-form-group">
                <label for="volComments" class="volunteer-form-label">Additional Comments / Relevant Skills</label>
                <textarea id="volComments" name="comments" class="volunteer-form-control" placeholder="List any relevant skills, experiences, or notes you would like to share...">{{old('comments')}}</textarea>
              </div>
            </div>
            <!-- How did you hear -->
            <div class="col-12">
              <div class="volunteer-form-group">
                <label for="volReferral" class="volunteer-form-label">How did you hear about us?</label>
                <select id="volReferral" name="referral" class="volunteer-form-control">
                  <option value="" disabled {{old('referral') ? '' : 'selected'}}>Select Source</option>
                  <option value="Social Media" {{old('referral')=='Social Media'?'selected':''}}>Social Media</option>
                  <option value="Friends/Family" {{old('referral')=='Friends/Family'?'selected':''}}>Friends / Family</option>
                  <option value="Search Engine" {{old('referral')=='Search Engine'?'selected':''}}>Search Engine</option>
                  <option value="Press/News" {{old('referral')=='Press/News'?'selected':''}}>Press / News</option>
                  <option value="Other" {{old('referral')=='Other'?'selected':''}}>Other</option>
                </select>
              </div>
            </div>
          </div>

          <!-- 5. AGREE & DECLARATIONS -->
          <div class="volunteer-checkbox-group mt-3">
            <input type="checkbox" id="volAcceptTerms" name="accept_terms" class="volunteer-checkbox-input" required />
            <label for="volAcceptTerms" class="volunteer-checkbox-label">
              I accept the <a href="#">Terms &amp; Conditions</a> of {{general()->title ?: 'Green Earth Foundation'}} NGO.
            </label>
          </div>
          <div class="volunteer-checkbox-group">
            <input type="checkbox" id="volAcceptPrivacy" name="accept_privacy" class="volunteer-checkbox-input" required />
            <label for="volAcceptPrivacy" class="volunteer-checkbox-label">
              I accept the <a href="#">Privacy Policy</a> and consent to having my personal information processed.
            </label>
          </div>

          <!-- Submit Button Wrapper -->
          <div class="text-start mt-4 pt-2">
            <button type="submit" class="volunteer-form-submit-btn">
              <i class="fas fa-hand-holding-heart"></i> Submit Application
            </button>
          </div>

        </form>
      </div>
    </div>
  </section>
@endsection

@push('js')
<script type="text/javascript">
// Social Links Management
function addSocialRow() {
    var list = document.getElementById('socialLinksList');
    var row = document.createElement('div');
    row.className = 'volunteer-social-row d-flex gap-2 mb-2 align-items-center';
    row.innerHTML = '<select name="social_platform[]" class="volunteer-social-select" style="width: 130px;" onchange="updatePlaceholder(this)">' +
        '<option value="Facebook">Facebook</option>' +
        '<option value="LinkedIn">LinkedIn</option>' +
        '<option value="Twitter">Twitter</option>' +
        '<option value="Instagram">Instagram</option>' +
        '<option value="Other">Other</option>' +
        '</select>' +
        '<input type="url" name="social_link[]" class="volunteer-form-control volunteer-social-input" placeholder="https://facebook.com/username" />' +
        '<button type="button" class="volunteer-social-remove-btn" onclick="removeSocialRow(this)" aria-label="Remove social profile link">' +
        '<i class="fas fa-trash-alt"></i></button>';
    list.appendChild(row);
    updateRemoveButtons();
}

function removeSocialRow(btn) {
    btn.closest('.volunteer-social-row').remove();
    updateRemoveButtons();
}

function updateRemoveButtons() {
    var rows = document.querySelectorAll('#socialLinksList .volunteer-social-row');
    rows.forEach(function(row) {
        var removeBtn = row.querySelector('.volunteer-social-remove-btn');
        if (removeBtn) {
            removeBtn.style.display = rows.length > 1 ? 'inline-flex' : 'none';
        }
    });
}

function updatePlaceholder(selectEl) {
    var input = selectEl.closest('.volunteer-social-row').querySelector('.volunteer-social-input');
    var placeholders = {
        'Facebook': 'https://facebook.com/username',
        'LinkedIn': 'https://linkedin.com/in/username',
        'Twitter': 'https://twitter.com/username',
        'Instagram': 'https://instagram.com/username',
        'Other': 'https://example.com/profile'
    };
    input.placeholder = placeholders[selectEl.value] || 'https://example.com/profile';
}

// Photo Upload Preview
document.addEventListener('DOMContentLoaded', function() {
    var photoInput = document.getElementById('volPhoto');
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert('File size must be less than 2MB');
                    this.value = '';
                    return;
                }
                var wrapper = this.closest('.volunteer-file-upload-wrapper');
                var icon = wrapper.querySelector('.volunteer-file-upload-icon');
                var text = wrapper.querySelector('.volunteer-file-upload-text');
                var reader = new FileReader();
                reader.onload = function(ev) {
                    icon.style.display = 'none';
                    text.innerHTML = '<img src="' + ev.target.result + '" style="max-width:120px;max-height:120px;border-radius:8px;object-fit:cover;margin-bottom:5px;" /><br/><small>' + file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)</small>';
                };
                reader.readAsDataURL(file);
            }
        });
    }
});
</script>
@endpush
