<?php
namespace App\Http\Controllers;

use http\Env\Response;
use JWTAuth;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;
class APIController extends Controller
{
    /**
    * @var bool
    */
    public $loginAfterSignUp = true;

    /**
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function login(Request $request)
    {
        $email=$request->get('username');
        $input = $request->only( 'password');
        $token = null;
        if(User::where('username',$email)->exists()) {
            $input['email']=User::where('username',$email)->first()->email;
            if (!$token = auth()->attempt($input)) {
                return response()->json([
                    'success' => false,
                    'from'=>'here',
                    'message' => 'Invalid Username or Password',
                ], 401);
            }
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Invalid Username or Password',
            ], 401);
        }
        $headers =[
            'Authorization'=>$token
        ];
        return response()->json([
        'success' => true,
        'token' => $token,
        ],200,$headers);
    }

        public function refresh(Request $request)
        {
            $token = auth()->refresh(true,true);
            $headers =[
                'Authorization'=>$token
            ];
            return response()->json([
                'success' => true,
                'token' => $token,
            ],200,$headers);
        }
    /**
    * @param Request $request
    * @return \Illuminate\Http\JsonResponse
    * @throws \Illuminate\Validation\ValidationException
    */
    public function logout(Request $request)
    {
        $this->validate($request, [
        'token' => 'required'
        ]);

        try {
        auth()->logout();

        return response()->json([
        'success' => true,
        'message' => 'User logged out successfully'
        ]);
        } catch (JWTException $exception) {
        return response()->json([
        'success' => false,
        'message' => 'Sorry, the user cannot be logged out'
        ], 500);
        }
    }

    /**
    * @param RegistrationFormRequest $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        if ($this->loginAfterSignUp) {
        return $this->login($request);
        }

        return response()->json([
        'success'   =>  true,
        'data'      =>  $user
        ], 200);
    }
}
