<?php

namespace App\Services\Classification\Contracts;

use Illuminate\Support\Collection;

/**
 * Interface EvaluatorInterface
 * @package App\Services\Classification\Contracts
 */
interface EvaluatorInterface
{
    /**
     * @return Collection
     */
    public function evaluate(): Collection;
}