<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200624203630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_word ADD bot_question_id INT NOT NULL');
        $this->addSql('ALTER TABLE key_word ADD CONSTRAINT FK_45F6AED8A6205876 FOREIGN KEY (bot_question_id) REFERENCES bot_question (id)');
        $this->addSql('CREATE INDEX IDX_45F6AED8A6205876 ON key_word (bot_question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE key_word DROP FOREIGN KEY FK_45F6AED8A6205876');
        $this->addSql('DROP INDEX IDX_45F6AED8A6205876 ON key_word');
        $this->addSql('ALTER TABLE key_word DROP bot_question_id');
    }
}
