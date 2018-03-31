<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180331152212 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE b_casebook (id INT AUTO_INCREMENT NOT NULL, title TEXT NOT NULL, link TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_server (svr_id INT AUTO_INCREMENT NOT NULL, svr_name VARCHAR(25) NOT NULL, svr_addr VARCHAR(50) NOT NULL, svr_ip VARCHAR(15) NOT NULL, instns_to_access VARCHAR(200) NOT NULL, instns_to_req_acc VARCHAR(200) NOT NULL, PRIMARY KEY(svr_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_projects (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, short VARCHAR(50) DEFAULT NULL, webpage MEDIUMTEXT DEFAULT NULL, date INT DEFAULT NULL, image TEXT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, people MEDIUMTEXT DEFAULT NULL, funder MEDIUMTEXT DEFAULT NULL, expertise LONGTEXT DEFAULT NULL, externalPI MEDIUMTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE manuscripts (id INT AUTO_INCREMENT NOT NULL, PMID INT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, journal LONGTEXT DEFAULT NULL, Title LONGTEXT DEFAULT NULL, CRF INT DEFAULT NULL, abstract LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cat (cat_id INT AUTO_INCREMENT NOT NULL, cat_name VARCHAR(50) NOT NULL, PRIMARY KEY(cat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_users (identifier INT AUTO_INCREMENT NOT NULL, reg_date DATETIME DEFAULT NULL, firstname VARCHAR(30) NOT NULL, lastname VARCHAR(30) NOT NULL, username VARCHAR(30) NOT NULL, password VARCHAR(30) NOT NULL, change_password VARCHAR(255) NOT NULL, account_status VARCHAR(255) NOT NULL, PRIMARY KEY(identifier)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_expertises (id INT AUTO_INCREMENT NOT NULL, topics_1 INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_workshops (id INT AUTO_INCREMENT NOT NULL, name MEDIUMTEXT DEFAULT NULL, city MEDIUMTEXT DEFAULT NULL, country MEDIUMTEXT DEFAULT NULL, date TINYTEXT DEFAULT NULL, year DATE DEFAULT NULL, venue MEDIUMTEXT DEFAULT NULL, type TEXT DEFAULT NULL, link MEDIUMTEXT DEFAULT NULL, newsid INT DEFAULT NULL, feature VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_main_orgn_info (org_no INT AUTO_INCREMENT NOT NULL, reg_date DATETIME NOT NULL, name VARCHAR(50) NOT NULL, reg_status TEXT NOT NULL, org_type LONGTEXT NOT NULL COMMENT \'(DC2Type:simple_array)\', reg_country TINYINT(1) NOT NULL, phy_address TEXT DEFAULT NULL, post_address TEXT DEFAULT NULL, phone VARCHAR(30) DEFAULT NULL, fax VARCHAR(30) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, url VARCHAR(100) DEFAULT NULL, spoc VARCHAR(30) DEFAULT NULL, logo VARCHAR(150) DEFAULT NULL, done_by VARCHAR(20) NOT NULL, main_org VARCHAR(255) NOT NULL, PRIMARY KEY(org_no)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_subcat (subcat_id INT AUTO_INCREMENT NOT NULL, subcat_name VARCHAR(50) NOT NULL, PRIMARY KEY(subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_resources_video (id INT AUTO_INCREMENT NOT NULL, author MEDIUMTEXT DEFAULT NULL, pict TINYTEXT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, pubid INT DEFAULT NULL, title LONGTEXT DEFAULT NULL, feature INT DEFAULT NULL, youtube TINYTEXT DEFAULT NULL, file TINYTEXT DEFAULT NULL, duration TIME DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE strains (id INT AUTO_INCREMENT NOT NULL, sequence LONGTEXT DEFAULT NULL, accession VARCHAR(32) DEFAULT NULL, CRF INT DEFAULT NULL, image INT DEFAULT NULL, seqnames VARCHAR(32) DEFAULT NULL, regaref INT DEFAULT NULL, treeCG TINYTEXT DEFAULT NULL, diversityCG NUMERIC(10, 4) DEFAULT NULL, supportCG NUMERIC(10, 4) DEFAULT NULL, SlDvCG NUMERIC(10, 4) DEFAULT NULL, dfCG NUMERIC(10, 4) DEFAULT NULL, sgCG NUMERIC(10, 4) DEFAULT NULL, slCG NUMERIC(10, 4) DEFAULT NULL, tree NUMERIC(10, 4) DEFAULT NULL, diversity NUMERIC(10, 4) DEFAULT NULL, support NUMERIC(10, 4) DEFAULT NULL, SlDv NUMERIC(10, 4) DEFAULT NULL, df NUMERIC(10, 4) DEFAULT NULL, sg NUMERIC(10, 4) DEFAULT NULL, sl NUMERIC(10, 4) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_grants (id INT AUTO_INCREMENT NOT NULL, short_title VARCHAR(100) DEFAULT NULL, title VARCHAR(300) DEFAULT NULL, PIs VARCHAR(200) DEFAULT NULL, result VARCHAR(255) DEFAULT NULL, award_letter VARCHAR(200) DEFAULT NULL, contract VARCHAR(200) DEFAULT NULL, scientifc_proposal VARCHAR(200) DEFAULT NULL, proposal_type VARCHAR(255) DEFAULT NULL, budget VARCHAR(200) DEFAULT NULL, budget_justification VARCHAR(200) DEFAULT NULL, abstract LONGTEXT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, collaborators LONGTEXT DEFAULT NULL, topic_primary VARCHAR(255) DEFAULT NULL, topic_secondary VARCHAR(255) DEFAULT NULL, costcentre VARCHAR(10) DEFAULT NULL, organism VARCHAR(255) DEFAULT NULL, funder VARCHAR(200) DEFAULT NULL, call_doc VARCHAR(200) DEFAULT NULL, call_website VARCHAR(200) DEFAULT NULL, start_date DATE DEFAULT NULL, end_date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cmds (sw_id INT NOT NULL, cmd_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (cmd_id, sw_id), PRIMARY KEY(sw_id, cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_expert (id INT NOT NULL, sw_id INT NOT NULL, type VARCHAR(10) NOT NULL, INDEX IDX_6FDF8FF6BF396750 (id), UNIQUE INDEX UNIQ_6FDF8FF617B8E905 (sw_id), INDEX IDX_6FDF8FF617B8E905 (sw_id), UNIQUE INDEX ix_ReversePK (id, sw_id), PRIMARY KEY(id, sw_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_grants_results (id INT AUTO_INCREMENT NOT NULL, result VARCHAR(100) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_object_profile (object VARCHAR(250) NOT NULL, profile_id SMALLINT NOT NULL, PRIMARY KEY(object, profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_publications (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, abstract LONGTEXT DEFAULT NULL, journal VARCHAR(50) DEFAULT NULL, volume LONGTEXT DEFAULT NULL, citations INT DEFAULT NULL, link LONGTEXT DEFAULT NULL, file VARCHAR(50) DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, topdescription LONGTEXT DEFAULT NULL, pages TINYTEXT DEFAULT NULL, datafile TINYTEXT DEFAULT NULL, date INT DEFAULT NULL, doi TINYTEXT DEFAULT NULL, impact DOUBLE PRECISION DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, video INT DEFAULT NULL, shorttitle LONGTEXT DEFAULT NULL, feature VARCHAR(1) DEFAULT NULL, projectid INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_databases (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_user_profiles (profile_id SMALLINT NOT NULL, username VARCHAR(20) NOT NULL, PRIMARY KEY(profile_id, username)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_webadmin_profiles (profile_id SMALLINT AUTO_INCREMENT NOT NULL, profile VARCHAR(20) NOT NULL, remarks MEDIUMTEXT NOT NULL, PRIMARY KEY(profile_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_inst_locn (sw_id SMALLINT NOT NULL, svr_id SMALLINT NOT NULL, install_locn VARCHAR(200) NOT NULL, install_date DATE NOT NULL, how_to_load VARCHAR(200) NOT NULL, how_to_unload VARCHAR(200) NOT NULL, UNIQUE INDEX ix_ReversePK (svr_id, sw_id), PRIMARY KEY(sw_id, svr_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_cmds (cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(25) NOT NULL, PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw (sw_id INT AUTO_INCREMENT NOT NULL, sw_name VARCHAR(50) NOT NULL, PRIMARY KEY(sw_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE crflist (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(10) DEFAULT NULL, RegaV3 VARBINARY(255) DEFAULT NULL, description LONGTEXT DEFAULT NULL, losdescription LONGTEXT DEFAULT NULL, loslink LONGTEXT DEFAULT NULL, geographic VARCHAR(100) DEFAULT NULL, transmission VARCHAR(50) DEFAULT NULL, epidemiosign VARCHAR(50) DEFAULT NULL, numberseq INT DEFAULT NULL, lossearch VARCHAR(10) DEFAULT NULL, firstisolated DATE DEFAULT NULL, lastisolated DATE DEFAULT NULL, tree TINYTEXT DEFAULT NULL, REGAV3map TINYTEXT DEFAULT NULL, losmap TINYTEXT DEFAULT NULL, REGAV3link TINYTEXT DEFAULT NULL, exclusion LONGTEXT DEFAULT NULL, phyloV1 VARBINARY(255) DEFAULT NULL, numberseqCG INT DEFAULT NULL, firstisolatedCG DATE DEFAULT NULL, lastisolatedCG DATE DEFAULT NULL, geographicCG VARCHAR(200) DEFAULT NULL, refstrain TINYTEXT DEFAULT NULL, REGArefstrain1 TINYTEXT DEFAULT NULL, REGArefstrain2 TINYTEXT DEFAULT NULL, REGArefstrain3 TINYTEXT DEFAULT NULL, Regav3resultCG TINYTEXT DEFAULT NULL, Regav3result TINYTEXT DEFAULT NULL, phylotyperesults LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_news (id INT AUTO_INCREMENT NOT NULL, image VARCHAR(50) DEFAULT NULL, webpage VARCHAR(250) DEFAULT NULL, title VARCHAR(150) DEFAULT NULL, journal VARCHAR(100) DEFAULT NULL, pubid INT DEFAULT NULL, date DATE DEFAULT NULL, summary LONGTEXT DEFAULT NULL, file VARCHAR(50) DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, summary2 LONGTEXT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, topdescription LONGTEXT DEFAULT NULL, feature VARCHAR(1) DEFAULT NULL, INDEX id (id), INDEX id_2 (id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_reports (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, abstract LONGTEXT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, journal LONGTEXT DEFAULT NULL, volume LONGTEXT DEFAULT NULL, link LONGTEXT DEFAULT NULL, file VARCHAR(50) DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, pages TINYTEXT DEFAULT NULL, datafile TINYTEXT DEFAULT NULL, date DATE DEFAULT NULL, doi TINYTEXT DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, image TINYTEXT DEFAULT NULL, pubid INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_software (id INT AUTO_INCREMENT NOT NULL, date DATE DEFAULT NULL, webpage VARCHAR(100) DEFAULT NULL, version INT DEFAULT NULL, name VARCHAR(150) DEFAULT NULL, description LONGTEXT DEFAULT NULL, image VARCHAR(50) DEFAULT NULL, authors LONGTEXT DEFAULT NULL, pubid INT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, type MEDIUMTEXT DEFAULT NULL, feature VARCHAR(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_blogs (id INT AUTO_INCREMENT NOT NULL, summary LONGTEXT DEFAULT NULL, summary2 LONGTEXT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, photo2 TINYTEXT DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, title VARCHAR(200) DEFAULT NULL, date DATE DEFAULT NULL, image VARCHAR(100) DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, topdescription LONGTEXT DEFAULT NULL, video LONGTEXT DEFAULT NULL, pubid INT DEFAULT NULL, imagefront VARCHAR(100) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cat_subcat (cat_id INT NOT NULL, subcat_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (subcat_id, cat_id), PRIMARY KEY(cat_id, subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_people (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) DEFAULT NULL, email VARCHAR(50) DEFAULT NULL, telephone VARCHAR(50) DEFAULT NULL, fax VARCHAR(50) DEFAULT NULL, summary LONGTEXT DEFAULT NULL, image VARCHAR(40) DEFAULT NULL, summary2 LONGTEXT DEFAULT NULL, surname VARCHAR(50) DEFAULT NULL, initials VARCHAR(10) DEFAULT NULL, photo2 TINYTEXT DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, member TINYTEXT NOT NULL, category TEXT DEFAULT NULL, INDEX researcher (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE software_categories (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_cases (id INT AUTO_INCREMENT NOT NULL, description1 LONGTEXT DEFAULT NULL, imagechart1 TINYTEXT DEFAULT NULL, imageHIVDR1 TINYTEXT DEFAULT NULL, GSSscore1 LONGTEXT DEFAULT NULL, interpretation2 LONGTEXT DEFAULT NULL, recommendation2 LONGTEXT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, questions2 LONGTEXT DEFAULT NULL, answers3 LONGTEXT DEFAULT NULL, keylearn3 LONGTEXT DEFAULT NULL, title1 LONGTEXT DEFAULT NULL, interpretation1 LONGTEXT DEFAULT NULL, org VARCHAR(5) DEFAULT NULL, caseid INT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, topdescription LONGTEXT DEFAULT NULL, date DATE DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_media (id INT AUTO_INCREMENT NOT NULL, link LONGTEXT DEFAULT NULL, file LONGTEXT DEFAULT NULL, title LONGTEXT DEFAULT NULL, authors LONGTEXT DEFAULT NULL, description LONGTEXT DEFAULT NULL, image TINYTEXT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, summary2 LONGTEXT DEFAULT NULL, keywords LONGTEXT DEFAULT NULL, date DATE DEFAULT NULL, intro LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_resources_ppt (id INT AUTO_INCREMENT NOT NULL, pict TINYTEXT DEFAULT NULL, summary LONGTEXT DEFAULT NULL, pubid INT DEFAULT NULL, feature INT DEFAULT NULL, pptfile TINYTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_links (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT DEFAULT NULL, webpage LONGTEXT DEFAULT NULL, bioafricaSATuRN INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rega (id INT AUTO_INCREMENT NOT NULL, Regav3resultCG TINYTEXT DEFAULT NULL, Regav3resultPOL TINYTEXT DEFAULT NULL, `exclusion reason` LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_installed_sw (sw_id INT AUTO_INCREMENT NOT NULL, cat_id INT DEFAULT NULL, subcat_id INT DEFAULT NULL, sw_name VARCHAR(50) NOT NULL, sw_url VARCHAR(200) NOT NULL, sw_desc VARCHAR(200) NOT NULL, INDEX IDX_F2FEE139E6ADA943 (cat_id), INDEX IDX_F2FEE13980D12166 (subcat_id), PRIMARY KEY(sw_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF6BF396750 FOREIGN KEY (id) REFERENCES b_people (id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD CONSTRAINT FK_6FDF8FF617B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('ALTER TABLE b_installed_sw ADD CONSTRAINT FK_F2FEE139E6ADA943 FOREIGN KEY (cat_id) REFERENCES b_sw_cat (cat_id)');
        $this->addSql('ALTER TABLE b_installed_sw ADD CONSTRAINT FK_F2FEE13980D12166 FOREIGN KEY (subcat_id) REFERENCES b_sw_subcat (subcat_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_installed_sw DROP FOREIGN KEY FK_F2FEE139E6ADA943');
        $this->addSql('ALTER TABLE b_installed_sw DROP FOREIGN KEY FK_F2FEE13980D12166');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF6BF396750');
        $this->addSql('ALTER TABLE b_sw_expert DROP FOREIGN KEY FK_6FDF8FF617B8E905');
        $this->addSql('DROP TABLE b_casebook');
        $this->addSql('DROP TABLE b_server');
        $this->addSql('DROP TABLE b_projects');
        $this->addSql('DROP TABLE manuscripts');
        $this->addSql('DROP TABLE b_sw_cat');
        $this->addSql('DROP TABLE b_webadmin_users');
        $this->addSql('DROP TABLE b_expertises');
        $this->addSql('DROP TABLE b_workshops');
        $this->addSql('DROP TABLE b_webadmin_main_orgn_info');
        $this->addSql('DROP TABLE b_sw_subcat');
        $this->addSql('DROP TABLE b_resources_video');
        $this->addSql('DROP TABLE strains');
        $this->addSql('DROP TABLE b_grants');
        $this->addSql('DROP TABLE b_sw_cmds');
        $this->addSql('DROP TABLE b_sw_expert');
        $this->addSql('DROP TABLE b_grants_results');
        $this->addSql('DROP TABLE b_webadmin_object_profile');
        $this->addSql('DROP TABLE b_publications');
        $this->addSql('DROP TABLE b_databases');
        $this->addSql('DROP TABLE b_webadmin_user_profiles');
        $this->addSql('DROP TABLE b_webadmin_profiles');
        $this->addSql('DROP TABLE b_sw_inst_locn');
        $this->addSql('DROP TABLE b_cmds');
        $this->addSql('DROP TABLE b_sw');
        $this->addSql('DROP TABLE crflist');
        $this->addSql('DROP TABLE b_news');
        $this->addSql('DROP TABLE b_reports');
        $this->addSql('DROP TABLE b_software');
        $this->addSql('DROP TABLE b_blogs');
        $this->addSql('DROP TABLE b_sw_cat_subcat');
        $this->addSql('DROP TABLE b_people');
        $this->addSql('DROP TABLE software_categories');
        $this->addSql('DROP TABLE b_cases');
        $this->addSql('DROP TABLE b_media');
        $this->addSql('DROP TABLE b_resources_ppt');
        $this->addSql('DROP TABLE b_links');
        $this->addSql('DROP TABLE rega');
        $this->addSql('DROP TABLE b_installed_sw');
    }
}
