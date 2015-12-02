<?php
namespace Example\Models;

use Hyla\Orm\Cluster;

class Test extends Cluster {
    protected $type = self::DB;
    protected $table = 'test';


}