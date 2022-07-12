<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\Component\CookBook\Domain\ValueObject;

use App\Core\Component\CookBook\Domain\ValueObject\RecipeName;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class RecipeNameTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeName(): void
    {
        // GIVEN
        $name = 'Jednogarnkowa potrawka z kurczaka';

        // WHEN
        $recipeName = RecipeName::create($name);

        // THEN
        $this->assertEquals($name, $recipeName->value);
    }

    /**
     * @param string $input
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testCreateRecipeNameShouldThrowException(string $input): void
    {
        $this->expectException(AssertionFailedException::class);
        $recipeName = RecipeName::create($input);
    }

    public function invalidInputProvider(): array
    {
        return [
            'empty string' => [''],
            'recipe name too short' => ['apple'],
            'recipe name too long' => ['fDhLP8pOsFgpNe4TIyZyG77wSlzY0kCSQ9G0qFiL6M0vpmS2ftKyRduz9aKQjKJRuauYufjZ0sMaIKOf4H0VczKU7EsgXGjoYJpB0k9NlQW7dAz0TjQ1Q7Rgx'],
        ];
    }
}
