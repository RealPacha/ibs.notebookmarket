<?
namespace Ibs\Notebookmarket;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

class ManufacturerTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'manufacturer';
    }

    public static function getUfId()
    {
        return 'MANUFACTURER';
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
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_MANUFACTURER_TABLE_NAME"),
            )),
        );
    }
}
?>