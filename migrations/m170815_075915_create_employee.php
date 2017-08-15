<?php

use yii\db\Migration;

/**
 * Class m170815_075915_create_employee
 */
class m170815_075915_create_employee extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOption = null;
        if ($this->db->driverName ==='mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%employee}}', [
            'id' => $this->primaryKey(),
            'first_name' =>$this->string()->notNull(),
            'last_name' =>$this->string()->notNull(),
            'address' =>$this->string()->notNull(),
            'email' =>$this->string(),
            'status' =>$this->smallInteger()->notNull(),
        ], $tableOption);

        $this->createIndex('idx-employee-status','{{%employee}}','status');
    }

    /**
     * @inheritdoc
     */
    public function Down()
    {

        $this->dropTable('{{%employee}}');

        echo "m170815_075915_create_employee cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_075915_create_employee cannot be reverted.\n";

        return false;
    }
    */
}
