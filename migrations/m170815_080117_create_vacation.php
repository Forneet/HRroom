<?php

use yii\db\Migration;

/**
 * Class m170815_080117_create_vacation
 */
class m170815_080117_create_vacation extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('{{%vacation}}', [
            'id' => $this->primaryKey(),
            'order_id' =>$this->integer()->notNull(),
            'employee_id' =>$this->integer()->notNull(),
            'date_form' =>$this->date()->notNull(),
            'date_to' =>$this->date()->notNull(),
        ]);

        $this->createIndex('idx-vacation-order_id','{{%vacation}}','order_id');
        $this->createIndex('idx-vacation-employee_id','{{%vacation}}','employee_id');

        $this->addForeignKey('fk-vacation-order','{{%vacation}}','order_id','{{%order}}','id','CASCADE','RESTRICT');
        $this->addForeignKey('fk-vacation-employee_id','{{%vacation}}','employee_id','{{%employee}}','id','CASCADE','RESTRICT');

    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%vacation}}');
        echo "m170815_080117_create_vacation cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080117_create_vacation cannot be reverted.\n";

        return false;
    }
    */
}
