<?php
namespace App\Facades;
use Illuminate\Support\Facades\Facade;
class PdoGspg extends Facade{
    protected static function getFacadeAccessor() { return 'mypdogspg'; }
}
