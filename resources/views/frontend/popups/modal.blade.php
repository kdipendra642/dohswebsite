@foreach ($getHomePageData['popUps'] as $popUps)
<div class="modal fade mt-5" id="myModal{{$popUps->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 60%; margin-left: 20%; height: 90vh;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body" style="margin: auto;">
                <h5>{{$popUps->title}}</h5>
                <hr>
                <a href="{{ route('popups.single', $popUps->slug)}}" target="_blank">
                @if ($popUps->getMedia('pop-ups')->isNotEmpty())
                    @if (
                        $popUps->getMedia('pop-ups')[0]->mime_type == 'image/png'
                        || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                        || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                    )
                    <img src="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}" alt="{{$popUps->title}}" style="max-height: 70vh;">
                    @endif

                    @if ($popUps->getMedia('pop-ups')[0]->mime_type == 'application/pdf')
                    <a href="{{ route('popups.single', $popUps->slug)}}" target="_blank">Read Full Post Here</a>
                    @endif

                @endif
            </a>
            <br>
            <button type="button" class="btn btn-secondary border-0 pull-right mt-2" data-dismiss="modal">Close</button>
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
