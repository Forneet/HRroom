<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HR_vacation".
 *
 * @property int $id
 * @property int $order_id
 * @property int $employee_id
 * @property string $date_form
 * @property string $date_to
 *
 * @property Employee $employee
 * @property Order $order
 */
class Vacation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'HR_vacation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'employee_id', 'date_form', 'date_to'], 'required'],
            [['order_id', 'employee_id'], 'integer'],
            [['date_form', 'date_to'], 'safe'],
            [['employee_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employee::className(), 'targetAttribute' => ['employee_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'employee_id' => 'Employee ID',
            'date_form' => 'Date Form',
            'date_to' => 'Date To',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployee()
    {
        return $this->hasOne(Employee::className(), ['id' => 'employee_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }
}