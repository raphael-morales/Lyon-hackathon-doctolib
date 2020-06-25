<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200625214050 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom ADD body_sublocation_id INT NOT NULL');
        $this->addSql('ALTER TABLE symptom ADD CONSTRAINT FK_E4C2F0A09413E8CF FOREIGN KEY (body_sublocation_id) REFERENCES body_sublocation (id)');
        $this->addSql('CREATE INDEX IDX_E4C2F0A09413E8CF ON symptom (body_sublocation_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE symptom DROP FOREIGN KEY FK_E4C2F0A09413E8CF');
        $this->addSql('DROP INDEX IDX_E4C2F0A09413E8CF ON symptom');
        $this->addSql('ALTER TABLE symptom DROP body_sublocation_id');
    }
}
