<?php ?>
@foreach($data as $key =>$value)
ID: {{$value->id}} Name: {{$value->name}} Age: {{$value->age}} Email: {{$value->email}}<br/>
@endforeach

@if($day==1)
一
@elseif($day==2)
二
@elseif($day==3)
三
@elseif($day==4)
四
@elseif($day==5)
五
@elseif($day==6)
六
@elseif($day==7)
日
@else
天
@endif