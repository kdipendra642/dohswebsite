@foreach ($getHomePageData['popUps'] as $popUps)
<div class="modal fade mt-5" id="myModal{{$popUps->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 60%; margin-left: 20%; height: 90vh; padding-right: 17px; display: block;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="display: flex; justify-content: space-between; align-items: center;">
                <h5>{{$popUps->title}}</h5>
                <button type="button" class="btn btn-secondary border-0 mt-2" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body" style="margin: auto; width: 100%; overflow:scroll;">
                    @if ($popUps->getMedia('pop-ups')->isNotEmpty())
                        @if (
                            $popUps->getMedia('pop-ups')[0]->mime_type == 'image/png'
                            || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                            || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                        )
                        <div class="text-center">
                            <img src="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}" alt="{{$popUps->title}}" style="max-height: 70vh;">
                        </div>
                        @endif

                        @if ($popUps->getMedia('pop-ups')[0]->mime_type == 'application/pdf')
                        <div>
                            <object data="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}#view=FitH&amp;toolbar=1" type="application/pdf" style="width: 100%; height: 80vh;">
                                <param name="initZoom" value="fitToPage">
                                <p>Your Device Cannot read PDF. <a rel="external" href="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}">Click to View</a></p>
                            </object>
                        </div>
                        <div class="attach">
                            <a href="{{$popups->getMedia('pop-ups')[0]->getUrl()}}" target="_blank" data-toggle="tooltip" data-placement="bottom" title="{{ $title }}">
                                <i class="fa fa-file-pdf-o fa-5x"></i>
                            </a>
                        </div>
                        @endif
                    @endif

                    @if ($popUps->youtube_link)
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe src="{{ $popUps->youtube_link }}" class="embed-responsive-item" allowfullscreen></iframe>
                        </div>
                    @endif
            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#myModal{{$popUps->id}}').modal('show');
    });
</script>

@endforeach

<!-- the below is a testing code -->
{{--

    @foreach ($getHomePageData['popUps'] as $popUps)
<div class="modal fade" id="exampleModalCenterid{{$popUps->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document"> <!-- Set max-width to 50% and center it -->
        <div class="modal-content" style="width: 80%; min-height: 80% !important;">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">{{$popUps->title}}</h5>
                <button type="button" class="btn btn-secondary border-0 mt-2" data-dismiss="modal">
                    <i class="fa fa-close"></i>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <div class="text-center">
                    @if ($popUps->getMedia('pop-ups')->isNotEmpty())
                        @if (
                            $popUps->getMedia('pop-ups')[0]->mime_type == 'image/png'
                            || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                            || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                        )
                            <!-- Image Pop-Up -->
                            <img src="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}"
                                alt="{{$popUps->title}}"
                                class="img-fluid img-responsive"
                                style="max-height: 80vh; width: auto; overflow:hidden"
                              > <!-- Adjusted height -->
                        @endif

                        @if ($popUps->getMedia('pop-ups')[0]->mime_type == 'application/pdf')
                            <!-- PDF Pop-Up -->
                            <object data="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}#view=FitH&amp;toolbar=1"
                                    type="application/pdf"
                                    style="width: 100%; height: 50vh;"> <!-- Adjusted height -->
                                <param name="initZoom" value="fitToPage">
                                <p>Your device cannot display PDFs. <a href="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}" target="_blank">Click here to view the PDF</a>.</p>
                            </object>
                        @endif
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#exampleModalCenterid{{$popUps->id}}').modal('show');
    });
</script>
@endforeach


--}}