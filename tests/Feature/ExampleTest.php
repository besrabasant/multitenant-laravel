<?php

use Illuminate\Http\Response;

test('Home route returns status '. Response::HTTP_OK, function () {
    $this->get("/")->assertStatus(Response::HTTP_OK);
});
