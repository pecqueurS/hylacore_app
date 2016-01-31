<?php
namespace Example\Controllers;


use Example\Models\Test;
use Hyla\Config\Conf;
use Hyla\Controller\Controller;
use Hyla\Db\Db;
use Hyla\Forms\Forms;
use Hyla\Orm\Unit;
use Hyla\Server\Server;
use HylaComponents\Mails\Mails;

/**
 * Class Home
 * @package Example\Controllers
 */
class Home extends Controller {

    /**
     * @param $id
     * @param null $name
     * @return array|null
     */
    public function db($id, $name = null)
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

    /**
     * @param $id
     * @param null $name
     */
    public function forms($login = null, $pwd = null)
    {
        $response = array();
        $signIn = new Forms('SignIn', Forms::TYPE_GET); /* Creation du formulaire d'après le json */
        var_dump($signIn);
        $htmlRenderOrTrue = $signIn->validate();/* Vérification du formulaire en fonction des contraintes */
        if ($htmlRenderOrTrue === true) {
            var_dump('---------------------------------------------------');
            var_dump($login, $signIn->getValue('login'));
            var_dump($pwd, $signIn->getValue('pwd'));

        } else {
            $response['formSignIn'] = $htmlRenderOrTrue; /* Création du HTML à afficher (non obligatoire) */
        }

        return $response;
    }

    public function mails()
    {
        var_dump(Conf::getAll());


        $destinataire = 'stephane.pecqueur@gmail.com';
        $sujet = 'test';
        $message = array(array('test' => 'Nouveau titre'), 'main');
        $headers = array('ADS', Conf::get('emails.emails.webmaster'));

        Mails::init('html')->sendMail($destinataire,$sujet,$message,$headers);
echo 'message sent';
    }
}