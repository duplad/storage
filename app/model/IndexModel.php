<?php
namespace app\model;

use app\core as core;

class IndexModel extends core\Model
{
    public function getFakeData()
    {
        include_once __ROOT__.DIRECTORY_SEPARATOR."app/library/FakeData.php";
        return $_SESSION['fakeData'];
    }
}
