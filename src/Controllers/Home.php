<?php
namespace Example\Controllers;


use Example\Models\Test;
use Hyla\Controller\Controller;
use Hyla\Db\Db;

class Home extends Controller {
    public function show($id, $name = null)
    {
        $test = new Test();
        $select = $test->select();
        var_dump($select);

        //$test->


        $this->addResponse('id', $id);
        $this->addResponse('name', $name);

        return $this->getReponse();
    }
}