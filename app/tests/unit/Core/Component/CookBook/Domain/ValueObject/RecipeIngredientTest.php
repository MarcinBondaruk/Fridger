<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\Component\CookBook\Domain\ValueObject;

use App\Core\SharedKernel\Domain\Enum\Unit;
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
        $productId = (string) Uuid::uuid4();
        $unit = Unit::GRAM;
        $amount = 100;

        $recipeIngredient = RecipeIngredient::create($productId, $unit, $amount);

        $this->assertEquals($productId, $recipeIngredient->ingredientId);
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
        $productId = (string) Uuid::uuid4();
        $unit = Unit::GRAM;

        $this->expectException(AssertionFailedException::class);
        $recipeIngredient = RecipeIngredient::create($productId, $unit, $input);
    }

    public function invalidAmountProvider(): array
    {
        return [
            'negative amount' => [-1],
            'zero' => [0]
        ];
    }
}
