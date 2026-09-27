{{-- Brand panel shared by the login and sign-up pages --}}
<aside class="auth-aside">
    <a href="{{route('index')}}" class="auth-logo" aria-label="{{general()->title}} home">
        <img src="{{asset(general()->logo())}}" alt="{{general()->title}}">
    </a>

    <h2>{{$asideTitle ?? 'Together for healthier livers'}}</h2>
    <p>{{$asideText ?? 'Join the National Liver Foundation of Bangladesh community working to prevent, diagnose and treat liver disease.'}}</p>

    <ul class="auth-points">
        <li>
            <span class="ap-icon"><i class="fa-solid fa-heart-pulse"></i></span>
            <div><strong>Free screening updates</strong><span>Hear first about screening and vaccination camps near you.</span></div>
        </li>
        <li>
            <span class="ap-icon"><i class="fa-solid fa-book-medical"></i></span>
            <div><strong>Trusted liver information</strong><span>Guides on hepatitis, liver tests and healthy living.</span></div>
        </li>
        <li>
            <span class="ap-icon"><i class="fa-solid fa-hand-holding-heart"></i></span>
            <div><strong>Support our mission</strong><span>Track your donations and membership in one place.</span></div>
        </li>
    </ul>

    <div class="auth-secure"><i class="fa-solid fa-shield-halved"></i> Your information is kept private and secure.</div>
    <span class="auth-flag"></span>
</aside>
