@extends('layouts/siteMaster')
@section('content')
<div class="new">
    <?php if (Auth::check()){
        $id = Auth::user()->id;
        return Redirect::to('dashboard/'.$id);
    }else{?>
    <div class="new">
        <a href="{{url('login')}}"class="btn btn-primary">Log In</a></div><p><b>..or...</b></p>
    <div class="new">
        <a href="{{url('create/account')}}"class="btn btn-primary btns">Create Account</a></div>
    <?php }?>
</div>
@stop