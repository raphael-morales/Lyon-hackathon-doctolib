<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625213806 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom DROP FOREIGN KEY FK_E4C2F0A0115D4552');
        $this->addSql('ALTER TABLE symptom DROP FOREIGN KEY FK_E4C2F0A0804698D6');
        $this->addSql('DROP INDEX IDX_E4C2F0A0115D4552 ON symptom');
        $this->addSql('DROP INDEX UNIQ_E4C2F0A0804698D6 ON symptom');
        $this->addSql('ALTER TABLE symptom DROP specialities_id, CHANGE keyword_id api_id INT NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom ADD specialities_id INT DEFAULT NULL, CHANGE api_id keyword_id INT NOT NULL');
        $this->addSql('ALTER TABLE symptom ADD CONSTRAINT FK_E4C2F0A0115D4552 FOREIGN KEY (keyword_id) REFERENCES key_word (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE symptom ADD CONSTRAINT FK_E4C2F0A0804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_E4C2F0A0115D4552 ON symptom (keyword_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_E4C2F0A0804698D6 ON symptom (specialities_id)');
    }
}
