<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Email extends Eloquent{
    public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'emails';
    protected $fillable = array('from_email','to_email','email_id');
}