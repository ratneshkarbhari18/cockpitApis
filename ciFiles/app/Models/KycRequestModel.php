<?php namespace App\Models;

use CodeIgniter\Model;

class KycRequestModel extends Model
{

    protected $table = "kyc_requests";

    protected $primaryKey = 'id';

    protected $allowedFields = ['user_id','aadhaar_image','pan_image','aadhaar_number','pan_number','status'];

}