<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221208102659 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, brand_name VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallery (id INT AUTO_INCREMENT NOT NULL, activity_name_id INT NOT NULL, category_name_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, main_picture VARCHAR(255) NOT NULL, picture1 VARCHAR(255) DEFAULT NULL, picture2 VARCHAR(255) DEFAULT NULL, picture3 VARCHAR(255) DEFAULT NULL, picture4 VARCHAR(255) DEFAULT NULL, picture5 VARCHAR(255) DEFAULT NULL, video VARCHAR(255) DEFAULT NULL, realisation_date DATE DEFAULT NULL, INDEX IDX_472B783A7145EA36 (activity_name_id), INDEX IDX_472B783AB6CFDCA8 (category_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE home (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, zip_code INT NOT NULL, home_img VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, status TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, category_name_id INT DEFAULT NULL, activity_name_id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description LONGTEXT DEFAULT NULL, picture VARCHAR(255) DEFAULT NULL, INDEX IDX_E19D9AD2B6CFDCA8 (category_name_id), INDEX IDX_E19D9AD27145EA36 (activity_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783A7145EA36 FOREIGN KEY (activity_name_id) REFERENCES activity (id)');
        $this->addSql('ALTER TABLE gallery ADD CONSTRAINT FK_472B783AB6CFDCA8 FOREIGN KEY (category_name_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD2B6CFDCA8 FOREIGN KEY (category_name_id) REFERENCES category (id)');
        $this->addSql('ALTER TABLE service ADD CONSTRAINT FK_E19D9AD27145EA36 FOREIGN KEY (activity_name_id) REFERENCES activity (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783A7145EA36');
        $this->addSql('ALTER TABLE gallery DROP FOREIGN KEY FK_472B783AB6CFDCA8');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD2B6CFDCA8');
        $this->addSql('ALTER TABLE service DROP FOREIGN KEY FK_E19D9AD27145EA36');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE gallery');
        $this->addSql('DROP TABLE home');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
