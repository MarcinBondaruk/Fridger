<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Component\CookingBook\Domain\Aggregate\Recipe;
use App\Core\Component\CookingBook\Domain\Entity\RecipeIngredient\RecipeIngredient;
use App\Core\Component\CookingBook\Domain\Repository\IRecipeRepository;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineRecipeRepository implements IRecipeRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function add(Recipe $recipe): void
    {
        $this->initializeRecipeIngredients($recipe);
        $this->entityManager->persist($recipe);
    }

    /**
     * @param Recipe $recipe
     * @return void
     */
    private function initializeRecipeIngredients(Recipe $recipe): void
    {
        foreach ($recipe->ingredients() as $ingredient) {
            $recipeIngredient = new RecipeIngredient(
                $ingredient->id(),
                $recipe->id()
            );

            $recipe->addRecipeIngredient($recipeIngredient);
            $ingredient->addRecipeIngredient($recipeIngredient);

            $this->entityManager->persist($ingredient);
            $this->entityManager->persist($recipeIngredient);
        }
    }
}
