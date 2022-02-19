<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{

    protected $table = "users";

    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'last_name','email','mobile_number','role','password','address','country','state','plan','expiry','kyc_status','email_verified'];

}