<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240422163816 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category_name (id INT AUTO_INCREMENT NOT NULL, expenses_category_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_D5B8044129BFB72 (expenses_category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses (id INT AUTO_INCREMENT NOT NULL, category_expenses_id INT DEFAULT NULL, amount_to_spend DOUBLE PRECISION NOT NULL, amount_spent DOUBLE PRECISION NOT NULL, spend_day DATE NOT NULL, daily_category_budget DOUBLE PRECISION NOT NULL, daily_budget DOUBLE PRECISION NOT NULL, INDEX IDX_2496F35B97CEC221 (category_expenses_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE expenses_category (id INT AUTO_INCREMENT NOT NULL, profile_id INT NOT NULL, INDEX IDX_B94A9485CCFA12B8 (profile_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE profile (id INT AUTO_INCREMENT NOT NULL, profile_type VARCHAR(255) NOT NULL, profile_budget DOUBLE PRECISION NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, last_name VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, deleted_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_profile (user_id INT NOT NULL, profile_id INT NOT NULL, INDEX IDX_D95AB405A76ED395 (user_id), INDEX IDX_D95AB405CCFA12B8 (profile_id), PRIMARY KEY(user_id, profile_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE category_name ADD CONSTRAINT FK_D5B8044129BFB72 FOREIGN KEY (expenses_category_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses ADD CONSTRAINT FK_2496F35B97CEC221 FOREIGN KEY (category_expenses_id) REFERENCES expenses_category (id)');
        $this->addSql('ALTER TABLE expenses_category ADD CONSTRAINT FK_B94A9485CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id)');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB405CCFA12B8 FOREIGN KEY (profile_id) REFERENCES profile (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE category_name DROP FOREIGN KEY FK_D5B8044129BFB72');
        $this->addSql('ALTER TABLE expenses DROP FOREIGN KEY FK_2496F35B97CEC221');
        $this->addSql('ALTER TABLE expenses_category DROP FOREIGN KEY FK_B94A9485CCFA12B8');
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405A76ED395');
        $this->addSql('ALTER TABLE user_profile DROP FOREIGN KEY FK_D95AB405CCFA12B8');
        $this->addSql('DROP TABLE category_name');
        $this->addSql('DROP TABLE expenses');
        $this->addSql('DROP TABLE expenses_category');
        $this->addSql('DROP TABLE profile');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
