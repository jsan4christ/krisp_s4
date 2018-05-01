<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425192708 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('CREATE TABLE s_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_17F61C675E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE symfony_demo_tag');
        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD3BAD26311 FOREIGN KEY (tag_id) REFERENCES s_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE b_sw_expert DROP INDEX IDX_6FDF8FF6BF396750, ADD UNIQUE INDEX UNIQ_6FDF8FF6BF396750 (id)');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF6BF396750');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert ADD p_id INT NOT NULL, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF6D37B63A2 FOREIGN KEY (p_id) REFERENCES b_people (id)');
        $this->addSql('CREATE INDEX IDX_6FDF8FF6D37B63A2 ON b_sw_expert (p_id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE s_user CHANGE password password VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal VARCHAR(50) DEFAULT NULL, CHANGE file file VARCHAR(50) DEFAULT NULL, CHANGE issn issn TINYTEXT DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('CREATE TABLE symfony_demo_tag (id INT AUTO_INCREMENT NOT NULL, UNIQUE INDEX id (id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE s_tag');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE issn issn VARCHAR(10) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT \'\' COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_sw_expert DROP INDEX UNIQ_6FDF8FF6BF396750, ADD INDEX IDX_6FDF8FF6BF396750 (id)');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF6D37B63A2');
        $this->addSql('DROP INDEX IDX_6FDF8FF6D37B63A2 ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert DROP p_id, CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF6BF396750 FOREIGN KEY (id) REFERENCES b_people (id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id, sw_id)');
        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD3BAD26311 FOREIGN KEY (tag_id) REFERENCES symfony_demo_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE s_user CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
    }
}
