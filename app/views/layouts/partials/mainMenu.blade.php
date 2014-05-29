<html>
    <head>
        <style>
            
        </style>
    </head>
    <body>
        <nav>
            <div>
            <?php if ($nr2==0){}else{?>
            <a href="{{url('new/messages/'.$id)}}">New Messages({{$nr2}})</a>|
            <?php } ?>
            </div>
            <a href="{{url('compose/message/'.$id)}}">Compose Message</a>|
            <a href="{{url('inbox/'.$id)}}">Inbox({{$nr}})</a>|
            <a href="{{url('sent/mails/'.$id)}}">Sent Mails({{$nr3}})</a>|
            <a href="{{url('drafts/'.$id)}}">Drafts({{$nr1}})</a>|
            <ul>
            |<a>Settings</a>|
            <li>
                <a href="{{url('edit/my/account/'.$id)}}">Edit My Account</a></li>
            <li>
                <a href="{{url('change/my/password/'.$id)}}">Change Password</a>
            </li>
            <li>
                <a href="{{url('list/users/'.$id)}}">List Users</a>
            </li>
            <li>
                <a href="{{url('logout')}}">Log out</a>
            </li>
            </ul>
        </nav>
    </body>
</html>