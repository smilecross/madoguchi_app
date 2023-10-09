<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnoses;
use App\Models\Task;
use App\Models\TaskCondition;
use App\Models\DiagnosesInfo;


class DiagnosesController extends Controller
{
    public function diagnoses()
    {
        return view('procedure.diagnoses.profile');
        // return view('diagnoses.start');
    }

    public function jobAdmin()
    {
        return view('procedure.diagnoses.jobAdmin');
    }

    public function estate()
    {
        return view('procedure.diagnoses.estate');
    }

    public function financial()
    {
        return view('procedure.diagnoses.financial');
    }

    public function other()
    {
        return view('procedure.diagnoses.other');
    }

    public function storeDiagnoses(Request $request)
    {
        $familyPageId = $request->input('family_pages_id');
    
        // 既存の回答があるかどうか確認
        $existingInfo = DiagnosesInfo::where('family_pages_id', $familyPageId)->first();
        
        if ($existingInfo) {
            // 既存のエントリをアップデート
            $existingInfo->update($request->all());
        } else {
            // 新しいエントリを作成
            $info = new DiagnosesInfo($request->all());
            $info->save();
        }

        // 保存後にjobAdminカテゴリの画面にリダイレクト
        return redirect()->route('diagnoses.jobAdmin');
    }

    
    public function showResults($id) {
        $diagnosis = Diagnoses::find($id);
        $tasks = $this->getRelevantTasks($diagnoses);

        return view('diagnoses.diagnoses_results', ['tasks' => $tasks]);
    }

    protected function getRelevantTasks($diagnoses)
    {
        $matchingTaskIds = TaskCondition::where('table_name', 'diagnoses_infos')
        ->where(function($query) use ($diagnoses) {
            // family_page_idに基づく条件
            $query->where(function($subQuery) use ($diagnoses) {
                $subQuery->where('column_name', 'family_page_id')
                         ->where('operator', '=')  // operatorはtask_conditionsから取得
                         ->where('value', $diagnoses->family_page_id);
            });

            // is_household_headに基づく条件
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('column_name', 'is_household_head')
                         ->where('operator', '=')  
                         ->where('value', $diagnoses->is_household_head);
            });

            // spouse_statusに基づく条件
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('column_name', 'spouse_status')
                         ->where('operator', '=') 
                         ->where('value', $diagnoses->spouse_status);
            });

            // has_dependent_childrenに基づく条件
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('column_name', 'has_dependent_children')
                         ->where('operator', '=')  
                         ->where('value', $diagnoses->has_dependent_children);
        });

            // lived_with_othersに基づく条件
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('column_name', 'lived_with_others')
                         ->where('operator', '=')  
                         ->where('value', $diagnoses->lived_with_others);
        });

            // ここから job_admin_infos 
            // occupation_id に関する条件
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'job_admin_infos') // テーブル名は適切なものに変更してください
                    ->where('column_name', 'family_page_id')
                    ->where('operator', '=')
                    ->where('value', $diagnoses->family_page_id);
        });


            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'occupation_id')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->occupation_id);
        });
            
            // multiple_incomes
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'multiple_incomes')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->multiple_incomes);
        });

            // pension_reception
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'pension_reception')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->pension_reception);
        });

            // care_certification
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'job_admin_infos')
                     ->where('column_name', 'care_certification')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->care_certification);
        });

            // ここからestate_infos
            // residence
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos') // テーブル名は適切なものに変更してください
                    ->where('column_name', 'family_page_id')
                    ->where('operator', '=')
                    ->where('value', $diagnoses->family_page_id);
        });


            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'residence')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->residence);
        });

            // property_type	
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'property_type')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->property_type);
        });

            // property_ownership	
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'property_ownership')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->property_ownership);
        });

            // rented_land	
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'rented_land')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->rented_land);
        });

            // leased_property	
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'leased_property')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->leased_property);
        });

            // owned_land	
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'estate_infos')
                     ->where('column_name', 'owned_land')
                     ->where('operator', '=')
                     ->where('value', $diagnoses->owned_land);
        });
        
            // ここからfinancial_info_options
            // family_page_id 
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'family_page_id')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->family_page_id);
            });

            // financial_info_id
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'financial_info_id')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->financial_info_id);
            });

            // financial_option_id
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'financial_info_options')
                        ->where('column_name', 'financial_option_id')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->financial_option_id);
            });


            // ここからother_infos
            // family_page_id 
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'family_page_id')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->family_page_id);
            });

            // vehicle 
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'vehicle')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->vehicle);
            });

            // has_pet 
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'has_pet')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->has_pet);
            });

            // number_of_heirs
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'number_of_heirs')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->number_of_heirs);
            });

            // will_status_id
            $query->orWhere(function($subQuery) use ($diagnoses) {
                $subQuery->where('table_name', 'other_infos')
                        ->where('column_name', 'will_status_id')
                        ->where('operator', '=')
                        ->where('value', $diagnoses->will_status_id);
            });
            // 以下、同様に other_infos の他のカラムに関する条件も追加していく ...


    })->pluck('task_id');
        // この部分は、具体的なロジックが完成するまで仮の値を返す
        $tasks = Task::whereIn('id', $matchingTaskIds)->get();     
        
        return $tasks;
    }
}
