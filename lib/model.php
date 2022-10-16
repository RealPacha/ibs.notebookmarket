<?
namespace Ibs\Notebookmarket;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

class ModelTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'model';
    }

    public static function getUfId()
    {
        return 'MODEL';
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
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_MODEL_TABLE_NAME"),
            )),

            new Entity\IntegerField('MANUFACTURER_ID'),

            new Entity\ReferenceField(
                'MANUFACTURER',
                '\Ibs\Notebookmarket\ManufacturerTable',
                array('=this.MANUFACTURER_ID' => 'ref.ID')
            )
        );
    }
}
?>