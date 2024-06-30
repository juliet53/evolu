<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240628203205 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE certification (id INT AUTO_INCREMENT NOT NULL, enseignant_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, nom VARCHAR(255) DEFAULT NULL, description VARCHAR(255) DEFAULT NULL, statut TINYINT(1) NOT NULL, INDEX IDX_6C3C6D75E455FCC0 (enseignant_id), INDEX IDX_6C3C6D75F46CD258 (matiere_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE certification_user (certification_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_CCF1DE6CCB47068A (certification_id), INDEX IDX_CCF1DE6CA76ED395 (user_id), PRIMARY KEY(certification_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enseignant (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D75E455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE certification ADD CONSTRAINT FK_6C3C6D75F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE certification_user ADD CONSTRAINT FK_CCF1DE6CCB47068A FOREIGN KEY (certification_id) REFERENCES certification (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE certification_user ADD CONSTRAINT FK_CCF1DE6CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD nom VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D75E455FCC0');
        $this->addSql('ALTER TABLE certification DROP FOREIGN KEY FK_6C3C6D75F46CD258');
        $this->addSql('ALTER TABLE certification_user DROP FOREIGN KEY FK_CCF1DE6CCB47068A');
        $this->addSql('ALTER TABLE certification_user DROP FOREIGN KEY FK_CCF1DE6CA76ED395');
        $this->addSql('DROP TABLE certification');
        $this->addSql('DROP TABLE certification_user');
        $this->addSql('DROP TABLE enseignant');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('ALTER TABLE user DROP nom');
    }
}
