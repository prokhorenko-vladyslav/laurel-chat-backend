<?php


namespace App\Abstracts;


use Illuminate\Support\Facades\DB;
use Prophecy\Exception\Doubler\MethodNotFoundException;

abstract class Action
{
    public function run($dto)
    {
        if (!method_exists($this, 'handle')) {
            throw new MethodNotFoundException('Method handle does not exist in action ' . static::class, $this, 'handle');
        }

        DB::beginTransaction();
        $response = $this->handle($dto);
        DB::commit();
        return $response;
    }
}
