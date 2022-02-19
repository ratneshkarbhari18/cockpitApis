<?php namespace App\Models;

use CodeIgniter\Model;

class ProductServiceModel extends Model
{

    protected $table = "products_services";

    protected $primaryKey = 'id';

    protected $allowedFields = ['bizid','title','slug','price','currency','stock_count','product_service','description'];

}