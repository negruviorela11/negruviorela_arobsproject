@extends('layouts/siteMaster')
@section('content')
<div>
    <?php $validator=Session::get('validator');
          if (!empty($validator)) {?>
    <div class='alert alert-warning clearfix'>
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
<div>

{{Form::open(['url'=>'confirm/user','method'=>'post', 'class' => 'form-validate','id'=>'user-edit'])}}
    {{Form::hidden('id',$user->id,Input::old('id'))}}

    <div>
        {{Form::label('name','Name:')}}
        {{Form::text('name',$user->name, array('class'  => 'form-control'))}}
    </div>
    
    <div>
            {{Form::label('surname','Surname:')}}
            {{Form::text('surname',$user->surname, array('class'  => 'form-control'))}}
    </div>
    <div>
            {{Form::label('username','Username:')}}
            {{Form::text('username',$user->username, array('class'  => 'form-control'))}}  
    </div>
    <div>
            {{Form::label('birthday','Birthday:')}}
            {{Form::text('birthday',$user->birthday, array('class'  => 'form-control'))}}  
    </div>
    <div>
            {{Form::label('email', 'Email:')}} 
            {{Form::text('email',$user->email, array('class'  => 'form-control'))}}
    </div>
    <div>
            {{ Form::label('gender', 'Gender:') }}
            {{ Form::select('gender',$gender,Input::old('gender'), array('class'  => 'form-control'))}}
    </div>
    <div>
            {{ Form::label('question', 'Questions:') }}
            {{ Form::select('question',$questions,Input::old('question'),array('class'  => 'form-control'))}}
    </div>
    <div>
            {{Form::label('remember','Answer:')}}
            {{Form::text('remember',$user->remember, array('class'  => 'form-control'))}}  
    </div> 
    <?php echo Form::submit('Edit account',array('class'  => 'btn btn-primary btn-lg'))?>
{{Form::close()}}
</div>
@stop