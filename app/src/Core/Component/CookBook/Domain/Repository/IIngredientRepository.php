<?php
declare(strict_types=1);

namespace App\Core\Component\CookBook\Domain\Repository;

use App\Core\Component\CookBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;

interface IIngredientRepository
{
    public function add(Ingredient $ingredient): void;

    /**
     * @param string $value
     * @return Ingredient
     * @throws EmptyQueryResultException
     */
    public function findOneByValue(string $value): Ingredient;

    /**
     * @return Ingredient[]
     */
    public function findAll(): array;

    /**
     * @param int[] $ingredientIds
     * @return Ingredient[]
     */
    public function findManyByIds(array $ingredientIds): array;
}
