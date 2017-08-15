<?php

use yii\db\Migration;

/**
 * Class m170815_075951_create_interview
 */
class m170815_075951_create_interview extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $tableOption = null;
        if ($this->db->driverName ==='mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%interview}}', [
            'id' => $this->primaryKey(),
            'date' =>$this->date()->notNull(),
            'first_name' =>$this->string()->notNull(),
            'last_name' =>$this->string()->notNull(),
            'email' =>$this->string(),
            'status' =>$this->smallInteger()->notNull(),
            'reject_reason' =>$this->text(),
            'employee_id' =>$this->integer(),
        ], $tableOption);

        $this->createIndex('idx-interview-status','{{%interview}}','status');
        $this->createIndex('idx-interview-employee_id','{{%interview}}','employee_id');

        $this->addForeignKey('fk-interview-employee_id','{{%interview}}','employee_id','{{%employee}}','id','CASCADE','RESTRICT');

    }

    /**
     * @inheritdoc
     */
    public function Down()
    {
        $this->dropTable('{{%interview}}');
        echo "m170815_075951_create_interview cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_075951_create_interview cannot be reverted.\n";

        return false;
    }
    */
}
