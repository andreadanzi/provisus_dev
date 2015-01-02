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
$block1 = Vtiger_Block::getInstance('LBL_PROJECT_INFORMATION',$module); 

/** Tipo Progetto **/
$field7 = new Vtiger_Field();
$field7->name = 'projecttype';//vte_installation_state
$field7->table = $module->basetable;
$field7->label = 'Type';
$field7->uitype = 15;
$field7->columntype = 'VARCHAR(255)';
$field7->typeofdata = 'V~O';// Varchar~Optional
$block1->addField($field7); /** table and column are automatically set */

?>
