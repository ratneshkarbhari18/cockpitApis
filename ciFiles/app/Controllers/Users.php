<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\BizDataModel;

use App\Libraries\EnvFetcher;

class Users extends BaseController
{

    public function fetch_by_id(){


        $envFetcher = new EnvFetcher(".env");
        
        $envFetcher->load();

        $apiKey = $this->request->getPost("api_key");

        if ($apiKey!=getenv("SAAS_APP_AUTH_KEY")) {
            return json_encode(
                array("result"=>"failure","message"=>"Api Key incorrect")
            );
        }
        
        $encryptedId = $this->request->getPost("id");

        helper("encryption");

        $realId = decrypt($encryptedId);

        $userModel = new UserModel();

        $userData = $userModel->find($realId);

        if ($userData) {
            
            return json_encode(
                array(
                    "result" => "success",
                    "data" => $userData
                )
            );
            
        } else {
            
            return json_encode(
                array(
                    "result" => "failure",
                    "message" => "User by this Id not found"
                )
            );
            
        }
        
        
    }

    public function increase_user_expiry_by_days_days(){

        $envFetcher = new EnvFetcher(".env");
        
        $envFetcher->load();

        $apiKey = $this->request->getPost("api_key");

        if ($apiKey!=getenv("SAAS_APP_AUTH_KEY")) {
            return json_encode(
                array("result"=>"failure","message"=>"Api Key incorrect")
            );
        }

        $encryptedId = $this->request->getPost("id");

        $days = $this->request->getPost("days");

        helper("encryption");

        $realId = decrypt($encryptedId);

        $userModel = new UserModel();

        $userData = $userModel->find($realId);

        $expiryDate = $userData["expiry"];

        $expiryDate = date('d-m-Y', strtotime($expiryDate. ' + '.$days.' days')); 
        
        $dataToUpdate = array("expiry"=>$expiryDate);

        $updated = $userModel->update($realId,$dataToUpdate);

        if ($updated) {
            
            return json_encode(
                array("result"=>"success","message"=>"User expiry date updated")
            );
            
        } else {

            return json_encode(
                array("result"=>"failure","message"=>"User expiry date not updated")
            );
            
        }
        
        
    }

    public function user_authenticate(){

        $envFetcher = new EnvFetcher(".env");
        
        $envFetcher->load();

        $apiKey = $this->request->getPost("api_key");

        if ($apiKey!=getenv("SAAS_APP_AUTH_KEY")) {
            return json_encode(
                array("result"=>"failure","message"=>"Api Key incorrect")
            );
        }

        $emailEntered = $this->request->getPost("email");

        $pwdEntered = $this->request->getPost("password");

        $userModel = new UserModel();

        $userData = $userModel->where("email",$emailEntered)->where("role","user")->first();

        if ($userData) {
            
            $passwordCorrect = password_verify($pwdEntered,$userData["password"]);

            if ($passwordCorrect) {

                $bizDataModel = new BizDataModel();

                $bizData = $bizDataModel->find($userData["id"]);

                $sessionData = array(
                    "id" => $userData["id"],
                    "bizid" => $bizData["pid"],
                    "first_name" => $userData["first_name"],
                    "last_name" => $userData["last_name"],
                    "email" => $userData["email"],
                    "email_verified" => $userData["email_verified"],
                    "expiry" => $userData["expiry"],
                    "role" => "user",
                    "kyc_status" => $userData["kyc_status"],
                );
                
                return json_encode(
                    array("result"=>"success","session_data"=>$sessionData)
                );
                
            } else {
                
                return json_encode(
                    array("result"=>"failure","message"=>"Password incorrect")
                );
                
            }
            

        } else {

        
            return json_encode(
                array("result"=>"failure","message"=>"Email incorrect")
            );
            
        
        }
        
        
    }

    public function admin_authenticate(){

        $envFetcher = new EnvFetcher(".env");
        
        $envFetcher->load();

        $apiKey = $this->request->getPost("api_key");

        if ($apiKey!=getenv("SAAS_APP_AUTH_KEY")) {
            return json_encode(
                array("result"=>"failure","message"=>"Api Key incorrect")
            );
        }

        $emailEntered = $this->request->getPost("email");

        $pwdEntered = $this->request->getPost("password");

        $userModel = new UserModel();

        $userData = $userModel->where("email",$emailEntered)->where("role","admin")->first();

        if ($userData) {
            
            $passwordCorrect = password_verify($pwdEntered,$userData["password"]);

            if ($passwordCorrect) {

                $sessionData = array(
                    "id" => $userData["id"],
                    "first_name" => $userData["first_name"],
                    "last_name" => $userData["last_name"],
                    "email" => $userData["email"],
                    "role" => "admin",

                );
                
                return json_encode(
                    array("result"=>"success","session_data"=>$sessionData)
                );
                
            } else {
                
                return json_encode(
                    array("result"=>"failure","message"=>"Password incorrect")
                );
                
            }
            

        } else {

        
            return json_encode(
                array("result"=>"failure","message"=>"Email incorrect")
            );
            
        
        }

    }



}