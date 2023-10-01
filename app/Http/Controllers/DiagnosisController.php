<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosis;
use App\Models\Task;
use App\Models\TaskCondition;
use App\Models\ProfileInfo;

class DiagnosisController extends Controller
{
    public function profile()
    {
        return view('procedure.diagnosis.profile');
        // return vew('diagnosis.start');
    }

    public function jobAdmin()
    {
        return view('procedure.diagnosis.jobAdmin');
    }

    public function estate()
    {
        return view('procedure.diagnosis.estate');
    }

    public function financial()
    {
        return view('procedure.diagnosis.financial');
    }

    public function other()
    {
        return view('procedure.diagnosis.other');
    }

    public function store(Request $request)
    {
        // ユーザーの回答をprofile_infosテーブルに保存するロジック
        $profileInfo = ProfileInfo::create($request->all());
        return response()->json(['id' => $profileInfo->id]);
        // バリデーションやデータの整形を必要に応じて実施
    }
    
    public function showResults($id) {
        $diagnosis = Diagnosis::find($id);
        $tasks = $this->getRelevantTasks($diagnosis);

        return view('diagnosis.diagnosis_results', ['tasks' => $tasks]);
    }

    protected function getRelevantTasks($diagnosis)
    {
        $matchingTaskIds = TaskCondition::where('table_name', 'profile_infos')
        ->where(function($query) use ($diagnosis) {
            // family_page_idに基づく条件
            $query->where(function($subQuery) use ($diagnosis) {
                $subQuery->where('column_name', 'family_page_id')
                         ->where('operator', '=')  // operatorはtask_conditionsから取得
                         ->where('value', $diagnosis->family_page_id);
            });

            // is_household_headに基づく条件
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('column_name', 'is_household_head')
                         ->where('operator', '=')  
                         ->where('value', $diagnosis->is_household_head);
            });

            // spouse_statusに基づく条件
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('column_name', 'spouse_status')
                         ->where('operator', '=') 
                         ->where('value', $diagnosis->spouse_status);
            });

            // has_dependent_childrenに基づく条件
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('column_name', 'has_dependent_children')
                         ->where('operator', '=')  
                         ->where('value', $diagnosis->has_dependent_children);
        });

            // lived_with_othersに基づく条件
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('column_name', 'lived_with_others')
                         ->where('operator', '=')  
                         ->where('value', $diagnosis->lived_with_others);
        });

            // ここから job_admin_infos 
            // occupation_id に関する条件
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'job_admin_infos') // テーブル名は適切なものに変更してください
                    ->where('column_name', 'family_page_id')
                    ->where('operator', '=')
                    ->where('value', $diagnosis->family_page_id);
        });


            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'occupation_id')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->occupation_id);
        });
            
            // multiple_incomes
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'multiple_incomes')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->multiple_incomes);
        });

            // pension_reception
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'pension_reception')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->pension_reception);
        });

            // care_certification
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'care_certification')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->care_certification);
        });

            // ここからestate_infos
            // residence
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos') // テーブル名は適切なものに変更してください
                    ->where('column_name', 'family_page_id')
                    ->where('operator', '=')
                    ->where('value', $diagnosis->family_page_id);
        });


            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'residence')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->residence);
        });

            // property_type	
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'property_type')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->property_type);
        });

            // property_ownership	
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'property_ownership')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->property_ownership);
        });

            // rented_land	
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'rented_land')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->rented_land);
        });

            // leased_property	
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'leased_property')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->leased_property);
        });

            // owned_land	
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'owned_land')
                     ->where('operator', '=')
                     ->where('value', $diagnosis->owned_land);
        });
        
            // ここからfinancial_info_options
            // family_page_id 
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'family_page_id')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->family_page_id);
            });

            // financial_info_id
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'financial_info_id')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->financial_info_id);
            });

            // financial_option_id
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'financial_option_id')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->financial_option_id);
            });


            // ここからother_infos
            // family_page_id 
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'family_page_id')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->family_page_id);
            });

            // vehicle 
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'vehicle')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->vehicle);
            });

            // has_pet 
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'has_pet')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->has_pet);
            });

            // number_of_heirs
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'number_of_heirs')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->number_of_heirs);
            });

            // will_status_id
            $query->orWhere(function($subQuery) use ($diagnosis) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'will_status_id')
                        ->where('operator', '=')
                        ->where('value', $diagnosis->will_status_id);
            });
            // 以下、同様に other_infos の他のカラムに関する条件も追加していく ...


    })->pluck('task_id');
        // この部分は、具体的なロジックが完成するまで仮の値を返す
        $tasks = Task::whereIn('id', $matchingTaskIds)->get();     
        
        return $tasks;
    }
}
