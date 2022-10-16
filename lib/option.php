<?
class OptionTable extends Entity\DataManager
{
    public static function getMap()
    {
        return array(
            new Entity\IntegerField('ID', array(
                'primary' => true,
                'autocomplete' => true
            )),

            new Entity\StringField('NAME', array(
                'required' => true,
            )),
        );
    }
}
?>