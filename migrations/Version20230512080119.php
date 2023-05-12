<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230512080119 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE gift_tag (gift_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_1C7BA4D097A95A83 (gift_id), INDEX IDX_1C7BA4D0BAD26311 (tag_id), PRIMARY KEY(gift_id, tag_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag (id INT AUTO_INCREMENT NOT NULL, icon VARCHAR(255) NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_tag_category (tag_id INT NOT NULL, tag_category_id INT NOT NULL, INDEX IDX_906B4918BAD26311 (tag_id), INDEX IDX_906B4918E8FE702 (tag_category_id), PRIMARY KEY(tag_id, tag_category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tag_category (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gift_tag ADD CONSTRAINT FK_1C7BA4D097A95A83 FOREIGN KEY (gift_id) REFERENCES gift (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gift_tag ADD CONSTRAINT FK_1C7BA4D0BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_tag_category ADD CONSTRAINT FK_906B4918BAD26311 FOREIGN KEY (tag_id) REFERENCES tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE tag_tag_category ADD CONSTRAINT FK_906B4918E8FE702 FOREIGN KEY (tag_category_id) REFERENCES tag_category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE gift ADD title VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gift_tag DROP FOREIGN KEY FK_1C7BA4D097A95A83');
        $this->addSql('ALTER TABLE gift_tag DROP FOREIGN KEY FK_1C7BA4D0BAD26311');
        $this->addSql('ALTER TABLE tag_tag_category DROP FOREIGN KEY FK_906B4918BAD26311');
        $this->addSql('ALTER TABLE tag_tag_category DROP FOREIGN KEY FK_906B4918E8FE702');
        $this->addSql('DROP TABLE gift_tag');
        $this->addSql('DROP TABLE tag');
        $this->addSql('DROP TABLE tag_tag_category');
        $this->addSql('DROP TABLE tag_category');
        $this->addSql('ALTER TABLE gift DROP title');
    }
}
