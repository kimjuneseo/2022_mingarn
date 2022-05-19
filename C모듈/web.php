<?php

$get(
    "/@View@index",
    "/store@Page@render",
    "/store/Page/:idx@Page@getItem",
    "/store/remove/:idx@Page@removeItem"
);

$post(
    "/store@Page@insertPage",
    "/store/update@Page@updateItem",

);