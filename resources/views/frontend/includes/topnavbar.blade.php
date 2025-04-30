<button type="button" class="mobile-nav-toggle d-lg-none"><i class="fa fa-bars"></i></button>
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="fa fa-inbox"></i> <a href="#">{{$siteSettings->primaryEmail}} </a>
            <i class="fa fa-phone"></i> <a href="#">{{$siteSettings->primaryContact}} </a>
            <i class="fa fa-calendar" style="border-left: 1px solid #e9e9e9;"></i> <a href="#">(A.D.): {{now()->format('Y-m-d')}} </a>
            <i class="fa fa-calendar" style="border-left: 1px solid #e9e9e9;"></i> <a href="#">(B.S.): {{
                        Anuzpandey\LaravelNepaliDate\LaravelNepaliDate::from(now()->format('Y-m-d'))
                            ->toNepaliDate(format: 'D, j F Y', locale: 'en')}} </a>
        </div>
        <div class="social-links float-right">
            <a href="{{ route('lang.setup', 'en') }}" class="facebook"><i class="fa"></i> English</a>
            <a href="{{ route('lang.setup', 'nep') }}" class="facebook"><i class="fa"></i> नेपाली</a>
        </div>
</section>
