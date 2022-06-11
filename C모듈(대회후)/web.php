<?php

$get(
    "/@View@index",
    "/event@View@event",
    "/chart@View@chart",
    "/sub1@View@sub1",
    "/store@View@store",
    "/api/:idx@Store@select",
    "/voting@View@voting",
    "/voting/api/:idx@Voting@votingAPI"
);
$post(
    "/insert@Store@insert",
    "/store/update@Store@update",
    "/voting/insert@Voting@insert"
);


