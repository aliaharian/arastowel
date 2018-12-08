@foreach($cities as $city)
    <option value="{{$city->id}}" style="text-align:right ">{{$city->name}}</option>
@endforeach