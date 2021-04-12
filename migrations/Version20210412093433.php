<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412093433 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aide CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF81E27F6BF');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF85C8659A');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF85C8659A FOREIGN KEY (examen_id) REFERENCES examen (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aide CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF85C8659A');
        $this->addSql('ALTER TABLE examen_question DROP FOREIGN KEY FK_8A572DF81E27F6BF');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF85C8659A FOREIGN KEY (examen_id) REFERENCES examen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
    }
}
