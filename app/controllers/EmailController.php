<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmailController extends BaseController{
    public function send(){
       $v=$this->validate(Input::all(),'compose');
       $messages = $v->messages();
       $messagesString=array();
       foreach ($messages->all() as $message)
       {
             $messagesString[]=$message;
       }
       if($v->passes()){
            $emailPage=array(
                'subject'=>Input::get('subject'),
                'text'=>Input::get('text'),
                'type'=>'unread'
            );
            $e=EmailPage::create($emailPage);
            $email=array(
                'from_email'=>Input::get('from_email'),
                'to_email'=>Input::get('to_email'),
                'email_id'=>($e['id'])
            );
            Email::create($email);
            return Redirect::to('dashboard/'.Input::get('id'))->with('message','The email has been sent!');
       }else{
           $emailData=User::find(Input::get('id'));
           return View::make('compose',array('user'=>$emailData,'validator'=>$messagesString));
       }
    }
    public function composeMessage($id){
        $emailData=User::find($id);
        return View::make('compose',array('user'=>$emailData));
    }
    public function inbox($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        foreach($emails as $e){
            if($e['to_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='read')){
                      
                        $array[$em['id']]=array($e['from_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        return View::make('inbox',array('userEmail'=>$userEmail,'emails'=>$array));
    }
    public function inboxEmails($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        $nr=0;
        foreach($emails as $e){
            if($e['to_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='read')){
                        $nr+=1;
                        $array[$em['id']]=array($e['from_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        array_push($array,$nr);
        return $array;
    }
    public function draftsEmails($id){
         $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        $ar=array();
        $nr=0;
        foreach($emails as $e){
            if($e['from_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='draft')){
                        $nr+=1;
                        $array[$em['id']]=array($e['from_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        array_push($array,$nr);
        return $array;
    }
    public function drafts($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        $ar=array();
        $nr=0;
        foreach($emails as $e){
            if($e['from_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='draft')){
                        $nr+=1;
                        $array[$em['id']]=array($e['to_email'],$em['subject'],$em['text'],$e['created_at'],$nr);
                    } 
                }
                
            }
        }
        return View::make('drafts',array('draftEmail'=>$array));
    }
    public function newMessages($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        foreach($emails as $e){
            if($e['to_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='unread')){
                      
                        $array[$em['id']]=array($e['from_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        return View::make('newmessages',array('userEmail'=>$userEmail,'emails'=>$array));
    }
    public function newMessagesNr($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        $ar=array();
        $nr=0;
        foreach($emails as $e){
            if($e['to_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']=='unread')){
                        $nr+=1;
                        $array[$em['id']]=array($e['from_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        array_push($array,$nr);
        return $array;
    }
    public function viewMessage($id){
        if(Auth::check()){
            $email=new EmailPage();
            $viewEmail=$email->find($id);
            DB::table('email_page')->where('id','=',$viewEmail->id)->update(array('type'=>'read'));
            $message=array('This selected email can then be found in inbox!');
            return View::make('viewmessage',array('email'=>$viewEmail,'message'=>$message));
        }else{
            return Redirect::to('login')->with('message','You need to log in first');
        }
    }
    public function viewMessages($id){
        if(Auth::check()){
            $email=new EmailPage();
            $viewEmail=$email->find($id);
            DB::table('email_page')->where('id','=',$viewEmail->id)->update(array('type'=>'read'));
            return View::make('viewmessage',array('email'=>$viewEmail));
        }else{
            return Redirect::to('login')->with('message','You need to log in first');
        }
    }
    public function deleteMessage($id){
        if(Auth::check()){
            $email=new Email();
            $emailAll=$email->all();
            $user=new User();
            $userAll=$user->all();
            $em=new EmailPage();
            $emALL=$em->all();
            foreach($emailAll as $e){
                if($e['email_id']==$id){
                    foreach($userAll as $u){
                        if($e['to_email']==$u->email){
                            $emailID=$em->find($e['email_id']);
                            $userID=$u->id;
                        }
                }
                    
            }
            }
            DB::table('email_page')->where('id','=',$emailID['id'])->update(array('type'=>'archive'));
            return Redirect::to('new/messages/'.$userID)->with('message', 'The selected email has been deleted!');
       
        }else{return Redirect::to('login')->with('message', 'You need to log in first!');}
    }
    public function deleteMessageInbox($id){
        if(Auth::check()){
            $email=new Email();
            $emailAll=$email->all();
            $user=new User();
            $userAll=$user->all();
            $em=new EmailPage();
            $emALL=$em->all();
            foreach($emailAll as $e){
                if($e['email_id']==$id){
                    foreach($userAll as $u){
                        if($e['to_email']==$u->email){
                            $emailID=$em->find($e['email_id']);
                            $userID=$u->id;
                        }
                }
                    
            }
            }
            DB::table('email_page')->where('id','=',$emailID['id'])->update(array('type'=>'archive'));
            return Redirect::to('inbox/'.$userID)->with('message', 'The selected email has been deleted!');
       
        }else{return Redirect::to('login')->with('message', 'You need to log in first!');}
    }
    public function deleteMessageSent($id){
        if(Auth::check()){
            $email=new Email();
            $emailAll=$email->all();
            $user=new User();
            $userAll=$user->all();
            $em=new EmailPage();
            $emALL=$em->all();
            foreach($emailAll as $e){
                if($e['email_id']==$id){
                    foreach($userAll as $u){
                        if($e['from_email']==$u->email){
                            $emailID=$em->find($e['email_id']);
                            $userID=$u->id;
                        }
                }
                    
            }
            }
            DB::table('email_page')->where('id','=',$emailID['id'])->update(array('type'=>'archiveSend'));
            return Redirect::to('sent/mails/'.$userID)->with('message', 'The selected email has been deleted!');
       
        }else{return Redirect::to('login')->with('message', 'You need to log in first!');}
    }
    public function deleteMessageDraft($id){
        if(Auth::check()){
            $email=new Email();
            $emailAll=$email->all();
            $user=new User();
            $userAll=$user->all();
            $em=new EmailPage();
            $emALL=$em->all();
            foreach($emailAll as $e){
                if($e['email_id']==$id){
                    foreach($userAll as $u){
                        if($e['from_email']==$u->email){
                            $emailID=$em->find($e['email_id']);
                            $userID=$u->id;
                        }
                }
                    
            }
            }
            DB::table('email_page')->where('id','=',$emailID['id'])->update(array('type'=>'archiveDraft'));
            return Redirect::to('drafts/'.$userID)->with('message', 'The selected email has been deleted!');
       
        }else{return Redirect::to('login')->with('message', 'You need to log in first!');}
    }
    public function sent($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $array=array();
        foreach($emails as $e){
            if($e['from_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']!='archiveSend')&&($em['type']!='draft')&&($em['type']!='archiveDraft')){
                        $array[$em['id']]=array($e['to_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        return View::make('sentmails',array('userEmail'=>$userEmail,'emails'=>$array));
    }
    public function sentMails($id){
        $user=new User();
        $userData=$user->find($id);
        $userEmail=$userData['email'];
        $email=new Email();
        $emails=$email->all();
        $sentEmail=new EmailPage();
        $allEmails=$sentEmail->all();
        $nr=0;
        $array=array();
        foreach($emails as $e){
            if($e['from_email']==$userEmail){
                foreach($allEmails as $em){
                    if(($em['id']==$e['email_id'])&&($em['type']!='archiveSend')&&($em['type']!='draft')&&($em['type']!='archiveDraft')){
                        $nr+=1;
                        $array[$em['id']]=array($e['to_email'],$em['subject'],$em['text'],$e['created_at']);
                    } 
                }
                
            }
        }
        array_push($array,$nr);
        return $array;
    }
    public function validate($post,$type){
        if($type=='compose'){
            $rules=array('to_email'=>'Required|email');
            return Validator::make($post,$rules);
        }
    }
}