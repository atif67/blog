<?php


namespace App\Interfaces;


interface HomeInterface
{
    /*
     *
     * @method  (GET)
     */
    public function get();

    /*
     *
     * @method  (GET)
     */
    public function postDetail($slug);
}
