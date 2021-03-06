--TEST--
session encryption with checkraddr=4 and incorrect REMOTE_ADDR
--SKIPIF--
<?php include "../skipifcli.inc"; ?>
--ENV--
return <<<END
REMOTE_ADDR=127.0.0.2
PHPSESSID=test
END;
--INI--
suhosin.session.encrypt=On
suhosin.session.cryptkey=D3F4UL7
suhosin.session.cryptua=Off
suhosin.session.cryptdocroot=Off
suhosin.session.cryptraddr=0
suhosin.session.checkraddr=4
--FILE--
<?php
include "sessionhandler.inc";

session_test_start(new RemoteAddrSessionHandler());
var_dump($_SESSION);

?>
--EXPECTF--
array(0) {
}
