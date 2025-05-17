<?php
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\AuthController;
    use App\Http\Controllers\Api\V1\FriendController;
    use App\Http\Controllers\Api\V1\UserController;
    use App\Http\Controllers\ProductController;
    use App\Http\Controllers\TransporterController;
//App\Http\Controllers\Api\V1\AuthController
    // Route::prefix('v1') -> group(function () {
    //     Route :: post('/register', [AuthController :: class, 'register']);
    //     Route :: post('/login', [AuthController :: class, 'login']);

    //         Route::middleware('auth: api')->group(function () {
    //             Route :: get('/profile', function () {
    //             return response()->json(auth()->user());
    //         });
    //         Route::post('/profile/avatar', [UserController :: class, 'updateAvatar' ]);
    //         Route::put('/profile/update', [UserController :: class, 'updateProfile']);
    //         Route::delete('/profile/delete', [UserController :: class, 'deleteMyAccount']);
    //         Route::post('/get-user-profiles', [UserController :: class, 'getProfiles']);
    //         Route::get('/search-user', [UserController :: class, 'search']);

    //         Route :: get('/friends', [FriendController :: class, 'index' ]);
    //         Route :: post('/add-friend', [FriendController :: class, 'add' ]);
    //         Route :: delete('/friends/{id}', [FriendController :: class, 'destroy' ]);
    //     });
    // });

 Route::prefix('v1')->group(function () {
    Route::get('/testapi', function () {
        return response()->json([
            'msg' => "thành công"
        ]);
    });

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/user/index', [AuthController::class, 'getallUser']);

    Route::delete('/user/delete/{id}', [AuthController::class, 'deleteUser']);

    //PRODUCT==========================
    Route::prefix('product')->group(function () {
        Route::post('/add', [ProductController::class, 'addProduct']);
        //view
        Route::get('/view/{id}', [ProductController::class, 'show']);
        Route::get('/index', [ProductController::class, 'index']);
        //update
        Route::put('/update/{id}', [ProductController::class, 'update']);
        //delete
        Route::delete('/delete/{id}', [ProductController::class, 'delete']);
    });

    //Transporter==========================

    Route::prefix('transporter')->group(function () {
        Route::post('/add', [TransporterController::class, 'add']);
        //view

        //TODO: implement show method in TransporterController
        // Route::get('/view/{id}', [TransporterController::class, 'show']);
        // Route::get('/index', [TransporterController::class, 'index']);
        // //update
        // Route::put('/update/{id}', [TransporterController::class, 'update']);
        // //delete
        // Route::delete('/delete/{id}', [TransporterController::class, 'delete']);
    });


    Route::middleware('auth:api')->group(function () {
        Route::get('/profile', [UserController::class, 'getProfile']);

        //product
        // Route::post('/add', [ProductController::class, 'addProduct']);
    });

 });



