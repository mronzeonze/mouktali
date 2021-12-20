<?php

namespace App\Http\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;

class AdminSettingComponent extends Component
{

    public $email;
    public $phone;
    public $phone2;
    public $address;
    public $twiter;
    public $facebook;
    public $instagram;
    public $about;

    public function mount()
    {
        $setting = Setting::find(1);
        if ($setting)
        {
            $this->email = $setting->email;
            $this->phone = $setting->phone;
            $this->phone2 = $setting->phone2;
            $this->address = $setting->address;
            $this->twiter = $setting->twiter;
            $this->facebook = $setting->facebook;
            $this->instagram = $setting->instagram;
            $this->about = $setting->about;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'twiter' => 'required',
            'facebook' => 'required',
            'instagram' => 'required'
        ]);
    }

    public function saveSettings()
    {
        $this->validate([
           'email' => 'required|email',
           'phone' => 'required',
           'address' => 'required',
           'twiter' => 'required',
           'facebook' => 'required',
           'instagram' => 'required'
        ]);

        $setting = Setting::find(1);
        if($setting)
        {

            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->phone2 = $this->phone2;
            $setting->address = $this->address;
            $setting->twiter = $this->twiter;
            $setting->facebook = $this->facebook;
            $setting->instagram = $this->instagram;
            $setting->about = $this->about;
            $setting->save();
            session()->flash('message','Paramètre ont été sauvegardé avec succés');
        }else{
            $setting = new Setting();
            $setting->email = $this->email;
            $setting->phone = $this->phone;
            $setting->phone2 = $this->phone2;
            $setting->address = $this->address;
            $setting->twiter = $this->twiter;
            $setting->facebook = $this->facebook;
            $setting->instagram = $this->instagram;
            $setting->about = $this->about;
            $setting->save();
            session()->flash('message','Paramètre ont été sauvegardé avec succés');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-setting-component')->layout('layouts.base');
    }
}
