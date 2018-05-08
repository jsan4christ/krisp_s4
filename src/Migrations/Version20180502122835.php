<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180502122835 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE s_post (id INT AUTO_INCREMENT NOT NULL, author_id INT NOT NULL, title VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, summary VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, published_at DATETIME NOT NULL, INDEX IDX_FDF93547F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_post_tag (post_id INT NOT NULL, tag_id INT NOT NULL, INDEX IDX_6CF33DD34B89032C (post_id), INDEX IDX_6CF33DD3BAD26311 (tag_id), PRIMARY KEY(post_id, tag_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cmds (cmd_id INT NOT NULL, sw_id INT DEFAULT NULL, cmd_name VARCHAR(25) NOT NULL, cmd_active INT NOT NULL, INDEX IDX_C87F7D8817B8E905 (sw_id), UNIQUE INDEX ix_ReversePK (cmd_id, sw_id), PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_tag (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_17F61C675E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(64) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_2AE08F83F85E0677 (username), UNIQUE INDEX UNIQ_2AE08F83E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE s_comment (id INT AUTO_INCREMENT NOT NULL, post_id INT NOT NULL, author_id INT NOT NULL, content LONGTEXT NOT NULL, published_at DATETIME NOT NULL, INDEX IDX_AA3987C64B89032C (post_id), INDEX IDX_AA3987C6F675F31B (author_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw (sw_id INT AUTO_INCREMENT NOT NULL, sw_name VARCHAR(50) NOT NULL, PRIMARY KEY(sw_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software_categories (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE s_post ADD CONSTRAINT FK_FDF93547F675F31B FOREIGN KEY (author_id) REFERENCES s_user (id)');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD34B89032C FOREIGN KEY (post_id) REFERENCES s_post (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE s_post_tag ADD CONSTRAINT FK_6CF33DD3BAD26311 FOREIGN KEY (tag_id) REFERENCES s_tag (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE b_sw_cmds ADD CONSTRAINT FK_C87F7D8817B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('ALTER TABLE s_comment ADD CONSTRAINT FK_AA3987C64B89032C FOREIGN KEY (post_id) REFERENCES s_post (id)');
        $this->addSql('ALTER TABLE s_comment ADD CONSTRAINT FK_AA3987C6F675F31B FOREIGN KEY (author_id) REFERENCES s_user (id)');
        $this->addSql('DROP TABLE b_sw_cat_subcat');
        $this->addSql('DROP TABLE b_sw_cmd');
        $this->addSql('DROP TABLE b_toys');
        $this->addSql('ALTER TABLE b_server CHANGE instns_to_access instns_to_access VARCHAR(200) DEFAULT NULL, CHANGE instns_to_req_acc instns_to_req_acc VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_installed_sw CHANGE cat_id cat_id INT DEFAULT NULL, CHANGE subcat_id subcat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE b_installed_sw ADD CONSTRAINT FK_F2FEE139E6ADA943 FOREIGN KEY (cat_id) REFERENCES b_sw_cat (cat_id)');
        $this->addSql('ALTER TABLE b_installed_sw ADD CONSTRAINT FK_F2FEE13980D12166 FOREIGN KEY (subcat_id) REFERENCES b_sw_subcat (subcat_id)');
        $this->addSql('CREATE INDEX IDX_F2FEE139E6ADA943 ON b_installed_sw (cat_id)');
        $this->addSql('CREATE INDEX IDX_F2FEE13980D12166 ON b_installed_sw (subcat_id)');
        $this->addSql('ALTER TABLE b_casebook CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_projects CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE short short VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_cat DROP cat_order, DROP cat_type, DROP cat_active');
        $this->addSql('ALTER TABLE b_expertises CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_workshops CHANGE feature feature VARCHAR(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_grants DROP image, CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE PIs PIs VARCHAR(200) DEFAULT NULL, CHANGE costcentre costcentre VARCHAR(10) DEFAULT NULL, CHANGE funder funder VARCHAR(200) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('DROP INDEX ix_ReversePK ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert ADD p_id INT NOT NULL, CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', CHANGE type type VARCHAR(16) NOT NULL');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF6D37B63A2 FOREIGN KEY (p_id) REFERENCES b_people (id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF617B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6FDF8FF6BF396750 ON b_sw_expert (id)');
        $this->addSql('CREATE INDEX IDX_6FDF8FF6D37B63A2 ON b_sw_expert (p_id)');
        $this->addSql('CREATE INDEX IDX_6FDF8FF617B8E905 ON b_sw_expert (sw_id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id)');
        $this->addSql('CREATE UNIQUE INDEX ix_ReversePK ON b_sw_expert (sw_id, p_id)');
        $this->addSql('ALTER TABLE b_grants_results CHANGE id id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal VARCHAR(50) DEFAULT NULL, CHANGE file file VARCHAR(50) DEFAULT NULL, CHANGE issn issn TINYTEXT DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD locn_id INT AUTO_INCREMENT NOT NULL, CHANGE sw_id sw_id INT DEFAULT NULL, CHANGE svr_id svr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD CONSTRAINT FK_4A50F12617B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD CONSTRAINT FK_4A50F12612D0BF96 FOREIGN KEY (svr_id) REFERENCES b_server (svr_id)');
        $this->addSql('CREATE INDEX IDX_4A50F12617B8E905 ON b_sw_inst_locn (sw_id)');
        $this->addSql('CREATE INDEX IDX_4A50F12612D0BF96 ON b_sw_inst_locn (svr_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD PRIMARY KEY (locn_id)');
        $this->addSql('ALTER TABLE CRFlist CHANGE RegaV3 RegaV3 VARBINARY(255) DEFAULT NULL, CHANGE phyloV1 phyloV1 VARBINARY(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_news DROP topic, CHANGE image image VARCHAR(50) DEFAULT NULL, CHANGE webpage webpage VARCHAR(250) DEFAULT NULL, CHANGE title title VARCHAR(150) DEFAULT NULL, CHANGE journal journal VARCHAR(100) DEFAULT NULL, CHANGE file file VARCHAR(50) DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
        $this->addSql('CREATE INDEX id ON b_news (id)');
        $this->addSql('CREATE INDEX id_2 ON b_news (id)');
        $this->addSql('ALTER TABLE b_reports CHANGE file file VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_software DROP active, CHANGE webpage webpage VARCHAR(100) DEFAULT NULL, CHANGE name name VARCHAR(150) DEFAULT NULL, CHANGE image image VARCHAR(50) DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_blogs CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE title title VARCHAR(200) DEFAULT NULL, CHANGE image image VARCHAR(100) DEFAULT NULL, CHANGE imagefront imagefront VARCHAR(100) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_people CHANGE name name VARCHAR(50) DEFAULT NULL, CHANGE email email VARCHAR(50) DEFAULT NULL, CHANGE telephone telephone VARCHAR(50) DEFAULT NULL, CHANGE fax fax VARCHAR(50) DEFAULT NULL, CHANGE image image VARCHAR(40) DEFAULT NULL, CHANGE surname surname VARCHAR(50) DEFAULT NULL, CHANGE initials initials VARCHAR(10) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_cases CHANGE org org VARCHAR(5) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_links CHANGE id id INT AUTO_INCREMENT NOT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD34B89032C');
        $this->addSql('ALTER TABLE s_comment DROP FOREIGN KEY FK_AA3987C64B89032C');
        $this->addSql('ALTER TABLE s_post_tag DROP FOREIGN KEY FK_6CF33DD3BAD26311');
        $this->addSql('ALTER TABLE s_post DROP FOREIGN KEY FK_FDF93547F675F31B');
        $this->addSql('ALTER TABLE s_comment DROP FOREIGN KEY FK_AA3987C6F675F31B');
        $this->addSql('CREATE TABLE b_sw_cat_subcat (cat_id INT NOT NULL, subcat_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (subcat_id, cat_id), PRIMARY KEY(cat_id, subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cmd (sw_id INT NOT NULL, cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(50) NOT NULL COLLATE utf8_general_ci, cmd_active VARCHAR(255) NOT NULL COLLATE utf8_general_ci, UNIQUE INDEX ix_ReversePK (cmd_id, sw_id), PRIMARY KEY(sw_id, cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_toys (id INT UNSIGNED AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, short CHAR(100) DEFAULT NULL COLLATE utf8_general_ci, date INT DEFAULT NULL, image TEXT DEFAULT NULL COLLATE utf8_general_ci, summary LONGTEXT DEFAULT NULL COLLATE utf8_general_ci, category TEXT DEFAULT NULL COLLATE utf8_general_ci, funder MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci, expertise MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci, company MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci, services MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci, imagesmall TEXT DEFAULT NULL COLLATE utf8_general_ci, contact MEDIUMTEXT DEFAULT NULL COLLATE utf8_general_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE s_post');
        $this->addSql('DROP TABLE s_post_tag');
        $this->addSql('DROP TABLE b_sw_cmds');
        $this->addSql('DROP TABLE s_tag');
        $this->addSql('DROP TABLE s_user');
        $this->addSql('DROP TABLE s_comment');
        $this->addSql('DROP TABLE b_sw');
        $this->addSql('DROP TABLE software_categories');
        $this->addSql('ALTER TABLE crflist CHANGE RegaV3 RegaV3 BINARY(1) DEFAULT NULL, CHANGE phyloV1 phyloV1 BINARY(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE b_blogs CHANGE title title CHAR(200) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE image image CHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE imagefront imagefront CHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE email email CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_casebook CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_cases CHANGE org org CHAR(5) DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_expertises CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_grants ADD image TEXT DEFAULT NULL COLLATE utf8_general_ci, CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE PIs PIs CHAR(200) DEFAULT NULL COLLATE utf8_general_ci, CHANGE costcentre costcentre CHAR(10) DEFAULT NULL COLLATE utf8_general_ci, CHANGE funder funder VARCHAR(200) DEFAULT \'\' COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE b_grants_results CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE b_installed_sw DROP FOREIGN KEY FK_F2FEE139E6ADA943');
        $this->addSql('ALTER TABLE b_installed_sw DROP FOREIGN KEY FK_F2FEE13980D12166');
        $this->addSql('DROP INDEX IDX_F2FEE139E6ADA943 ON b_installed_sw');
        $this->addSql('DROP INDEX IDX_F2FEE13980D12166 ON b_installed_sw');
        $this->addSql('ALTER TABLE b_installed_sw CHANGE cat_id cat_id INT NOT NULL, CHANGE subcat_id subcat_id INT NOT NULL');
        $this->addSql('ALTER TABLE b_links CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL');
        $this->addSql('DROP INDEX id ON b_news');
        $this->addSql('DROP INDEX id_2 ON b_news');
        $this->addSql('ALTER TABLE b_news ADD topic TEXT DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE image image CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE webpage webpage CHAR(250) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE title title CHAR(150) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE journal journal CHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT \'\' COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_people CHANGE name name CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE email email CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE telephone telephone CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE fax fax CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE image image CHAR(40) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE surname surname CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE initials initials CHAR(10) DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_projects CHANGE id id INT UNSIGNED AUTO_INCREMENT NOT NULL, CHANGE short short CHAR(50) DEFAULT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE issn issn VARCHAR(10) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT \'\' COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_reports CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_server CHANGE instns_to_access instns_to_access VARCHAR(200) NOT NULL COLLATE utf8_general_ci, CHANGE instns_to_req_acc instns_to_req_acc VARCHAR(200) NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE b_software ADD active INT DEFAULT 1 NOT NULL, CHANGE webpage webpage CHAR(100) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE name name CHAR(150) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE image image CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT NULL COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_sw_cat ADD cat_order INT DEFAULT 0, ADD cat_type VARCHAR(20) DEFAULT \'modal\' COLLATE utf8_general_ci, ADD cat_active INT DEFAULT 1 NOT NULL');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF6D37B63A2');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF617B8E905');
        $this->addSql('DROP INDEX UNIQ_6FDF8FF6BF396750 ON b_sw_expert');
        $this->addSql('DROP INDEX IDX_6FDF8FF6D37B63A2 ON b_sw_expert');
        $this->addSql('DROP INDEX IDX_6FDF8FF617B8E905 ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('DROP INDEX ix_ReversePK ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert DROP p_id, CHANGE id id INT NOT NULL, CHANGE type type VARCHAR(255) DEFAULT \'User\' NOT NULL COLLATE utf8_general_ci');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (sw_id, id)');
        $this->addSql('CREATE UNIQUE INDEX ix_ReversePK ON b_sw_expert (id, sw_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn MODIFY locn_id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP FOREIGN KEY FK_4A50F12617B8E905');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP FOREIGN KEY FK_4A50F12612D0BF96');
        $this->addSql('DROP INDEX IDX_4A50F12617B8E905 ON b_sw_inst_locn');
        $this->addSql('DROP INDEX IDX_4A50F12612D0BF96 ON b_sw_inst_locn');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP locn_id, CHANGE sw_id sw_id SMALLINT UNSIGNED NOT NULL, CHANGE svr_id svr_id SMALLINT UNSIGNED NOT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD PRIMARY KEY (sw_id, svr_id)');
        $this->addSql('ALTER TABLE b_workshops CHANGE feature feature CHAR(1) DEFAULT NULL COLLATE latin1_swedish_ci');
    }
}
