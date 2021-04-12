<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210411064304 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aide CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY examenquestion_ibfk_1');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY examenquestion_ibfk_2');
        $this->addSql('ALTER TABLE examenquestion CHANGE idQuestion idQuestion INT DEFAULT NULL, CHANGE idExamen idExamen INT DEFAULT NULL');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT FK_613FCF17E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY listereponse_ibfk_1');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY listereponse_ibfk_2');
        $this->addSql('ALTER TABLE listereponse CHANGE idQuestion idQuestion INT DEFAULT NULL, CHANGE idReponse idReponse INT DEFAULT NULL');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7FE5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT FK_97F44C7F4F0FB535 FOREIGN KEY (idReponse) REFERENCES reponse (id)');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY note_ibfk_1');
        $this->addSql('ALTER TABLE note CHANGE idExamen idExamen INT DEFAULT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14325D2776 FOREIGN KEY (idExamen) REFERENCES examen (id)');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY reponse_ibfk_1');
        $this->addSql('ALTER TABLE reponse CHANGE idQuestion idQuestion INT DEFAULT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT FK_5FB6DEC7E5546315 FOREIGN KEY (idQuestion) REFERENCES question (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE aide CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17325D2776');
        $this->addSql('ALTER TABLE examenquestion DROP FOREIGN KEY FK_613FCF17E5546315');
        $this->addSql('ALTER TABLE examenquestion CHANGE idExamen idExamen INT NOT NULL, CHANGE idQuestion idQuestion INT NOT NULL');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT examenquestion_ibfk_1 FOREIGN KEY (idExamen) REFERENCES examen (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE examenquestion ADD CONSTRAINT examenquestion_ibfk_2 FOREIGN KEY (idQuestion) REFERENCES question (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7FE5546315');
        $this->addSql('ALTER TABLE listereponse DROP FOREIGN KEY FK_97F44C7F4F0FB535');
        $this->addSql('ALTER TABLE listereponse CHANGE idQuestion idQuestion INT NOT NULL, CHANGE idReponse idReponse INT NOT NULL');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT listereponse_ibfk_1 FOREIGN KEY (idQuestion) REFERENCES question (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE listereponse ADD CONSTRAINT listereponse_ibfk_2 FOREIGN KEY (idReponse) REFERENCES reponse (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14325D2776');
        $this->addSql('ALTER TABLE note CHANGE idExamen idExamen INT NOT NULL');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT note_ibfk_1 FOREIGN KEY (idExamen) REFERENCES examen (id) ON UPDATE CASCADE ON DELETE CASCADE');
        $this->addSql('ALTER TABLE reponse DROP FOREIGN KEY FK_5FB6DEC7E5546315');
        $this->addSql('ALTER TABLE reponse CHANGE idQuestion idQuestion INT NOT NULL');
        $this->addSql('ALTER TABLE reponse ADD CONSTRAINT reponse_ibfk_1 FOREIGN KEY (idQuestion) REFERENCES question (id) ON UPDATE CASCADE ON DELETE CASCADE');
    }
}
