<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class EmailPage extends Eloquent{
    public $timestamps = false;
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
    protected $table = 'email_page';
    protected $fillable = array('subject','text','image','type');
}