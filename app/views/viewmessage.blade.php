@extends('layouts/siteMaster')
@section('content')
<div>
<?php if(!empty($message)){
    foreach($message as $m){ ?>
    <div class='alert alert-success clearfix'> 
        <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
            &times;
        </button>
        <?php echo $message[0];?>
    </div>
          <?php } 
    }
?>
</div>
<div class="new form-group">
    <h3 class=" new">Subject</h3>
    <div class="form-control new"><?php echo $email['subject'];?></div>
    <h3 class="new">Message</h3>
    <div class="form-control new"><?php echo $email['text'];?></div>
    <div class="new form-group">
    <a href="{{url('')}}"class="btn btn-primary btn-default">Back to menu</a>
    </div>
</div>
@stop