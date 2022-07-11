<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\Component\CookBook\Domain\ValueObject;

use App\Core\Component\CookBook\Domain\Enum\RecipeIngredientUnit;
use App\Core\Component\CookBook\Domain\ValueObject\RecipeIngredient;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

final class RecipeIngredientTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeIngredient(): void
    {
        $ingredientId = (string) Uuid::uuid4();
        $unit = RecipeIngredientUnit::GRAM;
        $amount = 100;

        $recipeIngredient = RecipeIngredient::create($ingredientId, $unit, $amount);

        $this->assertEquals($ingredientId, $recipeIngredient->ingredientId);
        $this->assertEquals($unit, $recipeIngredient->unit);
        $this->assertEquals($amount, $recipeIngredient->amount);
    }

    /**
     * @param $input
     * @return void
     * @throws AssertionFailedException
     * @dataProvider invalidAmountProvider
     */
    public function testCreateShouldThrowExceptionWhenAmountIsInvalid($input): void
    {
        $ingredientId = (string) Uuid::uuid4();
        $unit = RecipeIngredientUnit::GRAM;

        $this->expectException(AssertionFailedException::class);
        $recipeIngredient = RecipeIngredient::create($ingredientId, $unit, $input);
    }

    public function invalidAmountProvider(): array
    {
        return [
            'negative amount' => [-1],
            'zero' => [0]
        ];
    }
}
