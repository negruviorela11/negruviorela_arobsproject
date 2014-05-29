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
<table>
 <tr>
            <td>
                <?php echo $email['subject'];?>
            </td>
            <td>
                <?php echo $email['text']; ?>
            </td>
            <td>
                <?php echo $email[2]; ?>
             </td>
            <td>
                <?php echo $email[3]; ?>
            </td>
 </tr>
</table>
@stop