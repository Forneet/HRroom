<?php

use yii\db\Migration;

/**
 * Class m170815_080041_create_recruit
 */
class m170815_080041_create_recruit extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {

        $this->createTable('{{%recruit}}', [
            'id' => $this->primaryKey(),
            'order_id' =>$this->integer()->notNull(),
            'employee_id' =>$this->integer()->notNull(),
            'date_open' =>$this->date()->notNull(),
        ]);

        $this->createIndex('idx-recruit-order_id','{{%recruit}}','order_id');
        $this->createIndex('idx-recruit-employee_id','{{%recruit}}','employee_id');

        $this->addForeignKey('fk-recruit-order','{{%recruit}}','order_id','{{%order}}','id','CASCADE','RESTRICT');
        $this ->addForeignKey('fk-recruit-employee_id','{{%recruit}}','employee_id','{{%employee}}','id','CASCADE','RESTRICT');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%recruit}}');
        echo "m170815_080041_create_recruit cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080041_create_recruit cannot be reverted.\n";

        return false;
    }
    */
}
