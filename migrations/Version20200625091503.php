<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625091503 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom ADD specialities_id INT NOT NULL, ADD keyword_id INT NOT NULL');
        $this->addSql('ALTER TABLE symptom ADD CONSTRAINT FK_E4C2F0A0804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id)');
        $this->addSql('ALTER TABLE symptom ADD CONSTRAINT FK_E4C2F0A0115D4552 FOREIGN KEY (keyword_id) REFERENCES key_word (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E4C2F0A0804698D6 ON symptom (specialities_id)');
        $this->addSql('CREATE INDEX IDX_E4C2F0A0115D4552 ON symptom (keyword_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom DROP FOREIGN KEY FK_E4C2F0A0804698D6');
        $this->addSql('ALTER TABLE symptom DROP FOREIGN KEY FK_E4C2F0A0115D4552');
        $this->addSql('DROP INDEX UNIQ_E4C2F0A0804698D6 ON symptom');
        $this->addSql('DROP INDEX IDX_E4C2F0A0115D4552 ON symptom');
        $this->addSql('ALTER TABLE symptom DROP specialities_id, DROP keyword_id');
    }
}
