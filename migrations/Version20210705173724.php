<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705173724 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, whatsapp_perso VARCHAR(255) NOT NULL, tel_sav VARCHAR(255) NOT NULL, user_type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comandeline CHANGE idCde idCde INT DEFAULT NULL, CHANGE idProd idProd INT DEFAULT NULL, CHANGE trackingnumber Tracking Number INT NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE paye paye TINYINT(1) NOT NULL, CHANGE idCli idCli INT DEFAULT NULL');
        $this->addSql('ALTER TABLE detail reclamation CHANGE id_detailRec id_detailRec INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE livraison CHANGE id_commande id_commande INT DEFAULT NULL, CHANGE id_detailliv id_detailliv INT DEFAULT NULL');
        $this->addSql('ALTER TABLE magasinier_entrepot DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE magasinier_entrepot ADD PRIMARY KEY (ENTREPOT_ID, UTILISATEUR_ID)');
        $this->addSql('ALTER TABLE reclamation CHANGE id_rec id_rec INT AUTO_INCREMENT NOT NULL, CHANGE id_detailRec id_detailRec INT DEFAULT NULL');
        $this->addSql('ALTER TABLE stock CHANGE idProd idProd INT DEFAULT NULL');
        $this->addSql('ALTER TABLE vendeur_boutique DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vendeur_boutique ADD PRIMARY KEY (BOUTIQUE_ID, UTILISATEUR_ID)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE comandeline CHANGE idCde idCde INT NOT NULL, CHANGE idProd idProd INT NOT NULL, CHANGE tracking number TrackingNumber INT NOT NULL');
        $this->addSql('ALTER TABLE commande CHANGE paye paye TINYINT(1) DEFAULT \'0\' NOT NULL, CHANGE idCli idCli INT NOT NULL');
        $this->addSql('ALTER TABLE detail reclamation CHANGE id_detailRec id_detailRec INT NOT NULL');
        $this->addSql('ALTER TABLE livraison CHANGE id_commande id_commande INT NOT NULL, CHANGE id_detailliv id_detailliv INT NOT NULL');
        $this->addSql('ALTER TABLE magasinier_entrepot DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE magasinier_entrepot ADD PRIMARY KEY (UTILISATEUR_ID, ENTREPOT_ID)');
        $this->addSql('ALTER TABLE reclamation CHANGE id_rec id_rec INT NOT NULL, CHANGE id_detailRec id_detailRec INT NOT NULL');
        $this->addSql('ALTER TABLE stock CHANGE idProd idProd INT NOT NULL');
        $this->addSql('ALTER TABLE vendeur_boutique DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE vendeur_boutique ADD PRIMARY KEY (UTILISATEUR_ID, BOUTIQUE_ID)');
    }
}
