@extends('layouts/siteMaster')
@section('content')

<div class="new">
    <table class="table table-hover">
        <tr class="info1">
            <td><b>Name</b></td>
            <td><b>Surname</b></td>
            <td><b>Email</b></td>
            <td><b>Birthday</b></td>
            <td><b></b></td>
        </tr>
            <?php foreach ($users as $key=>$user){?>
            <tr>
                <td>
                    <?php echo $user['name'];?>
                </td>
                <td>
                    <?php echo $user['surname']; ?>
                </td>
                <td>
                    <?php echo $user['email']; ?>
                </td>
                <td>
                    <?php echo $user['birthday']; ?>
                </td>
                <td class="actions">
                <a href="{{url('compose/message/'.$id)}}"><span class="glyphicon glyphicon-check" data-toggle="tooltip" data-placement="top" title="Send Message"></span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                </td>
            </tr>
            <?php } ?>
        </table>
    <a href="{{url('')}}"class="btn btn-primary btn-default">Cancel</a>
</div>

@stop