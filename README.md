# Cobby Validition Extension Example
This is a Tutorial how you can make your own Validation for Cobby. <br>
Version: 1.0.1
## Requirements
* **cobby > v2.1.2**
* **Magento 1**.

## Features
+ display your own Validation messages for your custom Attributes in Excel.
## Instruction

In `app/code/community/Cobby/CustomValidation/Model/Import/Entity/Product.php` are two example validations.
You can for example change the case conditions `your_attribute` with your desired attribute.<br>
With the attribute `$valid`in line 33 you can define your validation.<br>
With the attribute `$message`in line 34 you can define the message that will be output in **Excel**.