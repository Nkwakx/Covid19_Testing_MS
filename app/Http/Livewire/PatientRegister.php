<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Role;
use App\Models\User;
use App\Models\Suburb;
use App\Models\Payment;
use Livewire\Component;
use App\Models\Dependent;
use App\Models\MedicalAidPlan;
use App\Models\MedicalAidScheme;
use App\Models\SecurityQuestions;
use Illuminate\Support\Facades\Auth;

class PatientRegister extends Component
{
    public $name;
    public $surname;
    public $idNo;
    public $gender;
    public $email;
    public $phone;
    public $addressLine1;
    public $addressLine2;
    public $suburb_id;
    public $med_aid_number;
    public $med_aid_YN;
    public $med_aid_plan_id;
    public $person_responsible_for_acc;
    public $password;
    public $password_confirmation;
    public $security_question_id;
    public $security_answer;

    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }

    public function render()
    {
        return view('livewire.patient-register',
            [
                'pricePlan' => MedicalAidPlan::all(),
                'medAidSchemes' => MedicalAidScheme::all(),
                'roles' => Role::all(),
                'securityQuestions' => SecurityQuestions::all(),
                'suburbs' => Suburb::all(),
            ]);
    }
    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {

        if ($this->currentStep == 1) {
            $this->validate([
                'name' => 'required|string',
                'surname' => 'required|string',
                'idNo' => 'required|string',
                'email' => 'required|email|unique:users',
                'gender' => 'required',
                'password' => 'required',
                'password_confirmation' => 'required',
                'security_question_id' => 'required',
                'security_answer' => 'required',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'phone' => 'required',
                'addressLine1' => 'required',
                'suburb_id' => 'required',
            ]);
        } 
    }

    public function register()
    {
        $this->resetErrorBag();
        if ($this->currentStep == 3) {
            $this->validate([
                'password' => 'required',
                'password_confirmation' => 'required',
                'security_question_id' => 'required',
                'security_answer' => 'required',
            ]);
        }
        
            $values = array(
                "name" => $this->name,
                "surname" => $this->surname,
                "idNo" => $this->idNo,
                "DOB" => $this->DOB,
                "gender" => $this->gender,
                "email" => $this->email,
                "phone" => $this->phone,
                "addressLine1" => $this->addressLine1,
                "addressLine2" => $this->addressLine2,
                "suburb_id" => $this->suburb_id,
                "city_id" => $this->city_id,
                "zipCode" => $this->zipCode,
                "security_answer" => $this->security_answer,
                "security_question_id" => $this->security_question_id,
                "password" => $this->password,
                "password_confirmation" => $this->password_confirmation,
            );
            //dd($values);

            User::create($values);
            //   $this->reset();
            //   $this->currentStep = 1;
            $data = ['fullName' => $this->name . ' ' . $this->surname, 'email' => $this->email];
            return redirect()->route('registration.success', $data);
            //User::create($this->form);
            //return redirect(route('login'));
    }
}
