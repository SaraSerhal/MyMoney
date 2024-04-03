<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240403212545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, category_expenses_id INT DEFAULT NULL, amount_to_spend DOUBLE PRECISION NOT NULL, amount_spent DOUBLE PRECISION NOT NULL, spend_day DATE NOT NULL, INDEX IDX_2496F35B97CEC221 (category_expenses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B97CEC221 FOREIGN KEY (category_expenses_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses_category CHANGE profile_id profile_id INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B97CEC221');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('ALTER TABLE expenses_category CHANGE profile_id profile_id INT DEFAULT NULL');
    }
}
