<?php
// danzi.tn@20150102 importazione progetto collegato in dettaglio ticket
class ProjectHandler extends VTEventHandler {
    
    function handleEvent($eventName, $data) {
		global $adb,$log;
		// check irs a timcard we're saving.
		if (!($data->focus instanceof Project)) {
			return;
		}
		
		if($eventName == 'vtiger.entity.beforesave') {
			// Entity is about to be saved, take required action
			$log->debug("handleEvent ProjectHandler vtiger.entity.beforesave entered");
			$log->debug("handleEvent ProjectHandler vtiger.entity.beforesave treminated");
		}
		if($eventName == 'vtiger.entity.aftersave') {
			$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave entered");
			$id = $data->getId();
			$module = $data->getModuleName();
			$focus = $data->focus;
			$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave projectname = ".$focus->column_fields['projectname']);
			if( !$data->isNew() )
			{
				$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave this is an update");
			} elseif( $data->isNew()) {
				$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave this is an insert");
				$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave this is an insert focus->id = ". $focus->id );
			}
			$log->debug("handleEvent ProjectHandler vtiger.entity.aftersave terminated");
		}
    }
}


?>
