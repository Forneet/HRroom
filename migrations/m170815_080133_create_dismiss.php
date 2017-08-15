<?php

use yii\db\Migration;

/**
 * Class m170815_080133_create_dismiss
 */
class m170815_080133_create_dismiss extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->createTable('{{%dismiss}}', [
            'id' => $this->primaryKey(),
            'order_id' =>$this->integer()->notNull(),
            'employee_id' =>$this->integer()->notNull(),
            'date' =>$this->date()->notNull(),
            'reason' =>$this->text()->notNull(),
        ]);


        $this->createIndex('idx-dismiss-order_id','{{%dismiss}}','order_id');
        $this->createIndex('idx-dismiss-employee_id','{{%dismiss}}','employee_id');

        $this->addForeignKey('fk-dismiss-order','{{%dismiss}}','order_id','{{%order}}','id','CASCADE','RESTRICT');
        $this->addForeignKey('fk-dismiss-employee_id','{{%dismiss}}','employee_id','{{%employee}}','id','CASCADE','RESTRICT');
    }


    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%dismiss}}');
        echo "m170815_080133_create_dismiss cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080133_create_dismiss cannot be reverted.\n";

        return false;
    }
    */
}
