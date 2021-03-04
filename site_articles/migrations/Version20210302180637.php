<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302180637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE book (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, release_date DATETIME NOT NULL, cover LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, image VARCHAR(255) DEFAULT NULL, citizenship VARCHAR(255) DEFAULT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critic (id INT AUTO_INCREMENT NOT NULL, pseudo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE critique (id INT AUTO_INCREMENT NOT NULL, book_id INT NOT NULL, film_id INT NOT NULL, critic_id INT NOT NULL, critique LONGTEXT NOT NULL, INDEX IDX_1F95032416A2B381 (book_id), INDEX IDX_1F950324567F5183 (film_id), INDEX IDX_1F950324C7BE2830 (critic_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE film (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, author VARCHAR(255) NOT NULL, release_date DATETIME NOT NULL, synopsis LONGTEXT NOT NULL, price DOUBLE PRECISION NOT NULL, type VARCHAR(255) NOT NULL, image VARCHAR(255) DEFAULT NULL, citizenship VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, book_id INT NOT NULL, film_id INT NOT NULL, critic_id INT NOT NULL, critique_id INT NOT NULL, value INT NOT NULL, INDEX IDX_CFBDFA1416A2B381 (book_id), INDEX IDX_CFBDFA14567F5183 (film_id), INDEX IDX_CFBDFA14C7BE2830 (critic_id), INDEX IDX_CFBDFA14F24D1F1B (critique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE critique ADD CONSTRAINT FK_1F95032416A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE critique ADD CONSTRAINT FK_1F950324567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE critique ADD CONSTRAINT FK_1F950324C7BE2830 FOREIGN KEY (critic_id) REFERENCES critic (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1416A2B381 FOREIGN KEY (book_id) REFERENCES book (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14C7BE2830 FOREIGN KEY (critic_id) REFERENCES critic (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F24D1F1B FOREIGN KEY (critique_id) REFERENCES critique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE critique DROP FOREIGN KEY FK_1F95032416A2B381');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1416A2B381');
        $this->addSql('ALTER TABLE critique DROP FOREIGN KEY FK_1F950324C7BE2830');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14C7BE2830');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F24D1F1B');
        $this->addSql('ALTER TABLE critique DROP FOREIGN KEY FK_1F950324567F5183');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14567F5183');
        $this->addSql('DROP TABLE book');
        $this->addSql('DROP TABLE critic');
        $this->addSql('DROP TABLE critique');
        $this->addSql('DROP TABLE film');
        $this->addSql('DROP TABLE note');
    }
}
