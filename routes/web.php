<?php


use App\Http\Controllers\Admin\AdminImpersonateController;
use App\Http\Controllers\Admin\AdminProfilePermissionController;
use App\Http\Controllers\Admin\AdminCourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserAdminController;
use App\Http\Controllers\UserTaskController;
use App\Http\Controllers\UsertraineeController;
use App\Http\Controllers\UsertrainerController;


Route::get('/', function () {
	return view('welcome');
});

Route::middleware(['auth', 'impersonate'])->group(function () {
	Route::get('dashboard', [HomeController::class, 'dashboard'])
		->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Impersonate
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->group(function () {

	Route::get('admin/impersonate/enable/{user}', [AdminImpersonateController::class, 'enableImpersonate'])
		->name('admin.impersonate.enable');

	Route::get('admin/impersonate/disable', [AdminImpersonateController::class, 'disableImpersonate'])
		->name('admin.impersonate.disable');
});

/*
|--------------------------------------------------------------------------
| user admin
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/user')->group(function () {

	Route::get('admin/password/edit/{admin}', [UserAdminController::class, 'adminPasswordEdit'])
		->middleware('permission:admin.user.admin.password.update')
		->name('admin.user.admin.password.edit');

	Route::post('admin/password/update/{admin}', [UserAdminController::class, 'adminPasswordUpdate'])
		->middleware('permission:admin.user.admin.password.update')
		->name('admin.user.admin.password.update');

	Route::get('admin/show/{user}', [UserAdminController::class, 'adminShow'])
		->middleware('permission:admin.user.admin.show')
		->name('admin.user.admin.show');

	Route::get('admin/index', [UserAdminController::class, 'adminIndex'])
		->middleware('permission:admin.user.admin.index')
		->name('admin.user.admin.index');

	Route::get('admin/edit/{admin}', [UserAdminController::class, 'adminEdit'])
		->name('admin.user.admin.edit');

	Route::post('admin/update/{admin}', [UserAdminController::class, 'adminUpdate'])
		->name('admin.user.admin.update');
});

/*
|--------------------------------------------------------------------------
| user trainer
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/user')->group(function () {

	Route::get('trainer/password/edit/{trainer}', [UsertrainerController::class, 'trainerPasswordEdit'])
		->middleware('permission:admin.user.trainer.password.update')
		->name('admin.user.trainer.password.edit');

	Route::post('trainer/password/update/{trainer}', [UsertrainerController::class, 'trainerPasswordUpdate'])
		->middleware('permission:admin.user.trainer.password.update')
		->name('admin.user.trainer.password.update');

	Route::get('trainer/show/{user}', [UsertrainerController::class, 'trainerShow'])
		->middleware('permission:admin.user.trainer.show')
		->name('admin.user.trainer.show');

	Route::get('trainer/index', [UsertrainerController::class, 'trainerIndex'])
		->middleware('permission:admin.user.trainer.index')
		->name('admin.user.trainer.index');

	Route::get('trainer/edit/{trainer}', [UsertrainerController::class, 'trainerEdit'])
		->middleware('permission:admin.user.trainer.update')
		->name('admin.user.trainer.edit');

	Route::post('trainer/update/{trainer}', [UsertrainerController::class, 'trainerUpdate'])
		->middleware('permission:admin.user.trainer.update')
		->name('admin.user.trainer.update');
});

/*
|--------------------------------------------------------------------------
| user trainee
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/user')->group(function () {

	Route::get('trainee/password/edit/{trainee}', [UsertraineeController::class, 'traineePasswordEdit'])
		->middleware('permission:admin.user.trainee.password.update')
		->name('admin.user.trainee.password.edit');

	Route::post('trainee/password/update/{trainee}', [UsertraineeController::class, 'traineePasswordUpdate'])
		->middleware('permission:admin.user.trainee.password.update')
		->name('admin.user.trainee.password.update');

	Route::get('trainee/show/{user}', [UsertraineeController::class, 'traineeShow'])
		->middleware('permission:admin.user.trainee.show')
		->name('admin.user.trainee.show');

	Route::get('trainee/index', [UsertraineeController::class, 'traineeIndex'])
		->middleware('permission:admin.user.trainee.index')
		->name('admin.user.trainee.index');

	Route::get('trainee/edit/{trainee}', [UsertraineeController::class, 'traineeEdit'])
		->middleware('permission:admin.user.trainee.update')
		->name('admin.user.trainee.edit');

	Route::post('trainee/update/{trainee}', [UsertraineeController::class, 'traineeUpdate'])
		->middleware('permission:admin.user.trainee.update')
		->name('admin.user.trainee.update');

	Route::post('trainee/store', [UsertraineeController::class, 'traineeStore'])
		->middleware('permission:admin.user.trainee.store')
		->name('admin.user.trainee.store');
});


/*
|--------------------------------------------------------------------------
| courses
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/course')->group(function () {

	Route::get('index', [AdminCourseController::class, 'index'])
		->middleware('permission:admin.course.index')
		->name('admin.course.index');

	Route::get('show/{course}', [AdminCourseController::class, 'show'])
		->middleware('permission:admin.course.show')
		->name('admin.course.show');

	Route::post('store', [AdminCourseController::class, 'store'])
		->middleware('permission:admin.course.store')
		->name('admin.course.store');
});



/*
|--------------------------------------------------------------------------
| profiles
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->group(function () {
	Route::get('admin/profile_permission/{profile}', [AdminProfilePermissionController::class, 'index'])
		->middleware('permission:admin.profile_permission.index')
		->name('admin.profile_permission.index');

	Route::post('admin/profile_permission/update/{profile}', [AdminProfilePermissionController::class, 'profilePermissionUpdate'])
		->middleware('permission:admin.profile_permission.index')
		->name('admin.profile_permission.update');
});

Route::middleware(['auth', 'impersonate'])->group(function () {

	Route::get('switch-account/{profile}', [ProfileController::class, 'switchAccount'])->name('switch-account');

	Route::get('admin/profile/{user}/{profile}/add_account_show_form', [ProfileController::class, 'addAccountShowForm'])
		->middleware('permission:admin.profile.add_account')
		->name('admin.profile.add_account_show_form');

	Route::get('admin/profile/{user}/{title}/add_account', [ProfileController::class, 'addAccount'])
		->middleware('permission:admin.profile.add_account')
		->name('admin.profile.add_account');

	Route::post('admin/profile/add_trainee_account', [ProfileController::class, 'addtraineeAccount'])
		->name('admin.profile.add_trainee_account');

	Route::get('admin/profile/{user}/{profile}/remove_account_show_form', [ProfileController::class, 'removeAccountShowForm'])
		->middleware('permission:admin.profile.remove_account')
		->name('admin.profile.remove_account_show_form');

	Route::get('admin/profile/{user}/{profile}/remove_account', [ProfileController::class, 'removeAccount'])
		->middleware('permission:admin.profile.remove_account')
		->name('admin.profile.remove_account');

	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| message
|--------------------------------------------------------------------------
 */

Route::group(['middleware' => ['auth', 'impersonate']], function () {
	Route::get('message', [MessageController::class, 'message'])->name('message');
});

Route::middleware(['auth', 'impersonate'])->prefix('message')->group(function () {
	Route::get('send/create', [MessageController::class, 'sendCreate'])
		->name('admin.message.send.create');

	Route::get('replay/create', [MessageController::class, 'replayCreate'])
		->name('admin.message.replay.create');

	Route::post('send/store', [MessageController::class, 'sendStore'])
		->name('admin.message.send.store');

	Route::post('replay/store', [MessageController::class, 'replayStore'])
		->name('admin.message.replay.store');

	Route::get('index', [MessageController::class, 'index'])
		->name('admin.message.index');

	Route::get('show/{message_receiver_id}', [MessageController::class, 'show'])
		->name('admin.message.show');

	Route::get('receiver/index/{message}', [MessageController::class, 'receiverIndex'])
		->name('admin.message.receiver.index');
});

/*
|--------------------------------------------------------------------------
| admin/task
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/task')->group(function () {
	Route::get('index', [TaskController::class, 'index'])->name('admin.task.index');

	Route::post('store', [TaskController::class, 'store'])->name('admin.task.store');

	Route::post('update/{task}', [TaskController::class, 'update'])->name('admin.task.update');

	Route::post('delete/{task}', [TaskController::class, 'destroy'])->name('admin.task.delete');
});

/*
|--------------------------------------------------------------------------
| admin/user/task
|--------------------------------------------------------------------------
 */
Route::middleware(['auth', 'impersonate'])->prefix('admin/user/task')->group(function () {
	Route::get('index/{user}', [UserTaskController::class, 'index'])->name('admin.user.task.index');

	Route::post('store', [UserTaskController::class, 'store'])->name('admin.user.task.store');

	Route::post('update/{task}', [UserTaskController::class, 'update'])->name('admin.user.task.update');

	Route::post('delete/{task}', [UserTaskController::class, 'destroy'])->name('admin.user.task.delete');
});

require __DIR__ . '/auth.php';
