<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209154902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Init database';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE IF NOT EXISTS users (id SERIAL PRIMARY KEY, uuid CHAR(36) NOT NULL UNIQUE, username VARCHAR(30) NOT NULL UNIQUE, password CHAR(60) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, roles JSON NOT NULL)");
        $this->addSql("CREATE TABLE IF NOT EXISTS tag (id SERIAL PRIMARY KEY, value VARCHAR(30) NOT NULL UNIQUE)");
        $this->addSql("CREATE TABLE IF NOT EXISTS ingredient (id SERIAL PRIMARY KEY, value VARCHAR(30) NOT NULL UNIQUE)");
        $this->addSql("CREATE TABLE IF NOT EXISTS recipe (id SERIAL PRIMARY KEY, uuid CHAR(36) NOT NULL UNIQUE, title VARCHAR(255) NOT NULL UNIQUE, description TEXT NOT NULL)");
        $this->addSql("CREATE TABLE IF NOT EXISTS ingredients_list (ingredient_id INT NOT NULL, recipe_id CHAR(36) NOT NULL)");
        $this->addSql("CREATE TABLE IF NOT EXISTS tags_list (tag_id INT NOT NULL, recipe_id CHAR(36) NOT NULL)");

        // initialize ingredients
        // initialize tags
    }

    public function down(Schema $schema): void
    {
    }
}
