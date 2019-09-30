<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190930195809 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport ADD is_during_day TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT FK_1A85EFD264D218E FOREIGN KEY (location_id) REFERENCES sport_location (id)');
        $this->addSql('CREATE INDEX IDX_1A85EFD264D218E ON sport (location_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE sport DROP FOREIGN KEY FK_1A85EFD264D218E');
        $this->addSql('DROP INDEX IDX_1A85EFD264D218E ON sport');
        $this->addSql('ALTER TABLE sport DROP is_during_day');
    }
}
