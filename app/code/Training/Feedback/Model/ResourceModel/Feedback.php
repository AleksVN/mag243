<?php

namespace Training\Feedback\Model\ResourceModel;

class Feedback extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    private $adapter;

    protected function _construct()
    {
        $this->_init('training_feedback', 'feedback_id');
        $this->adapter = $this->getConnection();
    }
    public function getAllFeedbackNumber()
    {
        $select = $this->querySelectAll();
        $this->adapter->fetchOne($select);

        return $this->adapter->fetchOne($select);
    }
    public function getActiveFeedbackNumber()
    {
        $select = $this->querySelectAll()->where('is_active = ?', \Training\Feedback\Model\Feedback::STATUS_ACTIVE);

        return $this->adapter->fetchOne($select);
    }
    public function querySelectAll()
    {
        return $this->adapter->select()->from('training_feedback', new \Zend_Db_Expr('COUNT(*)'));
    }
}
