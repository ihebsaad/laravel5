<?php
namespace App\Repositories;
use App\Sim;

class simRepository extends ResourceRepository
{

public function __construct(Sim $sim)
{
$this->model = $sim;
}

}
?>