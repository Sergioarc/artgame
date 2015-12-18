@if($collections->count() > 0)
    <ul class="nav nav-pills nav-justified {{join(' ', $classes)}}">

        @foreach($collections as $collection)
        <li role="presentation" class="{{$collection->id == $active_collection_id ? 'active' : ''}}">
            @if($collection->subcollections->count() == 1)
            <a href="{{action('SubcollectionsController@show', [$collection->id, $collection->subcollections->first()->id])}}">{{$collection->name}}</a>
            @else
            <a href="#" data-toggle="dropdown" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
                {{$collection->name}}
            </a>
            <ul class="dropdown-menu transparent-bg">
                @foreach($collection->subcollections as $subcollection)
                <li><a href="{{action('SubcollectionsController@show', [$collection->id, $subcollection->id])}}">{{$subcollection->name}}</a></li>
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach

    </ul>
@endif