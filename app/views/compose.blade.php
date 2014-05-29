@extends('layouts/siteMaster')
@section('content')

<div>
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
<p>New Message:</p>
<div>
    {{Form::hidden('from_email',$user->email,Input::old('from_email'))}}
</div>
<div>
    {{Form::hidden('id',$user->id,Input::old('id'))}}
</div>
<div>
    {{Form::label('to_email','To:')}}
    {{Form::text('to_email',Input::old('to_email'),array('class'=>'form-control'))}}
</div>
<div>
    {{Form::label('subject','Subject:')}}
    {{Form::text('subject',Input::old('subject'),array('class'=>'form-control'))}}
</div>
<div>
     <label for='full_text'></label>
     {{Form::textarea('text',Input::old('text'), array('placeholder'=>'Type text','class'  => 'form-control', 'cols' => '100'))}}
</div>
     {{Form::submit('Send',array('class'  => 'btn btn-primary btn-lg'))}}
{{Form::close()}}

@stop