<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180420090833 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE symfony_demo_comment DROP FOREIGN KEY FK_53AD8F834B89032C');
        $this->addSql('ALTER TABLE symfony_demo_post_tag DROP FOREIGN KEY FK_6ABC1CC44B89032C');
        $this->addSql('ALTER TABLE symfony_demo_comment DROP FOREIGN KEY FK_53AD8F83F675F31B');
        $this->addSql('ALTER TABLE symfony_demo_post DROP FOREIGN KEY FK_58A92E65F675F31B');
        $this->addSql('CREATE TABLE s_post (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, summary VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, published_at DATETIME NOT NULL, INDEX IDX_FDF93547F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6CF33DD34B89032C (post_id), INDEX IDX_6CF33DD3BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_users (identifier INT AUTO_INCREMENT NOT NULL, reg_date DATETIME DEFAULT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, change_password VARCHAR(255) NOT NULL, account_status VARCHAR(255) NOT NULL, PRIMARY KEY(identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_main_orgn_info (org_no INT AUTO_INCREMENT NOT NULL, reg_date DATETIME NOT NULL, name VARCHAR(50) NOT NULL, reg_status TEXT NOT NULL, org_type LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', reg_country TINYINT(1) NOT NULL, phy_address TEXT DEFAULT NULL, post_address TEXT DEFAULT NULL, phone VARCHAR(30) DEFAULT NULL, fax VARCHAR(30) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, url VARCHAR(100) DEFAULT NULL, spoc VARCHAR(30) DEFAULT NULL, logo VARCHAR(150) DEFAULT NULL, done_by VARCHAR(20) NOT NULL, main_org VARCHAR(255) NOT NULL, PRIMARY KEY(org_no)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_2AE08F83F85E0677 (username), UNIQUE INDEX UNIQ_2AE08F83E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_object_profile (object VARCHAR(250) NOT NULL, profile_id SMALLINT NOT NULL, PRIMARY KEY(object, profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_user_profiles (profile_id SMALLINT NOT NULL, username VARCHAR(20) NOT NULL, PRIMARY KEY(profile_id, username)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_profiles (profile_id SMALLINT AUTO_INCREMENT NOT NULL, profile VARCHAR(20) NOT NULL, remarks MEDIUMTEXT NOT NULL, PRIMARY KEY(profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, author_id INT NOT NULL, content LONGTEXT NOT NULL, published_at DATETIME NOT NULL, INDEX IDX_AA3987C64B89032C (post_id), INDEX IDX_AA3987C6F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE s_post ADD CONSTRAINT FK_FDF93547F675F31B FOREIGN KEY (author_id) REFERENCES s_user (id)');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD34B89032C FOREIGN KEY (post_id) REFERENCES s_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD3BAD26311 FOREIGN KEY (tag_id) REFERENCES symfony_demo_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE s_comment ADD CONSTRAINT FK_AA3987C64B89032C FOREIGN KEY (post_id) REFERENCES s_post (id)');
        $this->addSql('ALTER TABLE s_comment ADD CONSTRAINT FK_AA3987C6F675F31B FOREIGN KEY (author_id) REFERENCES s_user (id)');
        $this->addSql('DROP TABLE b_cmds');
        $this->addSql('DROP TABLE b_sw_cat_subcat');
        $this->addSql('DROP TABLE symfony_demo_comment');
        $this->addSql('DROP TABLE symfony_demo_post');
        $this->addSql('DROP TABLE symfony_demo_post_tag');
        $this->addSql('DROP TABLE symfony_demo_user');
        $this->addSql('ALTER TABLE b_publications DROP issn, CHANGE journal journal VARCHAR(50) DEFAULT NULL, CHANGE file file VARCHAR(50) DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD34B89032C');
        $this->addSql('ALTER TABLE s_comment DROP FOREIGN KEY FK_AA3987C64B89032C');
        $this->addSql('ALTER TABLE s_post DROP FOREIGN KEY FK_FDF93547F675F31B');
        $this->addSql('ALTER TABLE s_comment DROP FOREIGN KEY FK_AA3987C6F675F31B');
        $this->addSql('CREATE TABLE b_cmds (cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cat_subcat (cat_id INT NOT NULL, subcat_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (subcat_id, cat_id), PRIMARY KEY(cat_id, subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symfony_demo_comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, author_id INT NOT NULL, content LONGTEXT NOT NULL COLLATE utf8_unicode_ci, published_at DATETIME NOT NULL, INDEX IDX_53AD8F834B89032C (post_id), INDEX IDX_53AD8F83F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symfony_demo_post (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, summary VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, content LONGTEXT NOT NULL COLLATE utf8_unicode_ci, published_at DATETIME NOT NULL, INDEX IDX_58A92E65F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symfony_demo_post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6ABC1CC44B89032C (post_id), INDEX IDX_6ABC1CC4BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE symfony_demo_user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, username VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, email VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci, roles LONGTEXT NOT NULL COLLATE utf8_unicode_ci COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_8FB094A1F85E0677 (username), UNIQUE INDEX UNIQ_8FB094A1E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE symfony_demo_comment ADD CONSTRAINT FK_53AD8F834B89032C FOREIGN KEY (post_id) REFERENCES symfony_demo_post (id)');
        $this->addSql('ALTER TABLE symfony_demo_comment ADD CONSTRAINT FK_53AD8F83F675F31B FOREIGN KEY (author_id) REFERENCES symfony_demo_user (id)');
        $this->addSql('ALTER TABLE symfony_demo_post ADD CONSTRAINT FK_58A92E65F675F31B FOREIGN KEY (author_id) REFERENCES symfony_demo_user (id)');
        $this->addSql('ALTER TABLE symfony_demo_post_tag ADD CONSTRAINT FK_6ABC1CC44B89032C FOREIGN KEY (post_id) REFERENCES symfony_demo_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE symfony_demo_post_tag ADD CONSTRAINT FK_6ABC1CC4BAD26311 FOREIGN KEY (tag_id) REFERENCES symfony_demo_tag (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE s_post');
        $this->addSql('DROP TABLE s_post_tag');
        $this->addSql('DROP TABLE b_webadmin_users');
        $this->addSql('DROP TABLE b_webadmin_main_orgn_info');
        $this->addSql('DROP TABLE s_user');
        $this->addSql('DROP TABLE b_webadmin_object_profile');
        $this->addSql('DROP TABLE b_webadmin_user_profiles');
        $this->addSql('DROP TABLE b_webadmin_profiles');
        $this->addSql('DROP TABLE s_comment');
        $this->addSql('ALTER TABLE b_publications ADD issn VARCHAR(10) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE journal journal CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT \'\' COLLATE latin1_swedish_ci');
    }
}
