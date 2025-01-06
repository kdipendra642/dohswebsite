@extends('frontend.layout.master')
@section('mainContent')

<div class="container content" style="padding:0px;" >

    <div class="section-header">
        <div class="breadcump"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i> </a>  / Posts</div>
        <h2 class="notice_title">
            Posts
        </h2>
    </div>
</div>


<!-- new content -->

<section>
  <div class="container archiving">
      <div class="col-12 margintop">
           <div class="table-responsive">
               <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th style="width: 5%">SN</th>
                            <th style="width: 45%;">Title</th>
                            <th style="width: 10%;">Category</th>
                            <th style="width:10%;">Published</th>
                            <th style="width: 8%">Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($posts as $post)    
                        <tr>
                            <td>{{$i++}}</td>
                            <td>
                                <a href="{{ route('posts.single', $post->slug) }}">
                                    <i class="fas fa-thumbtack thumb-track"></i>                                                                              व्यावसायिक सामाजिक जिम्मेवारी (CSR) सम्बन्धी विवरण पेश गर्ने सम्बन्धी सूचना।
                                </a>
                            </td>
                            <td>
                                <span class="badge badge-danger">{{$post->category->title}}</span>
                            </td>
                            <td>
                                {{$post->created_at->format('Y-m-d')}}
                            </td>
                            <td align="center">
                                <div class="btn-group">
                                    <a href="{{ route('posts.single', $post->slug) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach                                         
                    </tbody>
               </table>
           </div>
      </div>
  </div>
</section>
@endsection