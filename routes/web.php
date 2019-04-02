<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

/*
 * Users Routes
 */
Route::get('users', 'UsersController@index');
Route::resource('users', 'UsersController');
Route::get('users-datatable', 'UsersController@usersDataTable')->name('users.datatables');
Route::resource('user-groups', 'UserGroupController');
Route::get('users-groups', 'UserGroupController@index');
Route::get('users-groups-datatable', 'UserGroupController@usersGroupsDataTable')->name('users.groups.datatables');
Route::patch('user-image-upload/{id}', 'UsersController@profileImageUpload')->name('user.image.upload');
Route::get('users/{id}/schedule', 'UsersController@viewSchedule');

/*
 *  Grades Routes
 */
Route::resource('grades', 'GradeController');
Route::get('grades-datatable', 'GradeController@gradesDataTable')->name('grades.datatables');

/*
 *  Subjects Routes
 */
Route::resource('subjects', 'SubjectController');
Route::get('subjects-datatable', 'SubjectController@subjectsDataTable')->name('subjects.datatables');

/*
 *  Schoolyear Routes
 */
Route::resource('schoolyears', 'SchoolyearController'); 
Route::get('schoolyears-datatable', 'SchoolyearController@schoolyearsDataTable')->name('schoolyears.datatables');

/*
 *  Sections Routes
 */
Route::resource('sections', 'SectionController'); 
Route::get('sections-datatable', 'SectionController@sectionsDataTable')->name('sections.datatables');

/*
 *  Subject Assign Routes
 */
Route::resource('subject-assign', 'SubjectAssignmentController'); 
//Route::get('sections-datatable', 'SectionController@sectionsDataTable')->name('sections.datatables');

/*
 *  Schedule Assign Routes
 */
Route::resource('schedule', 'ScheduleController'); 
Route::get('get-section', 'ScheduleController@getSection')->name('get-section');
Route::post('get-available-subject', 'ScheduleController@getAvailableSubject')->name('get-available-subject');
Route::post('get-available-time', 'ScheduleController@getAvailableTime')->name('get-available-time');
Route::post('get-available-day', 'ScheduleController@getAvailableDay')->name('get-available-day');

/*
 *  Student Assign Routes
 */
Route::resource('student', 'StudentController'); 
Route::get('students-datatable', 'StudentController@studentsDataTable')->name('students.datatables');
Route::get('student-class', 'StudentController@studentClass')->name('student-class');
Route::get('get-students', 'StudentController@getStudents')->name('get-students');
Route::get('get-grades', 'GradeController@getGrades')->name('get-grades');
Route::get('get-sections', 'SectionController@getSections')->name('get-sections');
Route::get('get-students-per-class', 'StudentController@getStudentsPerClass')->name('get-students-per-class');
Route::get('students-class-datatable', 'StudentController@studentClassDataTable')->name('students-class-datatable');
Route::post('student-class/remove/{id}', 'StudentClassController@destroy');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('home');

Route::get('/testroute', 'HomeController@test')->name('test');
