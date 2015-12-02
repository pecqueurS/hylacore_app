<?php
namespace Example\Controllers;


use Example\Models\Test;
use Hyla\Controller\Controller;
use Hyla\Db\Db;
use Hyla\Orm\Unit;

/**
 * Class Home
 * @package Example\Controllers
 */
class Home extends Controller {
    public function show($id, $name = null)
    {
        $test = new Test();
        $select = $test->select();
        var_dump($select);

        $unit = new Unit(array('id', 'name', 'price', 'category'), true);
        $unit->name = 'test name';
        $unit->price = '32';
        $unit->category = 'test category';
        $test->saveRows(array($unit));

        $select = $test->select();
        var_dump($select);

        $test->saveRows(array(array(
            'id' => null,
            'name' => 'test Name 2',
            'price' => 'test price 2',
            'category' => 'cat 2'
        )));

        $select = $test->select();
        var_dump($select);


        $this->addResponse('id', $id);
        $this->addResponse('name', $name);

        return $this->getReponse();
    }
}