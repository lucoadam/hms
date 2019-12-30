<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('auth/login', 'APIController@login');
Route::post('auth/register', 'APIController@register');

Route::group(['middleware' => 'auth.api'], function () {
    Route::get('auth/logout', 'APIController@logout');
    Route::get('/auth/user', function (Request $request) {
        $data = $request->user();
        $data->username = implode('',explode(' ',$data->name));
        return $data;
    });
});


Route::group(['prefix'=>'v1'],function(){
   Route::get('public/metas',function(Request $request){
       return '[{"key":"supp_marks_entry_school_side","value":"false"},{"key":"supp_at_max_subject","value":"2"},{"key":"is_installed","value":"1"},{"key":"use_supp_marks_for_calculation","value":null},{"key":"student_entry_lock_date","value":""},{"key":"practical_entry_lock_date","value":""},{"key":"marksheet_issue_date","value":"2076.01.01"},{"key":"operating_year","value":"75"},{"key":"manual_symbol_number","value":null},{"key":"municipal_office_location","value":"Battar, Nuwakot"},{"key":"municipal_name","value":"EMS"},{"key":"municipal_office_name","value":"EMS"},{"key":"supp_minimum_grade","value":"1.6"},{"key":"province_text","value":"Province 3"},{"key":"two_tab_based_entry","value":null},{"key":"th_marks_entry_school_side","value":null},{"key":"result_published","value":"true"},{"key":"centre_based_entry","value":"true"},{"key":"symbol_listing_report_title","value":";"},{"key":"marksheet_type","value":"budhanilkantha"}]';
   });
    Route::get('public/notices',function(Request $request){
        return '[{"id":1,"title":"Go for Registration","content":"fill the student registration form till the deadline ends","createdAt":"2019-12-10T06:30:20.852+0000","publishedDate":"2076-08-28"}]';
    });
    Route::get('public/routines',function(Request $request){
        return '{"2076-10-20":[{"id":1,"examDate":"2076-10-20","year":null,"subjectId":"101","subjectsBySubjectId":{"id":"101","name":" COMP NEPALI","subjectOrder":1,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"NEP","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":2,"examDate":"2076-10-20","year":null,"subjectId":"103","subjectsBySubjectId":{"id":"103","name":"COMP MATHEMATICS","subjectOrder":null,"fullMarks":100,"hasPractical":false,"passMarks":37,"subjectShortcode":"MATH","prFullMarks":null,"prPassMarks":null,"creditHour":300,"studentHasMarksById":null}},{"id":3,"examDate":"2076-10-20","year":null,"subjectId":"104","subjectsBySubjectId":{"id":"104","name":"COMP SOCIAL STUDIES AND POPULATION","subjectOrder":4,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"SOCIAL","prFullMarks":25,"prPassMarks":9,"creditHour":300,"studentHasMarksById":null}},{"id":4,"examDate":"2076-10-20","year":null,"subjectId":"105","subjectsBySubjectId":{"id":"105","name":"COMP SCIENCE AND ENVIRONMENT","subjectOrder":5,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"SCIENCE","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":5,"examDate":"2076-10-20","year":null,"subjectId":"108","subjectsBySubjectId":{"id":"108","name":"OCCUPATION BUSINESS AND TECHNOLOGY","subjectOrder":8,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"OBT","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":6,"examDate":"2076-10-20","year":null,"subjectId":"102","subjectsBySubjectId":{"id":"102","name":"COMP ENGLISH","subjectOrder":2,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"ENG","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":7,"examDate":"2076-10-20","year":null,"subjectId":"109","subjectsBySubjectId":{"id":"109","name":"COMMUNITY LANGUAGE EDUCATION","subjectOrder":9,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"COMM","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":8,"examDate":"2076-10-20","year":null,"subjectId":"106","subjectsBySubjectId":{"id":"106","name":"COMP HEALTH AND PHYSICAL EDUCATION","subjectOrder":6,"fullMarks":30,"hasPractical":true,"passMarks":20,"subjectShortcode":"HPE","prFullMarks":20,"prPassMarks":8,"creditHour":150,"studentHasMarksById":null}},{"id":9,"examDate":"2076-10-20","year":null,"subjectId":"107","subjectsBySubjectId":{"id":"107","name":"MORAL EDUCATION","subjectOrder":7,"fullMarks":30,"hasPractical":true,"passMarks":12,"subjectShortcode":"MORAL","prFullMarks":20,"prPassMarks":8,"creditHour":150,"studentHasMarksById":null}},{"id":10,"examDate":"2076-10-20","year":null,"subjectId":"110","subjectsBySubjectId":{"id":"110","name":"COMP. SANSKRIT GRAMMER","subjectOrder":10,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"SANSG","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":11,"examDate":"2076-10-20","year":null,"subjectId":"111","subjectsBySubjectId":{"id":"111","name":"COMP. SANSKRIT LANGUAGE","subjectOrder":11,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"SANSL","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":12,"examDate":"2076-10-20","year":null,"subjectId":"112","subjectsBySubjectId":{"id":"112","name":"COMP. VEDA AND NITI SHASTRA","subjectOrder":12,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"VED","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}},{"id":13,"examDate":"2076-10-20","year":null,"subjectId":"113","subjectsBySubjectId":{"id":"113","name":"COMP. SANSKRIT ART","subjectOrder":13,"fullMarks":75,"hasPractical":true,"passMarks":30,"subjectShortcode":"SANSA","prFullMarks":25,"prPassMarks":10,"creditHour":300,"studentHasMarksById":null}}]}';
    });
});
