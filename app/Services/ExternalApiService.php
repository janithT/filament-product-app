<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class ExternalApiService
{

    protected string $baseUrl = '';
    protected string $loginEndpoint = '';
    protected string $dataEndpoint = '';

    protected string $useremail = '';
    protected string $password = '';

    protected string $cacheKey = '';

    public function __construct()
    {
        $this->baseUrl = config('vocus.api_url');

        $this->loginEndpoint = '/api/login';
        $this->dataEndpoint = '/api/orders/findaddress';

        $this->useremail = config('vocus.api_useremail');
        $this->password = config('vocus.api_password');

    }

    /**
     *  Fetch API data (API unique key)
     * 
     */
    public function fetchApiUniqueId(): ?string
    {
        $token = $this->getToken();

        if(!$token) {
            return null;
        }

        // set payload 
        $response = Http::post("{$this->baseUrl}{$this->dataEndpoint}", [
            'company_id ' => 17, // I'm setting this directly. not sure from where to get.
            'street_number ' => "street_number",
            'street_name' => "street_name",
            'suburb' => "suburb",
            'postcode' => "postcode",
            'state' => "VIC/NSW/QLD/WA"
        ]);

        if ($response->unauthorized()) {
            // Token might be expired. Try login again.
            $this->clearToken();
            $token = $this->getToken(true); // force refresh if unauthorized 

            $response = Http::withToken($token)
                ->post("{$this->baseUrl}{$this->dataEndpoint}");
        }

        if ($response->successful()) { // but im not getting any. always return 500 from this API. unable to find api_unique_key
            Log::info('token retrive success');
            return $response->json('id');
        }

        Log::warning('Data API failed', ['body' => $response->body()]);
        return null;
    }

    /**
     * Get user login token
     * 
     */
    protected function getToken(bool $forceRefresh = false): ?string
    {
        // check the cache first for key
        if (!$forceRefresh && Cache::has($this->cacheKey)) {
            return Cache::get($this->cacheKey);
        }

        $response = Http::post("{$this->baseUrl}{$this->loginEndpoint}", [
            'email' => $this->useremail,
            'password' => $this->password,
        ]);

        if ($response->successful()) {
            Log::info('Login success');
            $token = $response->json('token');

            // Cache for 30 mins (adjust based on API response)
            Cache::put($this->cacheKey, $token, now()->addMinutes(30));

            return $token;
        }

        Log::error('Login failed', ['body' => $response->body()]);
        return null;
    }

    /**
     * Clear cache token
     * 
     */
    protected function clearToken(): void
    {
        Cache::forget($this->cacheKey);
    }
}
