<?
namespace Ibs\Notebookmarket;

use Bitrix\Main\Entity;

class NotebookOptionTable extends Entity\DataManager
{
    public static function getTableName()
    {
        return 'notebook_option';
    }

    public static function getUfId()
    {
        return 'NOTEBOOKOPTION';
    }

    public static function getConnectionName()
    {
        return 'default';
    }

    public static function getMap()
    {
        return array(
            new Entity\IntegerField('NOTEBOOK_ID', array(
                'primary' => true
            )),

            new Entity\ReferenceField(
                'NOTEBOOK',
                'Ibs\NotebookMarket\NotebookTable',
                array('=this.NOTEBOOK_ID' => 'ref.ID')
            ),

            new Entity\IntegerField('OPTION_ID', array(
                'primary' => true
            )),

            new Entity\ReferenceField(
                'IBSMARKETOPTION',
                'Ibs\NotebookMarket\OptionTable',
                array('=this.OPTION_ID' => 'ref.ID')
            ),

        );
    }
}


?>