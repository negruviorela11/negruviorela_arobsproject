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
@include('layouts/partials/mainMenu')
@stop