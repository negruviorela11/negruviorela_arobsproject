<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SiteController extends BaseController{
    public function listPage(){
        if (Auth::check()){
            $id = Auth::user()->id;
            return Redirect::to('dashboard/'.$id);
        }else{
        return View::make('site');
        }
    }
    public function dashboard($id){
        if(Auth::check()){
            $email=new EmailController();
            $array=$email->inboxEmails($id);
            $nr=array_pop($array);
            $em=new EmailController();
            $array1=$em->draftsEmails($id);
            $nr1=array_pop($array1);
            $email2=new EmailController();
            $array2=$email2->newMessagesNr($id);
            $nr2=array_pop($array2);
            $email3=new EmailController();
            $array3=$email3->sentMails($id);
            $nr3=array_pop($array3);
            return View::make('dashboard',array('id'=>$id,'array'=>$array,'nr'=>$nr,'array1'=>$array1,'nr1'=>$nr1,'nr2'=>$nr2,'nr3'=>$nr3));
        }else{
            return Redirect::to('login')->with('message','need to log in  first!');
        }
    }
}