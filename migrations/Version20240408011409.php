<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240408011409 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_name (id INT AUTO_INCREMENT NOT NULL, expenses_category_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D5B8044129BFB72 (expenses_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, category_expenses_id INT DEFAULT NULL, amount_to_spend DOUBLE PRECISION NOT NULL, amount_spent DOUBLE PRECISION NOT NULL, spend_day DATE NOT NULL, INDEX IDX_2496F35B97CEC221 (category_expenses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses_category (id INT AUTO_INCREMENT NOT NULL, profile_id INT NOT NULL, INDEX IDX_B94A9485CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_name ADD CONSTRAINT FK_D5B8044129BFB72 FOREIGN KEY (expenses_category_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B97CEC221 FOREIGN KEY (category_expenses_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses_category ADD CONSTRAINT FK_B94A9485CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('DROP TABLE account');
        $this->addSql('ALTER TABLE user CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE account (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, last_name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age INT NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE category_name DROP FOREIGN KEY FK_D5B8044129BFB72');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B97CEC221');
        $this->addSql('ALTER TABLE expenses_category DROP FOREIGN KEY FK_B94A9485CCFA12B8');
        $this->addSql('DROP TABLE category_name');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE expenses_category');
        $this->addSql('ALTER TABLE user CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }
}
