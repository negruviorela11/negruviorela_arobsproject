@extends('layouts/siteMaster')
@section('content')

<div class="form-group new">
    <?php $validator=Session::get('validator');
          if(!empty($validator)){?>
    <div class='alert alert-warning'>
        <button type='button'class='close'data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <ul>
            <?php foreach ($validator as $val) { ?>
            <li class='exception'>
                <?php echo $val; ?>
            </li>
            <?php } ?>
        </ul>
    </div>
          <?php } ?>
</div>

{{Form::open(['url'=>'change','method'=>'post','class' => 'form-validate'])}}
{{Form::hidden('oldPass',$user->password,Input::old('oldpassword'))}}
{{Form::hidden('username',$user->username,Input::old('username'))}}
{{Form::hidden('id',$user->id,Input::old('id'))}}
<div class="form-group new">
    {{Form::label('password','Current Password:')}}
    {{Form::password('password',Input::old('password'),array('class'=>'form-control'))}}
</div>
<div class="form-group new">
    {{Form::label('new_password','New password:')}}
    {{Form::password('new_password',Input::old('new_password'),array('class'=>'form-control'))}}
</div>
<div class="form-group new">
    {{Form::submit('Change Password',array('class'=>'btn btn-primary'))}}
    <a href="{{url('')}}"class="btn btn-primary btn-default">Cancel</a>
</div>
{{Form::close()}}

@stop