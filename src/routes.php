<?php

$app->post('/client/store', 'ClientController:store');
$app->get('/findClient/{idnumber}', 'ClientController:findClient');
$app->post('/loan/verify','LoanController:verify');