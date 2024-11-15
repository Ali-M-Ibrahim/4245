<?php

namespace App\Http\Controllers;

use App\Services\LoggerService;
use Illuminate\Http\Request;

class DIController extends Controller
{

    private $mylogger;

    public function __construct(LoggerService $logger){

        $this->mylogger=$logger;
    }
    function f1()
    {
        $logger = new LoggerService();
        $logger->log("this is my log content without DI");
        return "done";
    }

    function f2(LoggerService $logger)
    {
        $logger->log("this is my log content with method DI");
        return "ok";
    }

    function f3()
    {
        $this->mylogger->log('this is my log content using constructor DI');
    }

    function f4()
    {
        $this->mylogger->log('this is my log content using constructor DI');
    }


}
