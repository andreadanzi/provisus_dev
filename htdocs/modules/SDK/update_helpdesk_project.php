<?php
include_once('../../config.inc.php');
chdir($root_directory);
require_once('include/utils/utils.php');
include_once('vtlib/Vtiger/Module.php');
$Vtiger_Utils_Log = true;
global $adb, $table_prefix;
session_start();

// Turn on debugging level
$Vtiger_Utils_Log = true;
include_once('vtlib/Vtiger/Menu.php');
include_once('vtlib/Vtiger/Module.php');

// Create module instance and save it first
$module = Vtiger_Module::getInstance('HelpDesk');
// Add the basic module block
$block1 = new Vtiger_Block();
$block1->label = 'LBL_PROJECT_INFORMATION';
$module->addBlock($block1);


/** Progetto **/
$field11 = new Vtiger_Field();
$field11->name = 'project_id';
$field11->table = $module->basetable;
$field11->label= 'Project';
$field11->columntype = 'VARCHAR(255)';
$field11->uitype = 10;
$field11->columntype = 'INT(19)';
$field11->typeofdata = 'I~O';
$field11->displaytype= 1;
$field11->quickcreate = 0;
$block1->addField($field11); 
$field11->setRelatedModules(Array('Project'));


Vtiger_Event::register($module ,'vtiger.entity.aftersave','HelpDeskHandler','modules/HelpDesk/HelpDeskHandler.php');
Vtiger_Event::register($module ,'vtiger.entity.beforesave','HelpDeskHandler','modules/HelpDesk/HelpDeskHandler.php');


$module = Vtiger_Module::getInstance('Project');
Vtiger_Event::register($module ,'vtiger.entity.aftersave','ProjectHandler','modules/Project/ProjectHandler.php');
Vtiger_Event::register($module ,'vtiger.entity.beforesave','ProjectHandler','modules/Project/ProjectHandler.php');

?>
