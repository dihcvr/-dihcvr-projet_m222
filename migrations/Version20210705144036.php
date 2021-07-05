<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210705144036 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE detail livraison');
        $this->addSql('DROP TABLE detail reclamation');
        $this->addSql('DROP TABLE livraison');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE stock');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vendeur_boutique');
        $this->addSql('ALTER TABLE utilisateur ADD nom VARCHAR(255) DEFAULT NULL, ADD prenom VARCHAR(255) DEFAULT NULL, ADD adresse VARCHAR(255) DEFAULT NULL, ADD whatsapp_perso VARCHAR(20) DEFAULT NULL, ADD tel_sav VARCHAR(20) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE detail livraison (id INT AUTO_INCREMENT NOT NULL, status VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX id (id, status), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE detail reclamation (id_detailRec INT NOT NULL, status INT NOT NULL, PRIMARY KEY(id_detailRec)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE livraison (id_liv INT AUTO_INCREMENT NOT NULL, id_commande INT NOT NULL, id_detailliv INT NOT NULL, id_vendeur INT NOT NULL, date VARCHAR(30) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, INDEX fk_id_detailliv (id_detailliv), INDEX fk_id_commandee (id_commande), PRIMARY KEY(id_liv)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE produit (idProd INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(70) CHARACTER SET utf8 NOT NULL COLLATE `utf8_general_ci`, prix DOUBLE PRECISION NOT NULL, Quantite INT NOT NULL, PRIMARY KEY(idProd)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE reclamation (id_rec INT NOT NULL, idCde INT NOT NULL, id_detailRec INT NOT NULL, date_rec DATE NOT NULL, motif_rec VARCHAR(30) CHARACTER SET latin1 NOT NULL COLLATE `latin1_swedish_ci`, id_magasinier INT NOT NULL, INDEX detailRec (id_detailRec), PRIMARY KEY(id_rec)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE stock (id INT AUTO_INCREMENT NOT NULL, Quantite DOUBLE PRECISION NOT NULL, idProd INT NOT NULL, INDEX prodStock (idProd), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, roles JSON NOT NULL, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, whatsapp_perso VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, tel_sav VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, user_type VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE vendeur_boutique (BOUTIQUE_ID INT NOT NULL, UTILISATEUR_ID INT NOT NULL, INDEX BOUTIQUE_ID (BOUTIQUE_ID), PRIMARY KEY(UTILISATEUR_ID, BOUTIQUE_ID)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = MyISAM COMMENT = \'\' ');
        $this->addSql('ALTER TABLE utilisateur DROP nom, DROP prenom, DROP adresse, DROP whatsapp_perso, DROP tel_sav');
    }
}
