@extends('layouts/siteMaster')
@section('content')
<div>
    <?php $validator=Session::get('validator');
          $message=Session::get('message');
          if(!empty($validator)) {?>
    <div class='alert alert-warning clearfix'> 
        <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $validator;?>
    </div>
          <?php } 
           if(!empty($message)) {?>
    <div class='alert alert-success clearfix'> 
        <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $message;?>
    </div>
          <?php } ?>
          
</div>
{{Form::open(['url'=>'signin','method'=>'post','id'=>'log-in'])}}
<div>
    {{Form::label('username','Username:')}}
    {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
</div>
<div>
    {{Form::label('password','Password:')}}
    {{Form::password('password',array('class'=>'form-control'))}}
</div>
    {{Form::submit('LogIn',array('class'=>'btn btn-primary'))}}
{{Form::close()}}
<div>
    <a href="{{url('forgot/password')}}"class="btn btn-primary btn-lg active"role="button">Forgot your password ?</a>
</div>

@stop