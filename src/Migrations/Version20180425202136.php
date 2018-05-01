<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425202136 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('CREATE TABLE s_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_17F61C675E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE b_webadmin_main_orgn_info');
        $this->addSql('DROP TABLE b_webadmin_object_profile');
        $this->addSql('DROP TABLE b_webadmin_profiles');
        $this->addSql('DROP TABLE b_webadmin_user_profiles');
        $this->addSql('DROP TABLE b_webadmin_users');
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
        $this->addSql('CREATE TABLE b_webadmin_main_orgn_info (org_no INT AUTO_INCREMENT NOT NULL, reg_date DATETIME NOT NULL, name VARCHAR(50) NOT NULL COLLATE utf8_unicode_ci, reg_status TEXT NOT NULL COLLATE utf8_unicode_ci, org_type LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:simple_array)\', reg_country TINYINT(1) NOT NULL, phy_address TEXT DEFAULT NULL COLLATE utf8_unicode_ci, post_address TEXT DEFAULT NULL COLLATE utf8_unicode_ci, phone VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, fax VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, email VARCHAR(50) DEFAULT NULL COLLATE utf8_unicode_ci, url VARCHAR(100) DEFAULT NULL COLLATE utf8_unicode_ci, spoc VARCHAR(30) DEFAULT NULL COLLATE utf8_unicode_ci, logo VARCHAR(150) DEFAULT NULL COLLATE utf8_unicode_ci, done_by VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, main_org VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(org_no)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_object_profile (object VARCHAR(250) NOT NULL COLLATE utf8_unicode_ci, profile_id SMALLINT NOT NULL, PRIMARY KEY(object, profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_profiles (profile_id SMALLINT AUTO_INCREMENT NOT NULL, profile VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, remarks MEDIUMTEXT NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_user_profiles (profile_id SMALLINT NOT NULL, username VARCHAR(20) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(profile_id, username)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_users (identifier INT AUTO_INCREMENT NOT NULL, reg_date DATETIME DEFAULT NULL, firstname VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, lastname VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, username VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(30) NOT NULL COLLATE utf8_unicode_ci, change_password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, account_status VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
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
