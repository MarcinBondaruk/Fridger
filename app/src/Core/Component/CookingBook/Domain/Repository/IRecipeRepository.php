<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Repository;

use App\Core\Component\CookingBook\Domain\Entity\Recipe;

interface IRecipeRepository
{
    public function add(Recipe $recipe): void;
}
