<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240610133130 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE client_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE societe_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, mode_paiement VARCHAR(255) NOT NULL, nb_societe INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE societe (id INT NOT NULL, nom VARCHAR(255) NOT NULL, denomination_sociale VARCHAR(255) NOT NULL, siret_number BIGINT NOT NULL, code_ape_naf INT NOT NULL, domaine_activite VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) NOT NULL, code_postale INT NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(20) NOT NULL, email VARCHAR(255) NOT NULL, form_juridique VARCHAR(255) DEFAULT NULL, capital DOUBLE PRECISION NOT NULL, num_rcs VARCHAR(20) NOT NULL, lieu_immat VARCHAR(255) DEFAULT NULL, categorie VARCHAR(255) DEFAULT NULL, num_tva VARCHAR(20) NOT NULL, devise VARCHAR(3) NOT NULL, pack VARCHAR(255) NOT NULL, nb_user INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE societe_client (societe_id INT NOT NULL, client_id INT NOT NULL, PRIMARY KEY(societe_id, client_id))');
        $this->addSql('CREATE INDEX IDX_BBF239EDFCF77503 ON societe_client (societe_id)');
        $this->addSql('CREATE INDEX IDX_BBF239ED19EB6921 ON societe_client (client_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE societe_client ADD CONSTRAINT FK_BBF239EDFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE societe_client ADD CONSTRAINT FK_BBF239ED19EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE client_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE societe_id_seq CASCADE');
        $this->addSql('ALTER TABLE societe_client DROP CONSTRAINT FK_BBF239EDFCF77503');
        $this->addSql('ALTER TABLE societe_client DROP CONSTRAINT FK_BBF239ED19EB6921');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE societe_client');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
