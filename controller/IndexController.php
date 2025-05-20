<?php
class IndexController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $licenseManager = new SoftwareLicenseManager();
        $licenseStatus = $licenseManager->checkLicense(Auth::user()->license_key);

        if ($licenseStatus['status'] !== 'success') {
            if ($licenseStatus['data']['status_code'] === 1) {
                return redirect('renew');
            } elseif ($licenseStatus['data']['status_code'] === 2) {
                return redirect('license-invalid');
            }
        }

        return view('dashboard', ['user' => Auth::user()]);
    }
}