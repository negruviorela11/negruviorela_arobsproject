@extends('layouts/siteMaster')
@section('content')
<div class="new form-group">
    <?php $error=Session::get('validator');
          if(!empty($error)){?>
    <div class='alert alert-warning clearfix new'>
        <button type='button'class='close'data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $error;?>
    </div>
          <?php } ?>
</div>
{{Form::open(['url'=>'forgot','method'=>'post'])}}
<div class="new form-group">
    {{Form::label('username','Username:')}}
    {{Form::text('username',Input::old('username'),array('class'=>'form-control'))}}
</div>
<div class="new form-group">
    {{ Form::label('question', 'Question:') }}
    {{ Form::select('questions',$questions, array('class'  => 'form-control'))}}
</div>
<div class="new form-group">
    {{Form::label('remember','Answer:')}}
    {{Form::text('remember',Input::old('remember'),array('class'  => 'form-control'))}}
</div>
<div class="new form-group">
    <?php echo Form::submit('Try log in',array('class'  => 'btn btn-primary btn-lg'))?>
    <a href="{{url('')}}"class="btn btn-primary btn-lg">Back to Menu</a>
</div>
{{Form::close()}}

@stop
