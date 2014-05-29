<?php


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class UserController extends BaseController{
    public function createUser(){
        $gender=array('Male','Female','Other');
        $rememberQuestions=array('What was your childhood nickname? ','What school did you attend for sixth grade?',
                                  'In what city or town did your mother and father meet?','In what city or town was your first job?',
                                    'What time of the day were you born?');
        return View::make('usercreate',array('gender'=>$gender,'questions'=>$rememberQuestions));
    }
    public function confirmUser(){
        if(Input::get('id')){
            $v=$this->validateUser(Input::all(),'edit');
            $messages = $v->messages();
            $messagesString=array();
            foreach ($messages->all() as $message)
            {
                $messagesString[]=$message;
            }
            if($v->passes()){
                $user=array('name'=>Input::get('name'),
                        'surname'=>Input::get('surname'),
                        'username'=>Input::get('username'),
                        'birthday'=>Input::get('birthday'),
                        'gender'=>Input::get('gender'),
                        'email'=>Input::get('email'),
                        'remember'=>Input::get('remember'),
                        'question'=>Input::get('question'));
                User::where('id', Input::get('id'))->update($user);
                return Redirect::to('dashboard/'.Input::get('id'))->with('message','Your account has been modified!');
            }else{
                return Redirect::to('edit/my/account/'.Input::get('id'))->with('validator',$messagesString);
            }
        }else{
            $v=$this->validateUser(Input::all(),'create');
            $messages = $v->messages();
            $messagesString=array();
            foreach ($messages->all() as $message)
            {
                $messagesString[]=$message;
            }
            if($v->passes()){
                $user=array('name'=>Input::get('name'),
                        'surname'=>Input::get('surname'),
                        'username'=>Input::get('username'),
                        'password'=>Hash::make(Input::get('password')),
                        'birthday'=>Input::get('birthday'),
                        'gender'=>Input::get('gender'),
                        'email'=>Input::get('email'),
                        'remember'=>Input::get('remember'),
                        'question'=>Input::get('question'));
                User::create($user);
             return Redirect::to('login')->with('message','Your account has been registered!');
            }else{
                  return Redirect::to('create/account')->with('validator',$messagesString);
            }
        }
        
    }
    public function editUser($id){
        if(Auth::check()){
            $gender=array('Male','Female','Other');
            $rememberQuestions=array('What was your childhood nickname? ','What school did you attend for sixth grade?',
                                  'In what city or town did your mother and father meet?','In what city or town was your first job?',
                                    'What time of the day were you born?');
            $user=new User();
            $userData=$user->find($id);
        return View::make('useredit',array('user'=>$userData,'gender'=>$gender,'questions'=>$rememberQuestions));
        }else{
            return Redirect::to('login')->with('validator','You need to log in first!');
        }
    }
    public function listUsers($id){
        if(Auth::check()){
            $user=new User();
            $users=$user->all();
            foreach($users as $key=>$user){
                if($user['id']==$id){
                    unset($users[$key]);
                }
            }
            return View::make('userlist',array('users'=>$users,'id'=>$id));
        }else{
            return Redirect::to('login')->with('validator','You need to log in first');
        }
    }
    public function getLogIn(){
        if(Auth::check()){
            return Redirect::to('dashboard/'.Auth::user()->id);
        }else{
            return View::make('login');
        }
    }
    public function logIn(){
        $credentials= array('username' => Input::get('username'), 'password' => Input::get('password'));
        if(Auth::attempt($credentials)){
                $user=new User();
                $users=$user->all();
                foreach($users as $ur){
                    if($ur['username']==Input::get('username')){
                        $varId=$ur['id'];
                    }
                }
                return Redirect::to('dashboard/'.$varId)->with('message', 'You are now logged in!');
                                               
        } else {
                 return Redirect::to('login')
                            ->with('validator', 'Your username/password combination was incorrect')
                            ->withInput();
        }   
    }
    public function getLogOut(){
       
            Auth::logout();
            return Redirect::to('');
       
    }
    public function changePassword($id){
        if(Auth::check()){
            $user=new User();
            $userData=$user->find($id);
            return View::make('changepass',array('user'=>$userData));
        }else{
            return Redirect::to('login')->with('validator','You need to log in first');
        }
    }
    public function changePass(){
            $v=$this->validateUser(Input::all(),'change');
            $messages = $v->messages();
            $messagesString=array();
            foreach ($messages->all() as $message)
            {
                $messagesString[]=$message;
            }
            if($v->passes()){
                $arr=array('username'=>Input::get('username'),'password'=>Input::get('password'));
                $use=array('password'=>Hash::make(Input::get('new_password')));
                if(Auth::attempt($arr)){
                    User::where('id', Input::get('id'))->update($use);
                    return Redirect::to('dashboard/'.Input::get('id'))->with('message','Your password has been changed!');
                }else{
                    $messagesString[]='Your current password is wrong !';
                    return Redirect::to('change/my/password/'.Input::get('id'))->with('validator',$messagesString);;
                                                                              
                }
            }else{
                $arr=array('username'=>Input::get('username'),'password'=>Input::get('password'));
                $use=array('password'=>Hash::make(Input::get('new_password')));
                if(Auth::attempt($arr)){
                    return Redirect::to('change/my/password/'.Input::get('id'))->with('validator',$messagesString);
                                                                            
                }else{
                    $messagesString[]='Your current password is wrong !';
                    return Redirect::to('change/my/password/'.Input::get('id'))->with('validator',$messagesString);
                                                                              
                }
            }
    } 
    public function forgotPass(){
        $rememberQuestions=array('What was your childhood nickname? ','What school did you attend for sixth grade?',
                                  'In what city or town did your mother and father meet?','In what city or town was your first job?',
                                    'What time of the day were you born?');
        return View::make('forgotpassword',array('questions'=>$rememberQuestions));
    }
    public function forgot(){
        $users=User::all();
        foreach($users as $user){
            if($user['username']==Input::get('username')&&($user['remember']==Input::get('remember'))){
                    return View::make('reset',array('user'=>$user));
                }
            }
        return Redirect::to('forgot/password')->with('validator','Your username/answer combination was incorrect')
                               ->withInput();
        }
    public function reset(){
        $v=$this->validateUser(Input::all(),'reset');
        $messages = $v->messages();
        $messagesString=array();
        foreach ($messages->all() as $message)
        {
             $messagesString[]=$message;
        }
        if($v->passes()){
            $use=array('password'=>Hash::make(Input::get('new_password')));
            User::where('id', Input::get('id'))->update($use);
            return Redirect::to('login')->with('message','Your password has been modified');
        }else{
            $u=new User();
            $user=$u->find(Input::get('id'));
            return View::make('reset',array('user'=>$user,'validator'=>$messagesString));
        }
            
    }
    public function validateUser($post,$type){
        if($type=='create'){

                $rules=array(
                    'name'=>'Required|Min:3|Max:50',
                    'surname'=>'Required|Min:3|Max:50',
                    'username'=>'Required|Min:3|Max:50',
                    'password'=>'Required|Min:3|Max:50',
                    'birthday'=>'Required',
                    'email' => 'Required|email',
                    'gender'=>'Required',
                    'remember'=>'Required|Min:3|Max:50',
                    'question'=>'Required'
                );
                return Validator::make($post, $rules);
            
                                                
        }
        if($type=='edit'){
            $rules=array(
                'name'=>'Required|Min:3|Max:50',
                'surname'=>'Required|Min:3|Max:50',
                'username'=>'Required|Min:3|Max:50',
                'birthday'=>'Required',
                'email' => 'Required|email',
                'gender'=>'Required',
                'remember'=>'Required|Min:3|Max:50',
                'question'=>'Required'
            );
            return Validator::make($post, $rules);
        }
        if($type=='reset') {
            $rules=array('new_password'=>'Required|Min:3|Max:50');
            return Validator::make($post,$rules);
        }
        if($type=='change'){
            $rules=array('new_password'=>'Required|Min:3|Max:50');
            return Validator::make($post,$rules);
        }
    }
}