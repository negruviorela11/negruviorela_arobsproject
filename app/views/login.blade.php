@extends('layouts/siteMaster')
@section('content')
<div class="new form-group">
    <?php $validator=Session::get('validator');
          $message=Session::get('message');
          if(!empty($validator)) {?>
    <div class='alert alert-warning clearfix new'> 
        <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $validator;?>
    </div>
          <?php } 
           if(!empty($message)) {?>
    <div class='alert alert-success clearfix new'> 
        <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $message;?>
    </div>
          <?php } ?>
          
</div>
{{Form::open(['url'=>'signin','method'=>'post','id'=>'log-in'])}}
<div class="new form-group">
    {{Form::label('username','Username:')}}
    {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
</div>
<div class="new form-group">
    {{Form::label('password','Password:')}}
    {{Form::password('password',array('class'=>'form-control'))}}
</div>
<div class="new form-group">
    {{Form::submit('LogIn',array('class'=>'btn btn-primary'))}}
    <a href="{{url('')}}"class="btn btn-primary btn-default">Cancel</a>
</div>
{{Form::close()}}
<div class="new form-group">
    <a href="{{url('forgot/password')}}"class="btn btn-primary btn-lg active"role="button">Forgot your password ?</a>
</div>

@stop