<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.01.2019
 * Time: 16:31
 */

namespace App;


class TestService
{
    public function run()
    {
        $pid = pcntl_fork();
        if ($pid == -1) {
            die("could not fork");
        } else if ($pid) {
            exit ('could1');
        } else {
            exit ('could2');
        }

    }
}