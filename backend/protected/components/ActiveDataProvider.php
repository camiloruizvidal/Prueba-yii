<?php
class ActiveDataProvider extends CActiveDataProvider implements AjaxResponseInterface
{
    public function getResponseData()
    {
        $result = []; 
        $data=$this->getData();
        foreach ($data as $record) {
            $result[] = $record->getAttributes();
        }

        return $result;
    }

    public function getErrors()
    {
        return [];
    }
}