@php $JSON=null;
$url = 'https://www.instagram.com/explore/tags/arastowel/?__a=1';
        $JSON = @file_get_contents($url);
@endphp
@if($JSON!=null)
    @php
        $data = json_decode($JSON);
            @$data2=$data->graphql->hashtag->edge_hashtag_to_media->edges;
    @endphp
    <section class="instagram p-t-40 p-b-50">
        <div class="sec-title p-b-35 p-l-15 p-r-15">
            <h3 class="m-text5 t-center">
                ما را در اینستاگرام دنبال کنید
            </h3>
        </div>

        <div class="flex-w" id="insta">
            <!-- Block4 -->
            @php $i=0 @endphp
            @foreach ($data2 as $datas)
                @if($i<5)
                    <div class="block4 wrap-pic-w">
                        @php  $j=0;  @endphp
                        @foreach($datas->node->thumbnail_resources as $thumbnail)
                            @if($j<3)
                                @php  $thumb=$thumbnail->src; $j=$j+1;  @endphp
                            @endif
                        @endforeach
                        <img src="{{$thumb}}"  alt="	@php
                            $captions=$datas->node->edge_media_to_caption->edges;
                        @endphp
                        @foreach($captions as $caption)
                        {{$caption->node->text}}
                        @endforeach
                                " width="288" >

                        <a title="@php
                            $captions=$datas->node->edge_media_to_caption->edges;
                        @endphp
                        @foreach($captions as $caption)
                        {{$caption->node->text}}
                        @endforeach" href="https://instagram.com/p/{{$datas->node->shortcode}}" target="_blank" class="block4-overlay sizefull ab-t-l trans-0-4">
					<span class="block4-overlay-heart s-text9 flex-m trans-0-4 p-l-40 p-t-25">
						<i class="fa fa-heart-o fs-20 p-r-12" aria-hidden="true"></i>
						<span class="p-t-2">{{$datas->node->edge_liked_by->count}}</span>
					</span>

                            <div class="block4-overlay-txt trans-0-4 p-l-40 p-r-25 p-b-30">
                                <p class="s-text10 m-b-15 h-size1 of-hidden">
                                    @php
                                        $captions=$datas->node->edge_media_to_caption->edges;
                                    @endphp
                                    @foreach($captions as $caption)
                                        {{$caption->node->text}}
                                    @endforeach

                                </p>
                            </div>
                        </a>
                    </div>
                    @php $i = $i+1 @endphp
                @endif
            @endforeach
        </div>
    </section>
@endif