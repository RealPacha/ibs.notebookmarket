<?
namespace Ibs\Notebookmarket;

use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Entity;

Loc::loadMessages(__FILE__);

class OptionMatrixTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'ibs_market_option_matrix';
    }

    public static function getUfId()
    {
        return 'OPTIONMATRIX';
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
                'column_name' => Loc::getMessage("NOTEBOOK_MARKET_OPTION_MATRIX_TABLE_NAME"),
            )),
        );
    }
}
?>