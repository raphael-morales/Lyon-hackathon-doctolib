<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625091820 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE specialities_key_word');
        $this->addSql('ALTER TABLE key_word DROP FOREIGN KEY FK_45F6AED8EA6F3F9B');
        $this->addSql('DROP INDEX IDX_45F6AED8EA6F3F9B ON key_word');
        $this->addSql('ALTER TABLE key_word DROP specialitie_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE specialities_key_word (specialities_id INT NOT NULL, key_word_id INT NOT NULL, INDEX IDX_5B108CF6804698D6 (specialities_id), INDEX IDX_5B108CF6818167B3 (key_word_id), PRIMARY KEY(specialities_id, key_word_id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE specialities_key_word ADD CONSTRAINT FK_5B108CF6804698D6 FOREIGN KEY (specialities_id) REFERENCES specialities (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE specialities_key_word ADD CONSTRAINT FK_5B108CF6818167B3 FOREIGN KEY (key_word_id) REFERENCES key_word (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE key_word ADD specialitie_id INT NOT NULL');
        $this->addSql('ALTER TABLE key_word ADD CONSTRAINT FK_45F6AED8EA6F3F9B FOREIGN KEY (specialitie_id) REFERENCES specialities (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_45F6AED8EA6F3F9B ON key_word (specialitie_id)');
    }
}
