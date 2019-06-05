<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 05/06/2019
 * Time: 16:47
 */

namespace App\Service;


class ArrayPaginator
{
    private $showPerPage = 10;

    public function paginateArray(array $array, ?int $page){
        $page = $page < 1 ? 1 : $page;
        $start = ($page - 1) * ($this->showPerPage);
        $offset = $this->showPerPage;
        $paginatedArray = array_slice($array, $start, $offset);

        return $paginatedArray;
    }
}