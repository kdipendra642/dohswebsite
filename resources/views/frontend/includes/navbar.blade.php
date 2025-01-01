<div class="container logo">
    <div class="row">
      <div class="col-md-8 col-sm-12">
          <a href="#">
              <center>
                  <img src="{{ asset('assets/frontend/uploads/img/logo.png')}}" alt="उद्योग विभाग" class="img-fluid img-logo" style="padding-top:4px">
              </center>
            <h1 class=nep_logo>{{$siteSettings->titleOne}}</h1>
            <h4 class="nep_logo_h4">{{$siteSettings->titleTwo}}</h4>
            <p class="nep_logo_p">{{$siteSettings->titleThree}}</p>
           </a>
          <div class="clear-fix"></div>
      </div>
      <div class="col-md-4 search d-none d-md-block">
          <div class="link-icon col-12">
              <div class="float-right mb-3">
                <a href="{{$siteSettings->socialFacebookLink}}" target="_banner" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="{{$siteSettings->socialTwitterLink}}" target="_banner" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="https://bit.ly/3t0gpGc" target="_banner" class="linkedin"><i class="fa fa-map-marker"></i></a>
                <a href="https://mail.nepal.gov.np/" target="_banner" class="linkedin"><i class="fa fa-envelope-o"></i></a>
              </div>
          </div>
          <div class="col-md-7 col-xl-8 float-right">
            <form action="https://doind.gov.np/archiving" style="display: inline;">
              <div class="input-group">
                <input type="text" name="q" value="" placeholder="खोजी" class="form-control form-control-sm">
                  <div class="input-group-append">
                    <button class="btn btn-primary btn-sm" type="submit"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </form>
              <small class="float-right mt-3">
                              २०८१ पौष १६ गते मंगलबार
                            </small>
          </div>
      </div>
      <div class="col-sm-12 d-block d-sm-none ">
          <small class="float-right">

              <a href="#" class="facebook">English</a>
                  </small>
      </div>
    </div>
  </div>
