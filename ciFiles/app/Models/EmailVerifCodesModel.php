<?php namespace App\Models;

use CodeIgniter\Model;

class EmailVerifCodesModel extends Model
{

    protected $table = "email_verif_codes";

    protected $primaryKey = 'id';

    protected $allowedFields = ['email','code'];

}