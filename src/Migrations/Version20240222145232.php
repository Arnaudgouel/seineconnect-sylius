<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240222145232 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Add custom menu to channel and fix messenger_messages table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_channel ADD isRelatedToCustomMenu TINYINT(1) DEFAULT NULL, ADD headerMenu_id INT DEFAULT NULL, ADD footerMenu_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119EC4A4E4AD FOREIGN KEY (headerMenu_id) REFERENCES monsieurbiz_menu (id)');
        $this->addSql('ALTER TABLE sylius_channel ADD CONSTRAINT FK_16C8119EA1ADAA92 FOREIGN KEY (footerMenu_id) REFERENCES monsieurbiz_menu (id)');
        $this->addSql('CREATE INDEX IDX_16C8119EC4A4E4AD ON sylius_channel (headerMenu_id)');
        $this->addSql('CREATE INDEX IDX_16C8119EA1ADAA92 ON sylius_channel (footerMenu_id)');
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE available_at available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', CHANGE delivered_at delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messenger_messages CHANGE created_at created_at DATETIME NOT NULL, CHANGE available_at available_at DATETIME NOT NULL, CHANGE delivered_at delivered_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119EC4A4E4AD');
        $this->addSql('ALTER TABLE sylius_channel DROP FOREIGN KEY FK_16C8119EA1ADAA92');
        $this->addSql('DROP INDEX IDX_16C8119EC4A4E4AD ON sylius_channel');
        $this->addSql('DROP INDEX IDX_16C8119EA1ADAA92 ON sylius_channel');
        $this->addSql('ALTER TABLE sylius_channel DROP isRelatedToCustomMenu, DROP headerMenu_id, DROP footerMenu_id');
    }
}
