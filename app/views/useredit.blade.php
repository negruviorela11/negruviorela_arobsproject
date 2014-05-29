@extends('layouts/siteMaster')
@section('content')
<div class="new">
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
<div class="new form-group">

{{Form::open(['url'=>'confirm/user','method'=>'post', 'class' => 'form-validate','id'=>'user-edit'])}}
    {{Form::hidden('id',$user->id,Input::old('id'))}}

    <div class="new form-group">
        {{Form::label('name','Name:')}}
        {{Form::text('name',$user->name, array('class'  => 'form-control'))}}
    </div>
    
    <div class="new form-group">
            {{Form::label('surname','Surname:')}}
            {{Form::text('surname',$user->surname, array('class'  => 'form-control'))}}
    </div>
    <div class="new form-group">
            {{Form::label('username','Username:')}}
            {{Form::text('username',$user->username, array('class'  => 'form-control'))}}  
    </div>
    <div class="new form-group">
            {{Form::label('birthday','Birthday:')}}
            {{Form::text('birthday',$user->birthday, array('class'  => 'form-control'))}}  
    </div>
    <div class="new">
            {{Form::label('email', 'Email:')}} 
            {{Form::text('email',$user->email, array('class'  => 'form-control'))}}
    </div>
    <div class="new form-group">
            {{ Form::label('gender', 'Gender:') }}
            {{ Form::select('gender',$gender,Input::old('gender'), array('class'  => 'form-control'))}}
    </div>
    <div class="new">
            {{ Form::label('question', 'Questions:') }}
            {{ Form::select('question',$questions,Input::old('question'),array('class'  => 'form-control'))}}
    </div>
    <div class="new form-group">
            {{Form::label('remember','Answer:')}}
            {{Form::text('remember',$user->remember, array('class'  => 'form-control'))}}  
    </div> 
    <div class="new form-group">
    <?php echo Form::submit('Edit account',array('class'  => 'btn btn-primary btn-lg'))?>
    <a href="{{url('')}}"class="btn btn-primary btn-lg">Cancel</a>
    </div>
{{Form::close()}}
</div>
@stop