<?php

namespace App\Services;

class LoggerService{
    public function log($content){
        logger($content);
    }
}
