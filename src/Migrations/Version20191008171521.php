<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191008171521 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE sport_leader (sport_id INT NOT NULL, leader_id INT NOT NULL, INDEX IDX_913C3E76AC78BCF8 (sport_id), INDEX IDX_913C3E7673154ED4 (leader_id), PRIMARY KEY(sport_id, leader_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club_leader (club_id INT NOT NULL, leader_id INT NOT NULL, INDEX IDX_D02C565D61190A32 (club_id), INDEX IDX_D02C565D73154ED4 (leader_id), PRIMARY KEY(club_id, leader_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sport_leader ADD CONSTRAINT FK_913C3E76AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sport_leader ADD CONSTRAINT FK_913C3E7673154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_leader ADD CONSTRAINT FK_D02C565D61190A32 FOREIGN KEY (club_id) REFERENCES club (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE club_leader ADD CONSTRAINT FK_D02C565D73154ED4 FOREIGN KEY (leader_id) REFERENCES leader (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE leader DROP FOREIGN KEY FK_F5E3EAD7AC78BCF8');
        $this->addSql('DROP INDEX IDX_F5E3EAD7AC78BCF8 ON leader');
        $this->addSql('INSERT INTO sport_leader (sport_id, leader_id) select sport_id, id from leader');
        $this->addSql('ALTER TABLE leader DROP sport_id');
        $this->addSql('ALTER TABLE sport DROP FOREIGN KEY FK_1A85EFD264D218E');
        $this->addSql('DROP INDEX IDX_1A85EFD264D218E ON sport');
        $this->addSql('ALTER TABLE sport DROP location_id');
        $this->addSql('ALTER TABLE sport_planning ADD location_id INT NOT NULL');
        $this->addSql('UPDATE sport_planning set location_id = 1 where 1=1');
        $this->addSql('ALTER TABLE sport_planning ADD CONSTRAINT FK_E23B404C64D218E FOREIGN KEY (location_id) REFERENCES sport_location (id)');
        $this->addSql('CREATE INDEX IDX_E23B404C64D218E ON sport_planning (location_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE club_leader DROP FOREIGN KEY FK_D02C565D61190A32');
        $this->addSql('DROP TABLE sport_leader');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE club_leader');
        $this->addSql('ALTER TABLE leader ADD sport_id INT NOT NULL');
        $this->addSql('ALTER TABLE leader ADD CONSTRAINT FK_F5E3EAD7AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
        $this->addSql('CREATE INDEX IDX_F5E3EAD7AC78BCF8 ON leader (sport_id)');
        $this->addSql('ALTER TABLE sport ADD location_id INT NOT NULL');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT FK_1A85EFD264D218E FOREIGN KEY (location_id) REFERENCES sport_location (id)');
        $this->addSql('CREATE INDEX IDX_1A85EFD264D218E ON sport (location_id)');
        $this->addSql('ALTER TABLE sport_planning DROP FOREIGN KEY FK_E23B404C64D218E');
        $this->addSql('DROP INDEX IDX_E23B404C64D218E ON sport_planning');
        $this->addSql('ALTER TABLE sport_planning DROP location_id');
    }
}
