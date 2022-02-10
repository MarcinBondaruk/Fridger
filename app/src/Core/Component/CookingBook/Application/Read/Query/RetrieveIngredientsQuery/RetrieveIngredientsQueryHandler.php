<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Read\Query\RetrieveIngredientsQuery;

use App\Core\Component\CookingBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Component\CookingBook\Domain\Repository\IIngredientRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class RetrieveIngredientsQueryHandler
{
    public function __construct(
        private IIngredientRepository $ingredientRepository
    ) {}

    public function __invoke(RetrieveIngredientsQuery $query): RetrieveIngredientsQueryResult
    {
        return $this->mapToResult($this->ingredientRepository->findAll());
    }

    /**
     * @param Ingredient[] $ingredients
     * @return RetrieveIngredientsQueryResult
     */
    private function mapToResult(array $ingredients): RetrieveIngredientsQueryResult
    {
        $data = array_map(function($ingredient) {
            return [
                'id' => $ingredient->id(),
                'value' => $ingredient->value()
            ];
        }, $ingredients);

        return RetrieveIngredientsQueryResult::fromArray($data);
    }
}
