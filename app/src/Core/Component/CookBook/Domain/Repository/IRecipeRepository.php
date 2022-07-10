<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\Repository;

use App\Core\Component\CookBook\Domain\Aggregate\Recipe;

interface IRecipeRepository
{
    public function add(Recipe $recipe): void;
}
