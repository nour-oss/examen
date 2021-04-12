<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210412093317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE examen_question (examen_id INT NOT NULL, question_id INT NOT NULL, INDEX IDX_8A572DF85C8659A (examen_id), INDEX IDX_8A572DF81E27F6BF (question_id), PRIMARY KEY(examen_id, question_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF85C8659A FOREIGN KEY (examen_id) REFERENCES examen (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examen_question ADD CONSTRAINT FK_8A572DF81E27F6BF FOREIGN KEY (question_id) REFERENCES question (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examen DROP FOREIGN KEY FK_514C8FEC1E27F6BF');
        $this->addSql('DROP INDEX IDX_514C8FEC1E27F6BF ON examen');
        $this->addSql('ALTER TABLE examen DROP question_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE examen_question');
        $this->addSql('ALTER TABLE examen ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE examen ADD CONSTRAINT FK_514C8FEC1E27F6BF FOREIGN KEY (question_id) REFERENCES question (id)');
        $this->addSql('CREATE INDEX IDX_514C8FEC1E27F6BF ON examen (question_id)');
    }
}
