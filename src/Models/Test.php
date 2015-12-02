<?php
namespace Example\Models;

use Hyla\Orm\Cluster;

/**
 * Class Test
 * @package Example\Models
 */
class Test extends Cluster {
    protected $type = self::DB;
    protected $table = 'test';


}