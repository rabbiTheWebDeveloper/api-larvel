<?php

namespace App\Http\Controllers\Merchant\Auth;


use App\Http\Controllers\MerchantBaseController;
use App\Libraries\cPanel;
use App\Http\Requests\Merchant\MerchantRegister;
use App\Models\User;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class LoginController extends MerchantBaseController
{

    /**
     * Show the merchant registration page
     *
     * @return Application|Factory|View
     */

    public function index()
    {
        return view('auth.register');
    }

    /**
     * @param $domain
     * @param $dir
     * @return void
     */
    private function create_subdomain($domain, $dir): void
    {

        $cPanel = new cPanel("funne", 'n_HWMP^[~TM7', "srv1");
        try {

            $parameters = [
                'domain' => $domain,
                'rootdomain' => 'funnelliner.com',
                'dir' => $dir,
                'disallowdot' => 1,
            ];
            $result = $cPanel->execute('api2', "SubDomain", "addsubdomain", $parameters);
            return;
        } catch (Exception $exception) {
            return;
        }
    }

    public function register(MerchantRegister $request)
    {

        $data = Arr::except($request->validated(), ['shop_name', 'domain']);
        $data['role'] = User::MERCHANT;

        try {
            $merchant = User::query()->create($data);
            $merchant->shop()->create([
                'name' => $request->input('shop_name'),
                'domain' => $request->input('domain'),
                'shop_id' => mt_rand(111111, 999999),
            ]);
            $merchant->merchantinfo()->create();
            $this->create_subdomain($request->input('domain') . '-dashboard', 'dashboard.funnelliner.com');
            $this->create_subdomain($request->input('domain') . '-web', 'web.funnelliner.com');
            $url = $request->input('domain') . '-dashboard.funnelliner.com';
            
            $user = '20102107';
            $password = 'SES@321';
            $sender_id = 'INFOSMS';
            $msg = 'Dear '.$data['name'].' ,
            Your registration successfully completed. Please pay your registration fee & active this account.
            
            Thank you.
            
            Funnelliner.Com';
            $url2 = "https://mshastra.com/sendurl.aspx";
            $data2 = [
                "user" => $user,
                "pwd" => $password,
                "type" => "text",
                "CountryCode" => "+880",
                "mobileno" => $data['phone'],
                "senderid" => $sender_id,
                "msgtext" => $msg,
            ];
            $ch = curl_init($url2);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data2);
            $register = curl_exec($ch);
            
            return Redirect::to('https://' . $url);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function merchant_login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => User::MERCHANT])) {
            $token = auth()->user()->createApiToken(); #Generate token
            return response()->json(['status' => 'Authorised', 'token' => $token, 'merchant' => [
                'id' => auth()->user()->id,
                'name' => auth()->user()->name,
                'domain' => auth()->user()->shop->domain,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->phone,
                'role' => auth()->user()->role,
                'shop_id' => auth()->user()->shop->shop_id,
                'avatar' => auth()->user()->avatar,
            ]], 200);
        } else {
            return response()->json(['status' => 'Unauthorised'], 401);
        }
    }


    public function merchant_logout()
    {
        $userRemoveToken = auth()->user()->removeApiToken();
        return response()->json(['msg' => $userRemoveToken], 200);


    }
}
