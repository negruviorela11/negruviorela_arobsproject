@extends('layouts/siteMaster')
@section('content')
<div class="new">
    <?php $message=Session::get('message');
          if(!empty($message)){?>
          <div class='alert alert-success clearfix'> 
          <button type='button'class='close' data-dismiss='alert'aria-hidden='true'>
                &times;
          </button>
                <?php echo $message;?>
          </div>
          <?php } ?>
</div>
<div class="new">
    <table class="table table-hover">
        <tr class="info1">
            <td><b>From</b></td>
            <td><b>Subject</b></td>
            <td><b>Message</b></td>
            <td><b>Date | Time</b></td>
            <td></td>
            <td></td>
        </tr>
        <?php foreach ($emails as $key=>$email){?>
        <tr>
            <td>
                <?php echo $email[0];?>
            </td>
            <td>
                <?php echo $email[1]; ?>
            </td>
            <td>
                <?php echo $email[2]; ?>
             </td>
            <td>
                <?php echo $email[3]; ?>
            </td>
            <td class="actions">
                <a href="{{url('view/message/'.$key)}}"><span class="glyphicon glyphicon-check" data-toggle="tooltip" data-placement="top" title="View Message"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="#" class="deletemess" id="{{'deletemess_'.$key}}"><span class="glyphicon glyphicon-trash" data-toggle="modal" data-target="#myModal" title="Delete Message"</span></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
            </td>
        </tr>
        <?php } ?>
    </table>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><b>Confirm</b></h4>
      </div>
      <div class="modal-body">
          
          <p> <b>Are you sure you want to delete this message?</b></p>
       
      </div>
      <div class="modal-footer">
     <a href="#" id="confdeletemess" class="btn btn-primary">YES</a>
    <a href="#" id="canceldelpost" class="btn">NO</a>  
  </div>
    </div>
  </div>
</div>
</div>
@stop