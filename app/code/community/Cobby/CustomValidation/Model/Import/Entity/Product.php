<?php
/*
 * @copyright Copyright (c) 2021 mash2 GmbH & Co. KG. All rights reserved.
 * @license http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0).
 */


/**
 * Class Cobby_CustomValidation_Model_Import_Entity_Product
 */
class Cobby_CustomValidation_Model_Import_Entity_Product extends  Cobby_Connector_Model_Import_Entity_Product
{
    /**
     * Check one attribute. Can be overridden in child.
     *
     * @param string $attrCode Attribute code
     * @param array $attrParams Attribute params
     * @param array $rowData Row data
     * @param int $rowNum
     *
     * @return boolean false if Attribute is not valid
     */
    public function isAttributeValid($attrCode, $attrParams, $rowData, $rowNum)
    {
        parent::isAttributeValid($attrCode,  $attrParams,  $rowData, $rowNum);

        $message = '';
        switch ($attrParams['code']) {
            case 'your_attribute':
                //change max length
                $maxlength = 50;
                $val = Mage::helper('core/string')->cleanString($rowData[$attrCode]);
                $valid = Mage::helper('core/string')->strlen($val) <= $maxlength;
                $message = 'String is too long, only ' . $maxlength . ' characters allowed.';
                break;
            case 'your_attribute2':
                $val = Mage::helper('core/string')->cleanString($rowData[$attrCode]);
                $valid = !(strpos($val, '<') || strpos($val, '>'));
                $message = 'String contains not allowed character: > or <';
                break;
            default:
                $valid = true;
                break;
        }
        if (!$valid) {
            $this->addRowError($message, $rowNum, $attrCode);
        }

        return (bool)$valid;
    }
}