<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190818172338 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bar_product ADD available TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sport_planning ADD day_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sport_planning ADD CONSTRAINT FK_E23B404C9C24126 FOREIGN KEY (day_id) REFERENCES day (id)');
        $this->addSql('CREATE INDEX IDX_E23B404C9C24126 ON sport_planning (day_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport_planning DROP FOREIGN KEY FK_E23B404C9C24126');
        $this->addSql('DROP TABLE day');
        $this->addSql('ALTER TABLE bar_product DROP available');
        $this->addSql('DROP INDEX IDX_E23B404C9C24126 ON sport_planning');
        $this->addSql('ALTER TABLE sport_planning DROP day_id');
    }
}
