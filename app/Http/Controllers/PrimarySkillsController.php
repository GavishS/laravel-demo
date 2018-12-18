<?php

namespace App\Http\Controllers;

use App\PrimarySkills;
use Illuminate\Http\Request;

class PrimarySkillsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrimarySkills  $primarySkills
     * @return \Illuminate\Http\Response
     */
    public function show(PrimarySkills $primarySkills) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrimarySkills  $primarySkills
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimarySkills $primarySkills) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrimarySkills  $primarySkills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrimarySkills $primarySkills) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrimarySkills  $primarySkills
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimarySkills $primarySkills) {
        //
    }

    public function get_all_primary_skills() {
        return PrimarySkills::all();
    }
}
