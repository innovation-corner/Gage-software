<?php

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class APIAuthController extends Controller
{

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * @SWG\Patch(
     *   path="/api/auth/refresh",
     *   summary="Refresh user authorization token details using previous token",
     *          tags={"Authentication"},
     *   @SWG\Response(
     *     response=200,
     *     description="new authorization token"
     *   ),
     *   @SWG\Parameter(
     *     name="token",
     *     description="authorization token",
     *     required=true,
     *     in= "query",
     *     type="string"
     * )
     * )
     */
    public function patchRefresh(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'token' => 'required'
            ]);

            if ($validator->fails())
                throw new ValidationException($validator);


            $token = JWTAuth::parseToken();

            $newToken = $token->refresh();

            return $this->onAuthorized($newToken, $request);

        } catch (ValidationException $e) {
            $message = "Validation error occurred. " . (implode(' ', Arr::flatten($e->errors())));
            return problemResponse($message, '401', $request);

        } catch (\Exception $e) {
            ddd(['error_message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, '500', $request, $e);
        }
    }



    /**
     * Invalidate a token.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * @SWG\Delete(
     *   path="/api/auth/invalidate",
     *   summary="Invalidate/Delete user authorization token using previous token",
     *         tags={"Authentication"},
     *   @SWG\Response(
     *     response=200,
     *     description="success message"
     *   ),
     *   @SWG\Parameter(
     *     name="token",
     *     description="authorization token",
     *     required=true,
     *     in= "query",
     *     type="string"
     * )
     * )
     */
    public function deleteInvalidate(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'token' => 'required'
            ]);

            if ($validator->fails())
                throw new ValidationException($validator);


            $token = JWTAuth::parseToken();

            $token->invalidate();
            $message = "Token invalidated successfully";
            return validResponse($message, [], $request);

        } catch (ValidationException $e) {
            $message = "Validation error occurred. " . (implode(' ', Arr::flatten($e->errors())));
            return problemResponse($message, '401', $request);

        } catch (\Exception $e) {
            $message = 'Something went wrong while processing your request.';
            return problemResponse($message, '500', $request, $e);
        }


    }

    /**
     * What response should be returned on authorized.
     *
     */
    private function onAuthorized($token, $request)
    {

        $transformer = new UserTransformer();

        $user = auth()->user();

        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
            'user' => $transformer->transform($user)

        ];

        return validResponse("Authorisation successful", $data, $request);


    }



}


