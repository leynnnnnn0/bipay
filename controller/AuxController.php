<?php

namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Session;
use app\model\AuxModel;
use app\model\TagModel;

class AuxController extends Controller
{
    public function aux(): void
    {
        $auxModel = new AuxModel();
        $auxModel->loadData($_POST);
        $auxModel->updateById();
        $tagModel = new TagModel();
        $tagModel->loadData($_POST);
        $tagModel->insertAndSave();
        Session::set('aux', $auxModel->aux);
    }

    public function punchIn(): string|bool
    {
        $tagModel = new TagModel();
        $tagModel->loadData($_POST);
        $tagModel->insertAndSave();
        Session::set('PUNCH IN', date('h:i:s A'));
        return json_encode(['time' => date('h:i:s A')]);
    }

    public function punchOut(): string|bool
    {
        $auxModel = new AuxModel();
        $auxModel->loadData($_POST);
        $auxModel->removeById();

        $tagModel = new TagModel();
        $tagModel->loadData($_POST);
        $tagModel->insertAndSave();

        Session::set('PUNCH OUT', date('h:i:s A'));
        return json_encode(['time' => date('h:i:s A')]);
    }

}