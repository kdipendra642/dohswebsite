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
            <div class="modal-body" style="margin: auto; width: 100%;">
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
                                <p>Your Device Cannot read PDF. <a rel="external" href="#">Click to View</a></p>
                            </object>
                        </div>
                           
                        @endif

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
