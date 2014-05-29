<!DOCTYPE>
<html>
    <head>
        <style>
            .dropdown:hover .dropdown-menu{
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="meniu"id="rotund">
            <nav class="navbar navbar-default navCol"role="navigation">
                <div class="container-fluid">
                <div class="collapse navbar-collapse"id="bs-example-navbar-collapse-1">
                <div align="center">
                <?php if ($nr2==0){}else{?>
                    <ul class="nav navbar-nav newMessMenu">
                    <li class="">
                        <a href="{{url('new/messages/'.$id)}}">New Messages({{$nr2}})</a>
                    </li>
                    </ul>
                <?php } ?>
                </div>
               
                <ul class="nav navbar-nav">
                    <li class="comp">
                        <a href="{{url('compose/message/'.$id)}}">Compose Message</a>
                
                    </li>
                </ul>  
                <ul class="nav navbar-nav">
                    <li class="comp">
                        <a href="{{url('inbox/'.$id)}}">Inbox({{$nr}})</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="comp">
                        <a href="{{url('sent/mails/'.$id)}}">Sent Mails({{$nr3}})</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="comp">
                        <a href="{{url('drafts/'.$id)}}">Drafts({{$nr1}})</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="dropdown settings">
                        <a>Settings</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown">
                                <a href="{{url('edit/my/account/'.$id)}}">Edit My Account</a>
                
                            <a href="{{url('change/my/password/'.$id)}}">Change Password</a>
                
                            <a href="{{url('list/users/'.$id)}}">List Users</a>
               
                            <a href="{{url('logout')}}">Log out</a>
                        </li>
                    </ul>
                    </li>
                </ul>
                </div>
                </div>  
            </nav>
        </div>
    </body>
</html>