@extends('layouts/siteMaster')
@section('content')
<div>
    <?php if (Auth::check()){
        $id = Auth::user()->id;
        return Redirect::to('dashboard/'.$id);
    }else{?>
     <a href="{{url('login')}}"class="btn btn-primary">Log In</a>
     <a href="{{url('create/account')}}"class="btn btn-primary">Create Account</a>
    <?php }?>
</div>
@stop