<?php

class SpaController extends Controller {

    public function index() {
        return view('spa');
    }

    public function noneExisting() {
        throw new Exception("I should never get there");
    }
}