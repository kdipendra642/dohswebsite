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
            <!-- <a href="#" class="facebook"><i class="fa fa-blind"></i> स्क्रीन रीडर</a> -->
            <!-- <a href="#" class="facebook"><i class="fa fa-line-chart"></i> न्यून व्यान्डविथ</a> -->
            <!-- <a href="#" title="Dark Mode" class="facebook"><i class="fa fa-adjust"></i></a> -->
            <!-- <a href="#" class="facebook"><i class="fa"></i> English</a> -->
        </div>
    </div>
</section>
