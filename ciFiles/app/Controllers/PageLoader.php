<?php
namespace App\Controllers;

use App\Libraries\EnvFetcher;

class PageLoader extends BaseController
{
    
    public function lost()
    {
     
        echo view("lost");
     
    }

    public function envTest()
    {
        $envFetcher = new EnvFetcher(".env");
        $envFetcher->load();
        echo getenv("SAAS_APP_AUTH_KEY");
    }
    
}
