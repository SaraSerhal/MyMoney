<?php
/**
declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20240322113932 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expenses_category ADD profile_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE expenses_category ADD CONSTRAINT FK_B94A9485CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('CREATE INDEX IDX_B94A9485CCFA12B8 ON expenses_category (profile_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE expenses_category DROP FOREIGN KEY FK_B94A9485CCFA12B8');
        $this->addSql('DROP INDEX IDX_B94A9485CCFA12B8 ON expenses_category');
        $this->addSql('ALTER TABLE expenses_category DROP profile_id');
    }
}
**/