<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200123175042 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE journal (id INT AUTO_INCREMENT NOT NULL, edition INT NOT NULL, image VARCHAR(255) NOT NULL, file VARCHAR(255) NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX UNIQ_C1A7E74DA891181F (edition), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sponsor ADD section_id INT NOT NULL');
        $this->addSql('UPDATE sponsor set section_id = (select id from section sect where name = office)');
        $this->addSql('ALTER TABLE sponsor DROP OFFICE');
        $this->addSql('ALTER TABLE sponsor ADD CONSTRAINT FK_818CC9D4D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('CREATE INDEX IDX_818CC9D4D823E37A ON sponsor (section_id)');
        $this->addSql('ALTER TABLE sport ADD color VARCHAR(20) NOT NULL');
        $this->addSql('INSERT INTO SECTION (name) values ("PE")');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE journal');
        $this->addSql('ALTER TABLE sponsor DROP FOREIGN KEY FK_818CC9D4D823E37A');
        $this->addSql('DROP INDEX IDX_818CC9D4D823E37A ON sponsor');
        $this->addSql('ALTER TABLE sponsor ADD office VARCHAR(3) NOT NULL COLLATE utf8mb4_unicode_ci, DROP section_id');
        $this->addSql('ALTER TABLE sport DROP color');
    }
}
