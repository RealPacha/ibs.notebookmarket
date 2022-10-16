<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Main\Loader;
use Bitrix\Main\Localization\Loc;
use Ibs\Notebookmarket\NotebookTable;
use Ibs\Notebookmarket\ManufacturerTable;
use Ibs\Notebookmarket\ModelTable;
use Ibs\Notebookmarket\OptionMatrixTable;
use Ibs\Notebookmarket\OptionMemoryTypeTable;
use Ibs\Notebookmarket\OptionBatteryTypeTable;

class NotebookmarketComplex extends CBitrixComponent
{

    public $arDefaultUrlTemplates404 = array(
        "manufacturer" => "#SEF_FOLDER#/",
        "brand" => "#SEF_FOLDER#/#BRAND#/",
        "model" => "#SEF_FOLDER#/#BRAND#/#MODEL#/",
        "detail" => "#SEF_FOLDER#/detail/#NOTEBOOK#/"
    );

    public $arDefaultVariableAliases404 = array();

    public $arDefaultVariableAliases = array();

    public $arComponentVariables = array(
        "SECTION_ID",
        "SECTION_CODE",
        "ELEMENT_ID",
        "ELEMENT_CODE",
    );

    protected function checkModules()
    {
            if(!Loader::includeModule('ibs.notebookmarket'))
            {
                ShowError(Loc::getMessage("NOTEBOOK_MARKET_MODULE_NOT_INSTALLED"));
                return false;
            }
            return true;
    }

