
@foreach($datas as $data)
@if(Auth::user()->id == $data->id )

<h4>Hai,</h4><h2>{{$data->name}}</h2>
{{$data->email}}
id kamu:{{$data->id}}
{{Auth::user()->id}}
<a href="{{route('edit_profile',['id'=>$data->id])}}">Edit Profile Kamu</a>
@endif

@endforeach


