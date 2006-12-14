#!/usr/bin/php
<?

# this script creates monthly tables radacctYYYYMM
# and copies CDR data from radacct table into it 

# this script must run daily during a window of low traffic


define_syslog_variables();
openlog("CDRTool autorotate", LOG_PID, LOG_LOCAL0);

$path=dirname(realpath($_SERVER['PHP_SELF']));
include($path."/../../global.inc");
include($path."/../../cdrlib.phtml");

$cdr_source     = "ser_radius";
$CDR_class      = $DATASOURCES[$cdr_source]["class"];
$CDRS           = new $CDR_class($cdr_source);

$CDRS->rotateTable($argv[1],$argv[2],$argv[3]);

?>
