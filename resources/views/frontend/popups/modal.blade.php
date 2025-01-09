@foreach ($getHomePageData['popUps'] as $popUps)
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width: 80%; margin-left: 10%">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h5>{{$popUps->title}}</h5>
                <hr>
            @if ($popUps->getMedia('pop-ups')->isNotEmpty())
                @if (
                    $popUps->getMedia('pop-ups')[0]->mime_type == 'image/png'
                    || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpeg'
                    || $popUps->getMedia('pop-ups')[0]->mime_type == 'image/jpg'
                )
                <img src="{{$popUps->getMedia('pop-ups')[0]->getUrl()}}" alt="{{$popUps->title}}" style="width: 100%; max-height: 70vh;">
                @endif
            @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).ready(function() {
            $('#myModal').modal('show');
        });
    </script>
   

@endforeach
