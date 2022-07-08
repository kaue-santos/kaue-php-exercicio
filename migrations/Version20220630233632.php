<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220630233632 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE telefone_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE telefone (id INT NOT NULL, user_user_id INT NOT NULL, data_criacao DATE NOT NULL, data_atualizacao DATE NOT NULL, ddd VARCHAR(3) NOT NULL, numero VARCHAR(9) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_2132E361FF63CD9F ON telefone (user_user_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, data_criacao DATE NOT NULL, data_atualizacao DATE NOT NULL, nome VARCHAR(30) NOT NULL, data_nascimento DATE DEFAULT NULL, email VARCHAR(20) NOT NULL, lista_telefones TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN "user".lista_telefones IS \'(DC2Type:array)\'');
        $this->addSql('ALTER TABLE telefone ADD CONSTRAINT FK_2132E361FF63CD9F FOREIGN KEY (user_user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE telefone DROP CONSTRAINT FK_2132E361FF63CD9F');
        $this->addSql('DROP SEQUENCE telefone_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE telefone');
        $this->addSql('DROP TABLE "user"');
    }
}
