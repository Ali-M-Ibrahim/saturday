<?php

namespace App\Services;

class LogService{
    function LogData($message)
    {
      logger($message);
    }
}
