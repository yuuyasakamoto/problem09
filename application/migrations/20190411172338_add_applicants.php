<?php
class Migration_Add_applicants extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {   
        $sql = "CREATE TABLE applicants(id int unsigned NOT NULL AUTO_INCREMENT,
                pass varchar(50) NOT NULL,
                company varchar(50) NOT NULL,
                department varchar(50) NOT NULL,
                position varchar(50) NOT NULL,
                first_name varchar(20) NOT NULL,
                last_name varchar(20) NOT NULL,
                first_name_hiragana varchar(20) NOT NULL,
                last_name_hiragana varchar(20) NOT NULL,
                email varchar(50) NOT NULL,
                tel varchar(15) NOT NULL,
                attribute varchar(50) NOT NULL,
                payment varchar(20) NOT NULL,
                Invoice_address varchar(50) NOT NULL,
                receipt_address varchar(50) NOT NULL,
                entry_id varchar(10) NOT NULL,
                deleted datetime NULL comment 'NULL = 削除されていない',
                created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id)) DEFAULT CHARSET=utf8;
                ";
        $this->db->query($sql);
    }
    // ロールバック処理
    public function down()
    {   
        $this->dbforge->drop_table('applicants');
    }
}
