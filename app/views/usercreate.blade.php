@extends('layouts/siteMaster')
@section('content')
<div class="new form-group">
    <?php $validator=Session::get('validator');
          if (!empty($validator)) {?>
    <div class='alert alert-warning clearfix new'>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            &times;
        </button>
        <ul>
            <?php foreach ($validator as $val) { ?>
            <li class='exception'>
                <?php echo $val; ?>
            </li>
            <?php } ?>
        </ul>
          <?php } ?>
    </div>
</div>

{{Form::open(['url'=>'confirm/user','method'=>'post','id'=>'validate-user'])}}
   <div class="new form-group">
        {{Form::label('name','Name:')}}
        {{Form::text('name',Input::old('name'), array('placeholder' => 'John','class'  => 'form-control'))}}
   </div>
   <div class="new form-group">
        {{Form::label('surname','Surname:')}}
        {{Form::text('surname',Input::old('surname'), array('placeholder' => 'Smith','class'  => 'form-control'))}}
   </div>
   <div class="new form-group">
        {{Form::label('username','Username:')}}
        {{Form::text('username',Input::old('username'), array('placeholder' => 'john_23','class'  => 'form-control'))}}  
   </div>
   <div class="new form-group">
        {{Form::label('password', 'Password')}} 
        {{ Form::password('password', Input::old('password'),array('class'  => 'form-control')) }}
   </div>
   <div class="new form-group">
        {{Form::label('birthday','Birthday:')}}
        {{Form::text('birthday',Input::old('birthday'), array('placeholder' => '1994.11.16','class'  => 'form-control'))}}  
   </div>
   <div class="new form-group">
        {{Form::label('email', 'Email:')}} 
        {{Form::text('email',Input::old('email'), array('placeholder' => 'johnsmith@gmail.com','class'  => 'form-control'))}}
   </div>
   <div class="new form-group">
        {{ Form::label('gender', 'Gender:') }}
        {{ Form::select('gender',$gender,Input::old('gender'), array('class'  => 'form-control'))}}
   </div>
   <div class="new form-group">
        {{ Form::label('question', 'Questions:') }}
        {{ Form::select('question',$questions,Input::old('question'), array('class'  => 'form-control'))}}
    </div>
   <div class="new form-group">
        {{Form::label('remember','Answer:')}}
        {{Form::text('remember',Input::old('remember'), array('placeholder' => 'johnny','class'  => 'form-control'))}}  
   </div>
   <div class="new form-group">
       <?php echo Form::submit('Create Account',array('class'  => 'btn btn-primary btn-lg'))?>
       <a href="{{url('')}}"class="btn btn-primary btn-lg">Cancel</a>
   </div>
{{Form::close()}}

@stop