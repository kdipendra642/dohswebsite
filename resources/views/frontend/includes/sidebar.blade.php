@php
    $tickers = App\Models\Ticker::orderBy('created_at', 'DESC')->get();
@endphp

<div class="section-header aside-detail margintop">
    <h2><i class="fa fa-rss"></i> More Notices</h2>
    <ul>
        @foreach ($tickers as $ticker)
        <li>
            <a href="{{ route('single.tickers',$ticker->slug) }}">{{$ticker->title}}</a>
            <small><i class="fa fa-clock-o"> {{$ticker->created_at->diffForHumans()}}</i>
            &nbsp; &nbsp;<i class="fa fa-building"></i> News &amp; Notice
            </small>
        </li>
        @endforeach
                        
    </ul>
</div>
</div>