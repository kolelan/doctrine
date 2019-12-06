<?php


namespace App\Modules\Accounting\Documents;

class Money {
    const OPERAND_GT = '>';
    const OPERAND_LT = '<';
    const OPERAND_EQ = '==';
    const OPERAND_GT_EQ = '>=';
    const OPERAND_LT_EQ = '<=';
    const OPERAND_NOT_EQ = '<>';

    protected $amount;
    public $scale = 2;

    /**
     * @param mixed
     */
    public function __construct($amount) {
        $this->amount = str_replace(',', '.', $amount);
    }
    /**
     *
     * @param Money $data
     * @return App\Modules\Accounting\Document\Money
     */
    public function converToMoney($data) {
        if ($data instanceof Money) {
            return $data;
        } else {
            return new Money($data);
        }
    }
    public function getAmmount() {
        return $this->amount;
    }
    public function add($data) {
        return new Money(bcadd($this->getAmmount(), $this->converToMoney($data)->getAmmount(), $this->scale));
    }
    public function subtract($data) {
        return new Money(bcsub($this->getAmmount(), $this->converToMoney($data)->getAmmount(), $this->scale));
    }
    public function multiply($data) {
        $data = str_replace(',', '.', $data);
        return new Money(bcmul($this->getAmmount(), $data, $this->scale));
    }

    /**
     * @return mixed
     */
    public function __toString() {
        return $this->getAmmount();
    }
    public function divide($data) {
        $data = str_replace(',', '.', $data);
        if (floatval($data)) {
            return new Money(bcdiv($this->getAmmount(), $data, $this->scale));
        } else {
            throw new \LogicException('Devide by zero');
        }
    }
    /**
     * @param mixed $data
     * @param sting $operand
     * @return boolean
     * @throws \LogicException
     */
    public function compare($data, $operand) {
        $current = (float) $this->getAmmount();
        $data = (float) $this->converToMoney($data)->getAmmount();
        switch ($operand) {
            case self::OPERAND_GT:
                return ($current > $data);
                break;
            case self::OPERAND_LT:
                return ($current < $data);
                break;
            case self::OPERAND_EQ:
                return ($current == $data);
                break;
            case self::OPERAND_GT_EQ:
                return ($current >= $data);
                break;
            case self::OPERAND_LT_EQ:
                return ($current <= $data);
                break;
            case self::OPERAND_NOT_EQ:
                return ($current <> $data);
                break;
            default :
                throw new \LogicException('Unknow operand');
                break;
        }
    }
}