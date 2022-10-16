<?
namespace Ibs\Notebookmarket;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

class NotebookTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'notebook';
    }

    public static function getUfId()
    {
        return 'NOTEBOOK';
    }

    public static function getConnectionName()
    {
        return 'default';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),

            new Entity\StringField('NAME', array(
                'required' => true,
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_NOTEBOOK_TABLE_NAME"),
            )),

            new Entity\IntegerField('YEAR', array(
                'required' => true,
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_NOTEBOOK_TABLE_YEAR"),
            )),

            new Entity\IntegerField('PRICE', array(
                'required' => true,
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_NOTEBOOK_TABLE_PRICE"),
            )),

            new Entity\IntegerField('MODEL_ID'),

            new Entity\ReferenceField(
                'MODEL',
                '\Ibs\Notebookmarket\ModelTable',
                array('=this.MODEL_ID' => 'ref.ID')
            ),

            new Entity\IntegerField('MANUFACTURER_ID'),

            new Entity\ReferenceField(
                'MANUFACTURER',
                '\Ibs\Notebookmarket\ManufacturerTable',
                array('=this.MANUFACTURER_ID' => 'ref.ID')
            ),

            new Entity\IntegerField('MATRIX_ID'),

            new Entity\ReferenceField(
                'OPTIONMATRIX',
                '\Ibs\Notebookmarket\OptionMatrixTable',
                array('=this.MATRIX_ID' => 'ref.ID')
            ),

            new Entity\IntegerField('MEMORY_TYPE_ID'),

            new Entity\ReferenceField(
                'OPTIONMEMORYTYPE',
                '\Ibs\Notebookmarket\OptionMemoryTypeTable',
                array('=this.MEMORY_TYPE_ID' => 'ref.ID')
            ),

            new Entity\IntegerField('BATTERY_TYPE_ID'),

            new Entity\ReferenceField(
                'OPTIONBATTERYTYPE',
                '\Ibs\Notebookmarket\OptionBatteryTypeTable',
                array('=this.BATTERY_TYPE_ID' => 'ref.ID')
            ),
        );
    }
}
?>