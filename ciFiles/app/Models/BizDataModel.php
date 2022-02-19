<?php namespace App\Models;

use CodeIgniter\Model;

class BizDataModel extends Model
{

    protected $table = "businesses";

    protected $primaryKey = 'id';

    protected $allowedFields = ['uid','business_name','email','mobile_number','whatsapp_number','address','country','city','pincode','google_map_embed_code','description','facebook','instagram','twitter','linkedin'];

}