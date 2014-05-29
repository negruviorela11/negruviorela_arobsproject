@extends('layouts/siteMaster')
@section('content')
<div class="new form-group">
    <?php if(!empty($validator)){ ?>
        <div class='alert alert-warning new'>
            <button type="button"class='close'data-dismiss='alert'aria-hidden='true'>
                &times;
            </button>
            <?php foreach($validator as $val){
                        echo $val;
            }
    }?>
        </div>
</div>
{{Form::open(['url'=>'reset/my/password','method'=>'post'])}}
{{Form::hidden('username',$user->username,Input::old('username'))}}
{{Form::hidden('password',$user->password,Input::old('password'))}}
{{Form::hidden('id',$user->id,Input::old('id'))}}
<div class="new form-group">
     {{Form::label('new_password', 'New Password')}} 
     {{ Form::password('new_password', Input::old('new_password'),array('class'  => 'form-control')) }}
</div>
<div class="new form-group">
      <?php echo Form::submit('Reset',array('class'  => 'btn btn-primary btn-lg'))?>
    <a href="{{url('')}}"class="btn btn-primary btn-lg">Cancel</a>
</div>
{{Form::close()}}
 @stop