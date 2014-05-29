@extends('layouts/siteMaster')
@section('content')
<div>
    <?php $error=Session::get('validator');
          if(!empty($error)){?>
    <div class='alert alert-warning clearfix'>
        <button type='button'class='close'data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $error;?>
    </div>
          <?php } ?>
</div>
{{Form::open(['url'=>'forgot','method'=>'post'])}}
<div>
    {{Form::label('username','Username:')}}
    {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
</div>
<div>
    {{ Form::label('question', 'Question:') }}
    {{ Form::select('questions',$questions, array('class'  => 'form-control'))}}
</div>
<div>
    {{Form::label('remember','Answer:')}}
    {{Form::text('remember',Input::old('remember'),array('class'  => 'form-control'))}}
</div>
    <?php echo Form::submit('Try log in',array('class'  => 'btn btn-primary btn-lg'))?>
{{Form::close()}}

@stop
