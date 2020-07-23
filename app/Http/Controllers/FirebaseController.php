<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Database;
class FirebaseController extends Controller
{
  public function index(){
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/tugassandi-f4a46-firebase-adminsdk-3rrz9-588d36a9db.json');
       $firebase = (new Factory)
       ->withServiceAccount($serviceAccount)
       ->withDatabaseUri('https://tugassandi-f4a46.firebaseio.com/')
       ->create();

       $database = $firebase->getDatabase();

       $newPost = $database
       ->getReference('subjek')
       ->push([
       'title' => 'Laravel FireBase Tutorial' ,
       'category' => 'Laravel'
       ]);
       echo '<pre>';
       print_r($newPost->getvalue());
}
}
