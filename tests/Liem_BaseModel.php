<?php
use PHPUnit\Framework\TestCase;
require_once './models/FactoryPattern.php';

class Liem_BaseModel extends TestCase
{
    # Update
    /**
     * Test update function using updateBankInfo()
     */
    public function testUpdateFunctionUsingUpdateBankInfoOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['id'] = 11;
        $input['cost'] = rand(100000, 999999);

        $bankModel->updateBankInfo($input);

        $data = $bankModel->getBankAccountByUserID(4)[0];
        $check_data = false;

        if($data['bank_id'] == $input['id'] && $data['cost'] == $input['cost']) {
            $check_data = true;
        }

        $this->assertEquals(true, $check_data);
    }

    # Insert
    /**
     * Test insert function using insertBankInfo()
     */
    public function testInsertFunctionUsingInsertBankInfoOk()
    {
        $factory = new FactoryPattern();
        $bankModel = $factory->make('bank');
        $input['user_id'] = 6;
        $input['cost'] = rand(100000, 999999);

        $bankModel->insertBankInfo($input);

        $data = $bankModel->getBankAccountByUserID($input['user_id'])[0];
        $check_data = false;

        if($data['id'] == $input['user_id'] && $data['cost'] == $input['cost']) {
            $check_data = true;
            $bankModel->deleteBankByUserId($input['user_id']);
        }

        $this->assertEquals(true, $check_data);
    }

}