<?php

namespace App\Tests\unit\Core\Component\CookBook\Domain\ValueObject;

use App\Core\Component\CookBook\Domain\ValueObject\RecipeDescription;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class RecipeDescriptionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeDescription(): void
    {
        $text = 'sbh0XriX7avoWCtnwhY0VdQFEf33EEjQWPYTW2CuNS6fT6EyyhHLuXWB88T48DlVWljUNn0SL6H2XrldwwXSmiV23YBMz9bzTqVC';
        $description = RecipeDescription::create($text);
        $this->assertEquals($text, $description->value);
    }

    /**
     * @param $input
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testCreateRecipeDescriptionShouldThrowException($input): void
    {
        $this->expectException(AssertionFailedException::class);
        $description = RecipeDescription::create($input);
    }

    public function invalidInputProvider(): array
    {
        return [
            'empty string' => [''],
            'string made of spaces' => ['    '],
            'shorter than 100 characters' => ['sbh0XriX7avoWCtnwhY0VdQFEf33EEjQWPYTW2CuNS6fT6EyyhHLuXWB88T48DlVWljUNn0SL6H2XrldwwXSmiV23YBMz9bzTqV']
        ];
    }
}
