<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624204058 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_word ADD specialitie_id INT NOT NULL');
        $this->addSql('ALTER TABLE key_word ADD CONSTRAINT FK_45F6AED8EA6F3F9B FOREIGN KEY (specialitie_id) REFERENCES specialities (id)');
        $this->addSql('CREATE INDEX IDX_45F6AED8EA6F3F9B ON key_word (specialitie_id)');
        $this->addSql('ALTER TABLE specialist ADD specialitie_id INT NOT NULL');
        $this->addSql('ALTER TABLE specialist ADD CONSTRAINT FK_C2274AF4EA6F3F9B FOREIGN KEY (specialitie_id) REFERENCES specialities (id)');
        $this->addSql('CREATE INDEX IDX_C2274AF4EA6F3F9B ON specialist (specialitie_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_word DROP FOREIGN KEY FK_45F6AED8EA6F3F9B');
        $this->addSql('DROP INDEX IDX_45F6AED8EA6F3F9B ON key_word');
        $this->addSql('ALTER TABLE key_word DROP specialitie_id');
        $this->addSql('ALTER TABLE specialist DROP FOREIGN KEY FK_C2274AF4EA6F3F9B');
        $this->addSql('DROP INDEX IDX_C2274AF4EA6F3F9B ON specialist');
        $this->addSql('ALTER TABLE specialist DROP specialitie_id');
    }
}
