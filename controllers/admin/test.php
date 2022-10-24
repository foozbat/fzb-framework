<?php

$router = Fzb\get_router();
print("<pre>");
print($router->get_route());
print_r($router->get_all_routes());

?>
<br/>
ADMIN PAGE