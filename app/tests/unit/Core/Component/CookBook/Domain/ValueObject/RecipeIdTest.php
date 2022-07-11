<?php

namespace App\Tests\unit\Core\Component\CookBook\Domain\ValueObject;

use App\Core\Component\CookBook\Domain\ValueObject\RecipeId;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class RecipeIdTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeId(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();

        // WHEN
        $recipeId = RecipeId::create($uuid);

        // THEN
        $this->assertEquals($uuid, $recipeId->value);
    }

    /**
     * @param mixed $input
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testCreateRecipeIdShouldThrowAnException(mixed $input): void
    {
        $this->expectException(AssertionFailedException::class);
        $recipeId = RecipeId::create($input);
    }

    public function testIsEqualShouldReturnTrue(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();
        $recipeId = RecipeId::create($uuid);

        // THEN
        $this->assertTrue($recipeId->isEqual(RecipeId::create($uuid)));
    }

    public function testIsEqualShouldReturnFalse(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();
        $anotherId = (string) Uuid::uuid4();

        $recipeId = RecipeId::create($uuid);

        // THEN
        $this->assertFalse($recipeId->isEqual(RecipeId::create($anotherId)));
    }

    public function invalidInputProvider(): array
    {
        return [
            'empty string' => [''],
            'empty string space' => [' '],
            '36 chars string' => ['45c401aa52367z4fdaXa017A1d9e1021fa37'],
            'integer' => [1]
        ];
    }
}
