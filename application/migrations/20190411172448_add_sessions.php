<?php
class Migration_Add_sessions extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {   
        $sql = "CREATE TABLE sessions(id int unsigned NOT NULL AUTO_INCREMENT,
                time_id int unsigned NOT NULL,
                meeting_place varchar(50) NOT NULL,
                session varchar(50) NOT NULL,
                capacity TINYINT UNSIGNED NOT NULL,
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
        $this->dbforge->drop_table('sessions');
    }
}
