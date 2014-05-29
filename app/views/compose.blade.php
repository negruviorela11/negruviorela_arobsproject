@extends('layouts/siteMaster')
@section('content')
<div class="new">
    <?php if(!empty($validator)){ ?>
        <div class='alert alert-warning'>
            <button type="button"class='close'data-dismiss='alert'aria-hidden='true'>
                &times;
            </button>
            <?php foreach($validator as $val){
                        echo $val;
            }
    }?>
</div>
{{Form::open(['url'=>'sendding','method'=>'post'])}}
<h3>New Message:</h3>
<div>
    {{Form::hidden('from_email',$user->email,Input::old('from_email'))}}
</div>
<div>
    {{Form::hidden('id',$user->id,Input::old('id'))}}
</div>
<div class="new">
    {{Form::label('to_email','To:')}}
    {{Form::text('to_email',Input::old('to_email'),array('class'=>'form-control'))}}
</div>
<div class="new">
    {{Form::label('subject','Subject:')}}
    {{Form::text('subject',Input::old('subject'),array('class'=>'form-control'))}}
</div>
<div class="new">
     <label for='full_text'></label>
     {{Form::textarea('text',Input::old('text'), array('placeholder'=>'Type text','class'  => 'form-control', 'cols' => '100'))}}
</div>
<div class="new form-group">
     {{Form::submit('Send',array('class'  => 'btn btn-primary btn-lg'))}}

    <a href="{{url('')}}"class="btn btn-primary btn-lg">Cancel</a>
</div>
{{Form::close()}}
</div>
@stop