    function addTestDataNotebook()
    {
            $result = array();

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук MSI GF63Lite",
                    "YEAR" => "2021",
                    "PRICE" => "65690",
                    "MODEL_ID" => "1",
                    "MANUFACTURER_ID" => "1",
                    "MATRIX_ID" => "3",
                    "MEMORY_TYPE_ID" => "1",
                    "BATTERY_TYPE_ID" => "3"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук Lenovo Legion 5 Pro",
                    "YEAR" => "2021",
                    "PRICE" => "137390",
                    "MODEL_ID" => "4",
                    "MANUFACTURER_ID" => "2",
                    "MATRIX_ID" => "1",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "2"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук MAIBENBEN X558 3060",
                    "YEAR" => "2022",
                    "PRICE" => "111325",
                    "MODEL_ID" => "6",
                    "MANUFACTURER_ID" => "3",
                    "MATRIX_ID" => "2",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "1"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук ASUS ZenBook UX425JA",
                    "YEAR" => "2021",
                    "PRICE" => "75490",
                    "MODEL_ID" => "10",
                    "MANUFACTURER_ID" => "4",
                    "MATRIX_ID" => "1",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "3"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук MSI GS43VR 7RE-094",
                    "YEAR" => "2021",
                    "PRICE" => "182645",
                    "MODEL_ID" => "2",
                    "MANUFACTURER_ID" => "1",
                    "MATRIX_ID" => "3",
                    "MEMORY_TYPE_ID" => "1",
                    "BATTERY_TYPE_ID" => "2"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук ASUS TUF Gaming A15 FA506ICB-HN103",
                    "YEAR" => "2019",
                    "PRICE" => "77690",
                    "MODEL_ID" => "9",
                    "MANUFACTURER_ID" => "4",
                    "MATRIX_ID" => "2",
                    "MEMORY_TYPE_ID" => "1",
                    "BATTERY_TYPE_ID" => "3"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук MSI GT70 2QD-2456",
                    "YEAR" => "2019",
                    "PRICE" => "82967",
                    "MODEL_ID" => "3",
                    "MANUFACTURER_ID" => "1",
                    "MATRIX_ID" => "2",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "1"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук Acer Predator Helios 300 PH315-53-59DE",
                    "YEAR" => "2022",
                    "PRICE" => "89000",
                    "MODEL_ID" => "8",
                    "MANUFACTURER_ID" => "5",
                    "MATRIX_ID" => "1",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "1"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук HP Victus 16-e0151ur",
                    "YEAR" => "2020",
                    "PRICE" => "88700",
                    "MODEL_ID" => "7",
                    "MANUFACTURER_ID" => "6",
                    "MATRIX_ID" => "1",
                    "MEMORY_TYPE_ID" => "2",
                    "BATTERY_TYPE_ID" => "3"
                )
            );

            $result[] = NotebookTable::add(
                array(
                    "NAME" => "Ноутбук Lenovo IdeaPad Gaming 315IHU6",
                    "YEAR" => "2020",
                    "PRICE" => "84990",
                    "MODEL_ID" => "5",
                    "MANUFACTURER_ID" => "2",
                    "MATRIX_ID" => "3",
                    "MEMORY_TYPE_ID" => "1",
                    "BATTERY_TYPE_ID" => "2"
                )
            );

            return $result;
    }

    function addTestDataManufacturer()
    {
            $result = array();

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "MSI",
                )
            );

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "Lenovo",
                )
            );

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "MAIBENBEN",
                )
            );

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "ASUS",
                )
            );

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "Acer",
                )
            );

            $result[] = ManufacturerTable::add(
                array(
                    "NAME" => "HP",
                )
            );

            return $result;
    }

    function addTestDataModel()
    {
            $result = array();

            $result[] = ModelTable::add(
                array(
                    "NAME" => "GF",
                    "MANUFACTURER_ID" => "1"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "GS",
                    "MANUFACTURER_ID" => "1"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "GT",
                    "MANUFACTURER_ID" => "1"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "Legion",
                    "MANUFACTURER_ID" => "2"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "IdeaPad",
                    "MANUFACTURER_ID" => "2"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "X558",
                    "MANUFACTURER_ID" => "3"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "Victus",
                    "MANUFACTURER_ID" => "6"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "Predator",
                    "MANUFACTURER_ID" => "5"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "TUF Gaming",
                    "MANUFACTURER_ID" => "4"
                )
            );

            $result[] = ModelTable::add(
                array(
                    "NAME" => "ZenBook",
                    "MANUFACTURER_ID" => "4"
                )
            );

            return $result;
    }

    function addTestDataOptionMatrix()
    {
        $result = array();

        $result[] = OptionMatrixTable::add(
            array(
                "NAME" => "IPS",
            )
        );

        $result[] = OptionMatrixTable::add(
            array(
                "NAME" => "TN+Film",
            )
        );

        $result[] = OptionMatrixTable::add(
            array(
                "NAME" => "*VA",
            )
        );
        return $result;
    }

    function addTestDataOptionMemoryType()
    {
        $result = array();

        $result[] = OptionMemoryTypeTable::add(
            array(
                "NAME" => "HDD",
            )
        );

        $result[] = OptionMemoryTypeTable::add(
            array(
                "NAME" => "SDD",
            )
        );

        return $result;
    }

    function addTestDataOptionBatteryType()
    {
        $result = array();

        $result[] = OptionBatteryTypeTable::add(
            array(
                "NAME" => "NiCd",
            )
        );

        $result[] = OptionBatteryTypeTable::add(
            array(
                "NAME" => "NiMH",
            )
        );

        $result[] = OptionBatteryTypeTable::add(
            array(
                "NAME" => "LI-ion",
            )
        );

        return $result;
    }

    function ormList()
    {
        $result = NotebookTable::getList(
            array(
                'select' => array(
                    'NAME',
                    'MODEL_NAME' => 'MODEL.NAME',
                    'MANUFACTURER_NAME' => 'MANUFACTURER.NAME',
                    "MATRIX" => "OPTIONMATRIX.NAME",
                    "MEMORY_TYPE" => "OPTIONMEMORYTYPE.NAME",
                    "BATTERY_TYPE" => "OPTIONBATTERYTYPE.NAME",
                    'YEAR',
                    'PRICE'),
            )
        );

        return $result->fetchAll();
    }

    public function executeComponent()
    {
        global $APPLICATION;

        try{
            $this->includeComponentLang('class.php');

            $this->checkModules();
    
            $this->addTestDataNotebook();
            $this->addTestDataManufacturer();
            $this->addTestDataModel();
            $this->addTestDataOptionMatrix();
            $this->addTestDataOptionMemoryType();
            $this->addTestDataOptionBatteryType();
            
            if($APPLICATION->GetGroupRight('ibs.notebookmarket')<"R")
            {
                ShowError(Loc::getMessage("NOTEBOOK_MARKET_MODULE_ACCESS_DENIED"));
            }
            else
            {
                echo('<pre>');
                print_r($this->ormList());
                echo('<pre>');
    
                $this->includeComponentTemplate(); 
            } 
        }
        catch(Exception $e)
        {
            ShowError($e->getMessage());
        }
        
    }
}
?>